<?php
namespace Wandu\Publ\Provider;

use Wandu\Modelr\Connection;
use Wandu\Standard\DI\ContainerInterface;
use Wandu\Standard\DI\ServiceProviderInterface;

class DatabaseProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $app)
    {
        $app->singleton(Connection::class, function ($app) {
            return Connection::factory($app['config']['database']);
        });
        $app->alias('connection', Connection::class);
    }
}
