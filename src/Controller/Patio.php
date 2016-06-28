<?php
namespace Wandu\Publ\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Publ\Response\Response;

class Patio extends BaseController
{
    /**
     * @return ResponseInterface
     */
    public function index()
    {

        $newsPosts = array_reverse($this->repository->where(['category_id' => 1])->all()->toArray());
        $pressPosts = $this->repository->where(['category_id' => 2])->all();
        $storePosts = $this->repository->where(['category_id' => 3])->all();
        $popupPosts = $this->repository->where(['category_id' => 4])->all();
        return Response::plain($this->view->render('index',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function new_index()
    {

        $newsPosts = array_reverse($this->repository->where(['category_id' => 1])->all()->toArray());
        $pressPosts = $this->repository->where(['category_id' => 2])->all();
        $storePosts = $this->repository->where(['category_id' => 3])->all();
        $popupPosts = $this->repository->where(['category_id' => 4])->all();
        return Response::plain($this->view->render('new_index',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function index2()
    {

        $newsPosts = array_reverse($this->repository->where(['category_id' => 1])->all()->toArray());
        $pressPosts = $this->repository->where(['category_id' => 2])->all();
        $storePosts = $this->repository->where(['category_id' => 3])->all();
        $popupPosts = $this->repository->where(['category_id' => 4])->all();
        return Response::plain($this->view->render('index2',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function franchise()
    {
        $popupPosts = $this->repository->where(['category_id' => 4])->all();
        return Response::plain($this->view->render('franchise',
            compact('popupPosts')));
    }

    public function store_popup(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        $post = $this->repository->where(['id' => $id])->one();
        return Response::plain($this->view->render('store_popup',
            compact('post')));
    }
}
