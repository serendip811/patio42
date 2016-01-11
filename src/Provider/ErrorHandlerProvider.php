<?php
namespace Wandu\Publ\Provider;

use Wandu\Standard\DI\ContainerInterface;
use Wandu\Standard\DI\ServiceProviderInterface;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run as Whoops;

class ErrorHandlerProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $app)
    {
        $whoops = new Whoops();
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->register();

        $app->instance(Whoops::class, $whoops);
    }
}
