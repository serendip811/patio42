<?php
namespace Wandu\Publ;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\DI\Container;
use Wandu\Publ\Facade\Facade;
use Wandu\Publ\Response\Response;
use Wandu\Router\HandlerNotFoundException;
use Wandu\Router\Router;
use Wandu\Standard\DI\ContainerInterface;

class Application extends Container
{
    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this['path'] = $path;
        $this['config'] = require($path . '/app/config.php');
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function execute(ServerRequestInterface $request)
    {
        $this['request'] = $request;

        $this->registerServiceProviders();
        $this->registerControllers($this['router.controllers']);
        $this->registerFacade();
        $this->registerRoutes($router = $this['router']);
        try {
            $response = $router->dispatch($request);
        } catch (HandlerNotFoundException $e) {
            $response = Response::error404();
        }
        return $response;
    }

    public function registerServiceProviders()
    {
        $providerCallback = require $this['path'] .'/app/providers.php';
        call_user_func($providerCallback, $this);
    }

    public function registerControllers(ContainerInterface $controllers)
    {
        $controllerCallback = require $this['path'] .'/app/controllers.php';
        call_user_func($controllerCallback, $controllers, $this);
    }

    public function registerRoutes(Router $router)
    {
        $routeCallback = require $this['path'] .'/app/routes.php';
        call_user_func($routeCallback, $router, $this);
    }

    public function registerFacade()
    {
        Facade::setContainer($this);
    }
}
