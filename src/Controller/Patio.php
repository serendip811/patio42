<?php
namespace Wandu\Publ\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Publ\Response\Response;
use Wandu\Publ\Facade\Input;

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
        $popupPosts = array_reverse($this->repository->where(['category_id' => 4])->all()->toArray());
        $menuPosts = $this->repository->where(['category_id' => 5])->all();
        return Response::plain($this->view->render('index',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPosts', 'menuPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function new_index()
    {

        $newsPosts = array_reverse($this->repository->where(['category_id' => 1])->all()->toArray());
        $pressPosts = $this->repository->where(['category_id' => 2])->all();
        $storePosts = $this->repository->where(['category_id' => 3])->all();
        $popupPosts = array_reverse($this->repository->where(['category_id' => 4])->all()->toArray());
        $menuPosts = $this->repository->where(['category_id' => 5])->all();
        return Response::plain($this->view->render('new_index',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPosts', 'menuPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function index_detail()
    {

        $newsPosts = array_reverse($this->repository->where(['category_id' => 1])->all()->toArray());
        $pressPosts = $this->repository->where(['category_id' => 2])->all();
        $storePosts = $this->repository->where(['category_id' => 3])->all();
        $popupPosts = array_reverse($this->repository->where(['category_id' => 4])->all()->toArray());
        $menuPosts = $this->repository->where(['category_id' => 5])->all();
        return Response::plain($this->view->render('index_detail',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPosts', 'menuPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function index2()
    {

        $newsPosts = array_reverse($this->repository->where(['category_id' => 1])->all()->toArray());
        $pressPosts = $this->repository->where(['category_id' => 2])->all();
        $storePosts = $this->repository->where(['category_id' => 3])->all();
        $popupPosts = array_reverse($this->repository->where(['category_id' => 4])->all()->toArray());
        return Response::plain($this->view->render('index2',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function franchise()
    {
        $popupPosts = array_reverse($this->repository->where(['category_id' => 4])->all()->toArray());
        return Response::plain($this->view->render('franchise',
            compact('popupPosts')));
    }

    /**
     * @return ResponseInterface
     */
    public function franchise_new()
    {
        $popupPosts = array_reverse($this->repository->where(['category_id' => 4])->all()->toArray());
        return Response::plain($this->view->render('new_franchise',
            compact('popupPosts')));
    }

    public function store_popup(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        $post = $this->repository->where(['id' => $id])->one();
        return Response::plain($this->view->render('store_popup',
            compact('post')));
    }

    public function consulting(ServerRequestInterface $request)
    {
        $name = Input::fromBody('name');
        $tel1 = Input::fromBody('tel1');
        $tel2 = Input::fromBody('tel2');
        $tel3 = Input::fromBody('tel3');
        $contents = Input::fromBody('contents');

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message = "파티오 창업상담 알림<br/><br/>";
        $message.= "이름 : ".$name." <br/>";
        $message.= "연락처 : ".$tel1."-".$tel2."-".$tel3." <br/>";
        $message.= "<br/>";
        $message.= "<pre>".$contents."</pre>";

        mail("serendip@neowiz.com", "[파티오 창업상담] ".$name, $message, $headers);
        return Response::redirect("/");
    }
}
