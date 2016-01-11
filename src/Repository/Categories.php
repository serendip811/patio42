<?php
namespace Wandu\Publ\Repository;

use Wandu\Modelr\Repository;
use Wandu\Publ\Model\Category;

class Categories extends Repository
{
    /** @var string */
    protected $name = 'publ_categories';

    /**
     * @return \Wandu\Modelr\Model|Category
     */
    public function factory()
    {
        return new Category($this);
    }
}
