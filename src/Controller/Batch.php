<?php

namespace Wandu\Publ\Controller;
include 'simple_html_dom.php';

use Wandu\Publ\Controller\mycurl;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Modelr\Repository;
use Wandu\Publ\Controller\BaseController;
use Wandu\Publ\Facade\Input;
use Wandu\Publ\Response\Response;
use Wandu\Publ\Validator\Validator;
use Wandu\Template\Manager;

class Batch extends BaseController
{
    /** @var string */
    private $fileRoot;

    /**
     * @param Manager $view
     * @param Repository $repository
     * @param string $filePath
     */
    public function __construct(Manager $view, Repository $repository = null, $filePath = '')
    {
        parent::__construct($view, $repository);
        $this->fileRoot = $filePath;
    }

    public function instagram_ajax()
    {
        $last = Input::fromQuery('last', -1);
        $limit = Input::fromQuery('limit', 8);
        $category = 10;
        $queryBuilder = $this->repository->orderBy(['title' => false])->limit(0, $limit);

        // 여기 고치기 id로 하는게 아니니까...
        if ($last > 0) {
            $queryBuilder = $queryBuilder->where([
                'title' => ['<', $last]
            ]);
        }
        if (isset($category)) {
            $queryBuilder = $queryBuilder->where(['category_id' => $category]);
        }
        return Response::ajax($queryBuilder->all()->toArray());
    }


    /**
     * @return ResponseInterface
     */
    public function instagram()
    {
        $tag_name = Input::fromQuery('tag_name');
        echo $tag_name;
        if(!$tag_name){
            echo $tag_name;
            die;
        }

        $cur = new mycurl('https://www.instagram.com/explore/tags/'.$tag_name.'/', false);
        $cur->createCurl();
        if($cur->getHttpStatus() == 200){
            $html = $cur->__toString();
            $dom = str_get_html($html);

            $idx = 0;
            foreach($dom->find('script') as $script) {
                if($idx == 2){
                    $text = $script->innertext;
                    $text = str_replace("window._sharedData = ", "", $text);
                    $text = str_replace(";", "", $text);

                    $json_text = json_decode($text,true);

                    $tags = $json_text['entry_data']['TagPage'][0]['tag']['media']['nodes'];
                    $category = 10;

                    $tag_infos = array();
                    foreach ($tags as $tag) {

                        $id = $tag['id'];
                        $exist_tag = $this->repository->where(['title' => $id])->one();
                        if($exist_tag) continue;

                        $tag_info = array();
                        $tag_info['id'] = $tag['id'];
                        $tag_info['thumbnail_src'] = $tag['thumbnail_src'];
                        $tag_info['display_src'] = $tag['display_src'];
                        $tag_info['date'] = $tag['date'];
                        $tag_info['code'] = $tag['code'];
                        $tag_info['caption'] = $tag['caption'];
                        $tag_info['comments'] = $tag['comments']['count'];
                        $tag_info['likes'] = $tag['likes']['count'];

                        $tag['caption'] = urlencode($tag['caption']);
                        
                        $valuesToInsert = [
                            'title' => $tag_info['id'],
                            'category_id' => $category,
                            'sort' => $tag_info['date'],
                            'contents' => $tag['caption'],
                            'extra' => [
                                'thumbnail_src' => $tag_info['thumbnail_src'],
                                'display_src' => $tag_info['display_src'],
                                'date' => $tag_info['date'],
                                'code' => $tag_info['code'],
                                'comments' => $tag_info['comments'],
                                'likes' => $tag_info['likes']
                            ]
                        ];

                        $this->repository->insert($valuesToInsert);
                    }
                }
                $idx++;
            }
        }
    }

}
