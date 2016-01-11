<?php
namespace Wandu\Publ\Provider;

use Wandu\Standard\DI\ContainerInterface;
use Wandu\Standard\DI\ServiceProviderInterface;
use Wandu\Template\Manager;

class ViewProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $app)
    {
        $app->singleton('view', function ($app) {
            return new Manager($app['path'] . '/views');
        });
    }
}
