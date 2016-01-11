<?php
namespace Wandu\Publ\Provider;

use Wandu\Publ\Request\Input;
use Wandu\Standard\DI\ContainerInterface;
use Wandu\Standard\DI\ServiceProviderInterface;

class RequestProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $app)
    {
        $app->singleton(Input::class, function ($app) {
            return new Input($app['request']);
        });
        $app->alias('input', Input::class);
    }
}
