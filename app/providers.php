<?php
namespace Wandu\Publ;

use Wandu\Publ\Provider\DatabaseProvider;
use Wandu\Publ\Provider\RequestProvider;
use Wandu\Publ\Provider\SessionProvider;
use Wandu\Publ\Provider\ErrorHandlerProvider;
use Wandu\Publ\Provider\RouterProvider;
use Wandu\Publ\Provider\ViewProvider;
use Wandu\Publ\Repository\RepositoryProvider;
use Wandu\Standard\DI\ContainerInterface;

return function (ContainerInterface $app) {
    $app->register(new RouterProvider);
    $app->register(new SessionProvider);
    $app->register(new ErrorHandlerProvider);
    $app->register(new ViewProvider());
    $app->register(new DatabaseProvider());

    $app->register(new RepositoryProvider);
    $app->register(new RequestProvider);
};
