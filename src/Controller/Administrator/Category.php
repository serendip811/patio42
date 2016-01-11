<?php
namespace Wandu\Publ\Controller\Administrator;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Publ\Controller\BaseController;
use Wandu\Publ\Facade\Input;
use Wandu\Publ\Response\Response;
use Wandu\Publ\Validator\Validator;

class Category extends BaseController
{
    /**
     * @return ResponseInterface
     */
    public function index()
    {
        $categories = $this->repository->orderBy(['id' => true])->all();
        return Response::plain($this->view->render('admin/categories/index', compact('categories')));
    }

    /**
     * @return ResponseInterface
     */
    public function ajaxList()
    {
        $categories = $this->repository->orderBy(['id' => true])->all();
        return Response::ajax($categories->toArray());
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function create(ServerRequestInterface $request)
    {
        return Response::plain($this->view->render('admin/categories/create'));
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function store(ServerRequestInterface $request)
    {
        $validator = new Validator([
            'name' => [Validator::required(), Validator::length(2, 20)],
        ]);

        if (!$validator->validate($request->getParsedBody())) {
            return Response::factory(400, $validator->getErrorMessage());
        }

        $name = Input::fromBody('name');
        $this->repository->insert(compact('name'));

        return Response::redirect('/admin/settings/categories');
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        $category = $this->repository->where(compact('id'))->one();
        return Response::plain($this->view->render('admin/categories/show', compact('category')));
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function update(ServerRequestInterface $request)
    {
        $validator = new Validator([
            'name' => [Validator::required(), Validator::length(2, 20)],
        ]);

        if (!$validator->validate($request->getParsedBody())) {
            return Response::factory(400, $validator->getErrorMessage());
        }

        $id = $request->getAttribute('id');
        $name = Input::fromBody('name');

        $this->repository->where(compact('id'))->update(compact('name'));
        return Response::redirect('/admin/settings/categories');
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function destroy(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        $this->repository->where(compact('id'))->delete();
        return Response::redirect('/admin/settings/categories');
    }
}
