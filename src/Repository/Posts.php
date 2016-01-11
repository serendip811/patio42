<?php
namespace Wandu\Publ\Repository;

use Wandu\Modelr\Repository;
use Wandu\Publ\Model\Post;

class Posts extends Repository
{
    /** @var string */
    protected $name = 'publ_posts';

    /**
     * @return \Wandu\Modelr\Model|Post
     */
    public function factory()
    {
        return new Post($this);
    }

    /**
     * @param array $arrayToDatabase
     * @return array
     */
    public function toDatabaseFilter(array $arrayToDatabase)
    {
        if (isset($arrayToDatabase['thumbnail'])) {
            $arrayToDatabase['thumbnail'] = json_encode($arrayToDatabase['thumbnail']);
        }
        if (isset($arrayToDatabase['extra'])) {
            $arrayToDatabase['extra'] = json_encode($arrayToDatabase['extra']);
        }
        return $arrayToDatabase;
    }

    /**
     * @param array $arrayFromDatabase
     * @return array
     */
    public function fromDatabaseFilter(array $arrayFromDatabase)
    {
        if (isset($arrayFromDatabase['thumbnail']) && $arrayFromDatabase['thumbnail'] !== '') {
            $arrayFromDatabase['thumbnail'] = json_decode($arrayFromDatabase['thumbnail'], true);
        }
        if (isset($arrayFromDatabase['extra']) && $arrayFromDatabase['extra'] !== '') {
            $arrayFromDatabase['extra'] = json_decode($arrayFromDatabase['extra'], true);
        }
        return $arrayFromDatabase;
    }
}
