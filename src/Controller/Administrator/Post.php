<?php
namespace Wandu\Publ\Controller\Administrator;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Modelr\Repository;
use Wandu\Publ\Controller\BaseController;
use Wandu\Publ\Facade\Input;
use Wandu\Publ\Response\Response;
use Wandu\Publ\Validator\Validator;
use Wandu\Template\Manager;

class Post extends BaseController
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

    /**
     * @return ResponseInterface
     */
    public function index()
    {
        $page = Input::fromQuery('page', 1);
        $category = Input::fromQuery('category');
        $postsBuilder = $this->repository->limit(($page - 1) * 10, 10)->orderBy(['id' => false]);
        if (isset($category)) {
            $postsBuilder = $postsBuilder->where(['category_id' => $category]);
        }
        return Response::plain($this->view->render('admin/posts/index', [
            'posts' => $postsBuilder->all(),
            'query' => isset($category) ? '?category=' . $category : ''
        ]));
    }

    /**
     * @return ResponseInterface
     */
    public function ajaxList()
    {
        $last = Input::fromQuery('last', -1);
        $limit = Input::fromQuery('limit', 10);
        $category = Input::fromQuery('category');
        $queryBuilder = $this->repository->orderBy(['id' => false])->limit(0, $limit);
        if ($last > 0) {
            $queryBuilder = $queryBuilder->where([
                'id' => ['<', $last]
            ]);
        }
        if (isset($category)) {
            $queryBuilder = $queryBuilder->where(['category_id' => $category]);
        }
        return Response::ajax($queryBuilder->all()->toArray());
    }

    /**
     * @param ServerRequestInterface $request
     * @return \Wandu\Http\Response
     */
    public function create(ServerRequestInterface $request)
    {
        $page = Input::fromQuery('page', 1);
        $category = Input::fromQuery('category');
        $postsBuilder = $this->repository->limit(($page - 1) * 10, 10)->orderBy(['id' => false]);
        if (isset($category)) {
            $postsBuilder = $postsBuilder->where(['category_id' => $category]);
        }
        return Response::plain($this->view->render('admin/posts/create', [
            'posts' => $postsBuilder->all(),
            'category' => $category,
            'query' => isset($category) ? '?category=' . $category : ''
        ]));
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function store(ServerRequestInterface $request)
    {
        $validator = new Validator([
            'title' => [Validator::required(), Validator::length(1, 200)],
            'category' => [Validator::required()],
        ]);

        if (!$validator->validate($request->getParsedBody())) {
            return Response::factory(400, $validator->getErrorMessage());
        }

        $title = Input::fromBody('title');
        $category = Input::fromBody('category');
        $contents = Input::fromBody('contents');
        $url = Input::fromBody('url');
        $link = Input::fromBody('link');

        $filter = Input::fromBody('filter');
        $facebook = Input::fromBody('facebook');
        $address = Input::fromBody('address');
        $phone = Input::fromBody('phone');
        $time = Input::fromBody('time');
        $seat = Input::fromBody('seat');
        $parking = Input::fromBody('parking');
        $lat = Input::fromBody('lat');
        $lng = Input::fromBody('lng');
        $event = Input::fromBody('event');

        $eventTitle = Input::fromBody('eventTitle');
        $eventContents = Input::fromBody('eventContents');
        $eventLink = Input::fromBody('eventLink');

        $valuesToInsert = [
            'title' => $title,
            'category_id' => $category,
            'contents' => $contents,
            'extra' => [
                'url' => $url,
                'link' => $link,
                'store' => [
                    'filter' => $filter,
                    'facebook' => $facebook,
                    'address' => $address,
                    'phone' => $phone,
                    'time' => $time,
                    'seat' => $seat,
                    'parking' => $parking,
                    'lat' => $lat,
                    'lng' => $lng,
                    'event' => $event
                ],
                'event' => [
                    'eventTitle' => $eventTitle,
                    'eventContents' => $eventContents,
                    'eventLink' => $eventLink
                ]
            ]
        ];

        $files = $request->getUploadedFiles();

        $valuesToUpdate['thumbnail'] = $this->fileParser($files['thumbnail']);
        for ($i = 0; $i < 4; $i++) {
            $valuesToUpdate['extra']['event']['eventImage'][$i] = $this->fileParser($files['eventImage'.$i]);
        }

        $this->repository->insert($valuesToInsert);
        return Response::redirect('/admin/posts');
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request)
    {
        $page = Input::fromQuery('page', 1);
        $category = Input::fromQuery('category');
        $postsBuilder = $this->repository->limit(($page - 1) * 10, 10)->orderBy(['id' => false]);
        if (isset($category)) {
            $postsBuilder = $postsBuilder->where(['category_id' => $category]);
        }
        $id = $request->getAttribute('id');
        $post = $this->repository->where(compact('id'))->one();
        return Response::plain($this->view->render('admin/posts/show', [
            'posts' => $postsBuilder->all(),
            'post' => $post,
            'query' => isset($category) ? '?category=' . $category : ''
        ]));
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function update(ServerRequestInterface $request)
    {
        $validator = new Validator([
            'title' => [Validator::required(), Validator::length(1, 100)],
            'category' => [Validator::required()]
        ]);

        if (!$validator->validate($request->getParsedBody())) {
            return Response::factory(400, $validator->getErrorMessage());
        }

        $title = Input::fromBody('title');
        $category = Input::fromBody('category');
        $contents = Input::fromBody('contents');
        $url = Input::fromBody('url');
        $link = Input::fromBody('link');

        $filter = Input::fromBody('filter');
        $facebook = Input::fromBody('facebook');
        $master = Input::fromBody('master');
        $address = Input::fromBody('address');
        $phone = Input::fromBody('phone');
        $time = Input::fromBody('time');
        $seat = Input::fromBody('seat');
        $parking = Input::fromBody('parking');
        $lat = Input::fromBody('lat');
        $lng = Input::fromBody('lng');
        $event = Input::fromBody('event');

        $eventTitle = Input::fromBody('eventTitle');
        $eventContents = Input::fromBody('eventContents');
        $eventLink = Input::fromBody('eventLink');

        $valuesToUpdate = [
            'title' => $title,
            'category_id' => $category,
            'contents' => $contents,
            'extra' => [
                'url' => $url,
                'link' => $link,
                'store' => [
                    'filter' => $filter,
                    'facebook' => $facebook,
                    'master' => $master,
                    'address' => $address,
                    'phone' => $phone,
                    'time' => $time,
                    'seat' => $seat,
                    'parking' => $parking,
                    'lat' => $lat,
                    'lng' => $lng,
                    'event' => $event
                ],
                'event' => [
                    'eventTitle' => $eventTitle,
                    'eventContents' => $eventContents,
                    'eventLink' => $eventLink
                ]
            ]
        ];

        $files = $request->getUploadedFiles();


        $post = $this->repository->get($request->getAttribute('id'));

        $valuesToUpdate['thumbnail'] = $this->fileParser($files['thumbnail']);

        if (!isset($valuesToUpdate['thumbnail'])) {
            $valuesToUpdate['thumbnail'] = isset($post['thumbnail']) ? $post['thumbnail'] : '';
            if (Input::fromBody('thumbnailDelete') === '1') {
                $valuesToUpdate['thumbnail'] = '';
            }
        }

        for ($i = 0; $i < 4; $i++) {
            $file = $this->fileParser($files['eventImage'.$i]);
            if (isset($file)) {
                $valuesToUpdate['extra']['event']['eventImage'][$i] = $file;
            } else {
                $valuesToUpdate['extra']['event']['eventImage'][$i] =
                    isset($post['extra']['event']['eventImage'][$i]) ?
                        $post['extra']['event']['eventImage'][$i] :
                        '';
                if (Input::fromBody('eventImageDelete' . $i) === '1') {
                    $valuesToUpdate['extra']['event']['eventImage'][$i] = '';
                }
            }
        }

        $this->repository->where(['id' => $request->getAttribute('id')])->update($valuesToUpdate);
        return Response::redirect('/admin/posts');
    }

    protected function fileParser($file)
    {
        if (isset($file) && $file->getError() === 0) {
            $fileName = $file->getClientFileName();
            $ext = explode(".", $fileName);
            $filePath = tempnam($this->fileRoot, 'post_').'.'.$ext[1];
            $file->moveTo($filePath);
            return [
                'name' => $fileName,
                'path' => str_replace($this->fileRoot, '', $filePath),
            ];
        }
    }


    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function destroy(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        $this->repository->where(compact('id'))->delete();
        return Response::redirect('/admin/posts');
    }
}
