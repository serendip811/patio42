<?php
namespace Wandu\Publ\Repository;

use Wandu\Standard\DI\ContainerInterface;
use Wandu\Standard\DI\ServiceProviderInterface;

class RepositoryProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container)
    {
        $container->singleton('repository.users', function ($app) {
            return new Users($app['connection']);
        });
        $container->singleton('repository.posts', function ($app) {
            return new Posts($app['connection']);
        });
        $container->singleton('repository.categories', function ($app) {
            return new Categories($app['connection']);
        });
    }
}
