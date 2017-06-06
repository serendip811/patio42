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
        $storePosts = $this->repository->where(['category_id' => 3])->orderBy(['sort' => true])->all();
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
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
                return Response::redirect("/m");
        if(Input::fromQuery('isMobile') === 'Y'){
            return Response::redirect("/m");
        }


        $newsPosts = array_reverse($this->repository->where(['category_id' => 1])->all()->toArray());
        $pressPosts = $this->repository->where(['category_id' => 2])->all();
        $storePosts = $this->repository->where(['category_id' => 3])->orderBy(['sort' => true])->all();
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
        $storePosts = $this->repository->where(['category_id' => 3])->orderBy(['sort' => true])->all();
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
        $message.= "<br/><br/><br/>*홈페이지를 통해 자동 발송된 메일입니다.";

        mail("Patio42ap@naver.com", "[파티오 창업상담] ".$name, $message, $headers);
        return Response::redirect("/");
    }
}
