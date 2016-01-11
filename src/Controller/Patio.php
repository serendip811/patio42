<?php
namespace Wandu\Publ\Controller;

use Psr\Http\Message\ResponseInterface;
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
        $popupPost = $this->repository->where(['category_id' => 4])->one();
        return Response::plain($this->view->render('index',
            compact('newsPosts', 'pressPosts', 'storePosts', 'popupPost')));
    }

    /**
     * @return ResponseInterface
     */
    public function franchise()
    {
        $popupPost = $this->repository->where(['category_id' => 4])->one();
        return Response::plain($this->view->render('franchise',
            compact('popupPost')));
    }
}
