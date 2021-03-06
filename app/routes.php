<?php
namespace Wandu\Publ;

use Wandu\Router\Router;

return function (Router $router) {
    $router->get('/batch_instagram', 'instagram@Batch');
    $router->get('/batch_instagram_ajax', 'instagram_ajax@Batch');
    
    $router->get('', 'new_index@Patio');
    $router->get('/m', 'index@Patio');
    $router->get('/detail', 'index_detail@Patio');
    $router->get('/franchise', 'franchise@Patio');
    $router->get('/franchise_new', 'franchise_new@Patio');
    $router->get('/store_popup/{id}', 'store_popup@Patio');
    $router->post('/consulting', 'consulting@Patio');
    $router->group(['prefix' => '/admin', 'middleware' => ['auth@Admin']], function (Router $router) {
        $router->group('/ajax', function (Router $router) {
            $router->get('/categories', 'ajaxList@Admin.Category');
            $router->get('/posts', 'ajaxList@Admin.Post');
            $router->get('/users', 'ajaxList@Admin.User');
        });
        $router->get('', 'index@Admin');
        $router->group('/users', function (Router $router) {
            $router->get('', 'index@Admin.User');
            $router->get('/create', 'create@Admin.User');
            $router->get('/{username}', 'show@Admin.User');
            $router->get('/{username}/edit', 'edit@Admin.User');

            $router->post('', 'store@Admin.User');
            $router->put('/{username}', 'update@Admin.User');
            $router->delete('/{username}', 'destroy@Admin.User');
        });

        $router->group('/posts', function (Router $router) {
            $router->get('', 'index@Admin.Post');
            $router->get('/create', 'create@Admin.Post');
            $router->get('/{id}', 'show@Admin.Post');
            $router->get('/{id}/edit', 'edit@Admin.Post');

            $router->post('', 'store@Admin.Post');
            $router->put('/{id}', 'update@Admin.Post');
            $router->delete('/{id}', 'destroy@Admin.Post');
        });

        $router->group('/settings', function (Router $router) {

            $router->get('', 'settings@Admin');

            $router->group('/categories', function (Router $router) {
                $router->get('', 'index@Admin.Category');
                $router->get('/create', 'create@Admin.Category');
                $router->get('/{id}', 'show@Admin.Category');
                $router->get('/{id}/edit', 'edit@Admin.Category');

                $router->post('', 'store@Admin.Category');
                $router->put('/{id}', 'update@Admin.Category');
                $router->delete('/{id}', 'destroy@Admin.Category');
            });
        });
    });
    $router->group('/user', function (Router $router) {
        $router->post('/login', 'login@Admin.User');
        $router->any('/logout', 'logout@Admin.User');
    });
};
