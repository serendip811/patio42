<?php
namespace Wandu\Publ\Controller\Administrator;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Publ\Controller\BaseController;
use Wandu\Publ\Facade\Input;
use Wandu\Publ\Facade\Session;
use Wandu\Publ\Response\Response;
use Wandu\Publ\Security\Csrf;
use Wandu\Publ\Validator\Validator;

class User extends BaseController
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function index(ServerRequestInterface $request)
    {
        $page = Input::fromQuery('page', 1);
        $users = $this->repository->limit(($page - 1) * 10, 10)->orderBy(['id' => false])->all();
        return Response::plain($this->view->render('admin/users/index', compact('users')));
    }

    /**
     * @return ResponseInterface
     */
    public function ajaxList()
    {
        $last = Input::fromQuery('last', -1);
        $limit = Input::fromQuery('limit', 10);
        $queryBuilder = $this->repository->orderBy(['id' => false])->limit(0, $limit);
        if ($last > 0) {
            $queryBuilder = $queryBuilder->where([
                'id' => ['<', $last]
            ]);
        }
        return Response::ajax($queryBuilder->all()->toArray());
    }

    /**
     * @param ServerRequestInterface $request
     * @return \Wandu\Http\Response
     */
    public function create(ServerRequestInterface $request)
    {
        $page = Input::fromQuery('page', 1);
        $users = $this->repository->limit(($page - 1) * 10, 10)->orderBy(['id' => false])->all();
        return Response::plain($this->view->render('admin/users/create', compact('users')));
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function store(ServerRequestInterface $request)
    {
        $validator = new Validator([
            'email' => [Validator::required(), Validator::email()],
            'username' => [Validator::required(), Validator::length(3, 20)],
            'password' => [Validator::required(), Validator::equals('password2')],
            'password2' => [Validator::required()],
        ]);

        if (!$validator->validate($request->getParsedBody())) {
            return Response::factory(400, $validator->getErrorMessage());
        }

        $email = Input::fromBody('email');
        $username = Input::fromBody('username');
        $password = Input::fromBody('password');
        $level = Input::fromBody('level');

        $this->repository->insert(compact('email', 'username', 'password', 'level'));
        return Response::redirect('/admin/users');
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request)
    {
        $page = Input::fromQuery('page', 1);
        $users = $this->repository->limit(($page - 1) * 10, 10)->orderBy(['id' => false])->all();
        $username = $request->getAttribute('username');
        $user = $this->repository->where(compact('username'))->one();
        return Response::plain($this->view->render('admin/users/show', compact('users', 'user')));
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function update(ServerRequestInterface $request)
    {
        $validator = new Validator([
            'email' => [Validator::required(), Validator::email()],
            'username' => [Validator::required(), Validator::length(3, 20)],
            'password' => Validator::equals('password2'),
        ]);

        if (!$validator->validate($request->getParsedBody())) {
            return Response::factory(400, $validator->getErrorMessage());
        }

        $email = Input::fromBody('email');
        $username = Input::fromBody('username');
        $password = Input::fromBody('password');
        $level = Input::fromBody('level');

        $valuesToUpdate = compact('email', 'username', 'level');
        if ($password) {
            $valuesToUpdate['password'] = $password;
        }
        $this->repository->where(['username' => $request->getAttribute('username')])->update($valuesToUpdate);
        return Response::redirect('/admin/users/' . $username);
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function destroy(ServerRequestInterface $request)
    {
        $username = $request->getAttribute('username');
        if ($this->repository->count() <= 1) {
            return Response::factory(400, "this is the last member!");
        }
        $this->repository->where(compact('username'))->delete();
        return Response::redirect('/admin/users');
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function login(ServerRequestInterface $request)
    {
        $input = $request->getParsedBody();
        $token = $input['_token'];
        $username = $input['username'];
        $password = $input['password'];

        $csrf = new Csrf();
        if (!$csrf->isInSafety($token)) {
            return Response::factory(400, 'Not Accepted Request; Wrong token.');
        }
        Session::remove('csrf_token');

        $user = $this->repository->where([
            'username' => $username,
            'password' => $password
        ])->one();

        if (!isset($user) || $user['level'] > 0) {
            return Response::factory(400, 'Not Accepted Request; Wrong username or password.');
        }

        Session::set('isLogin', true);
        Session::set('username', $username);

        return Response::back($request);
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function logout(ServerRequestInterface $request)
    {
        Session::set('isLogin', false);
        Session::set('username', null);

        return Response::back($request);
    }
}
