<?php
namespace Wandu\Publ\Controller;

use Closure;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Publ\Facade\Session;
use Wandu\Publ\Response\Response;
use Wandu\Publ\Security\Csrf;

class Administrator extends BaseController
{
    /**
     * @param ServerRequestInterface $request
     * @param callable $next
     * @return ResponseInterface
     */
    public function auth(ServerRequestInterface $request, Closure $next)
    {
        if (Session::get('isLogin') === true) {
            return $next($request);
        }
        $csrf = new Csrf();
        return Response::plain($this->view->render('admin/login', [
            'token' => $csrf->getToken(),
        ]));
    }

    /**
     * @return ResponseInterface
     */
    public function index()
    {
        return Response::redirect('/admin/posts');
    }

    public function settings()
    {
        return Response::plain($this->view->render('admin/settings/index'));
    }

    /**
     * All Redirect to Hashbang
     *
     * @todo history.pushState
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function redirect(ServerRequestInterface $request)
    {
        $redirectUrl = '/admin/#!/' . $request->getAttribute('path');
        if ($query = $request->getUri()->getQuery()) {
            $redirectUrl .= '?' . $query;
        }
        return Response::redirect($redirectUrl);
    }
}
