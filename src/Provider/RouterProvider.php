<?php
namespace Wandu\Publ\Provider;

use Wandu\DI\Container;
use Wandu\Router\Router;
use Wandu\Standard\DI\ContainerInterface;
use Wandu\Standard\DI\ServiceProviderInterface;

class RouterProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $app)
    {
        $app->singleton('router', function ($app) {
            return new Router($app['router.controllers'], $app['config']['router']);
        });
        $app->singleton('router.controllers', function () {
            return new Container();
        });
    }
}
