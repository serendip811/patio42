<?php
namespace Wandu\Publ;

use Wandu\Publ\Controller\Administrator;
use Wandu\Publ\Controller\Administrator\Category;
use Wandu\Publ\Controller\Administrator\Post;
use Wandu\Publ\Controller\Administrator\User;
use Wandu\Publ\Controller\Middleware;
use Wandu\Publ\Controller\Patio;
use Wandu\Standard\DI\ContainerInterface;

return function (ContainerInterface $controller, Application $app) {
    $controller->singleton('Patio', function () use ($app) {
        return new Patio($app['view'], $app['repository.posts']);
    });
    $controller->singleton('Middleware', function () use ($app) {
        return new Middleware($app, $app['session']);
    });
    $controller->singleton('Admin', function () use ($app) {
        return new Administrator($app['view'], $app['repository.users']);
    });
    $controller->singleton('Admin.User', function () use ($app) {
        return new User($app['view'], $app['repository.users']);
    });
    $controller->singleton('Admin.Category', function () use ($app) {
        return new Category($app['view'], $app['repository.categories']);
    });
    $controller->singleton('Admin.Post', function () use ($app) {
        return new Post($app['view'], $app['repository.posts'], $app['path'] . '/public/files');
    });
};
