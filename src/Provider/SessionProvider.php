<?php
namespace Wandu\Publ\Provider;

use Wandu\Session\Handler\FileHandler;
use Wandu\Session\Manager;
use Wandu\Standard\DI\ContainerInterface;
use Wandu\Standard\DI\ServiceProviderInterface;

class SessionProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $app)
    {
        $app->singleton('session.handler', function ($app) {
            return new FileHandler($app['config']['session']['path']);
        });
        $app->singleton('session', function ($app) {
            return new Manager($app['config']['session']['name'], $app['session.handler']);
        });
    }
}
