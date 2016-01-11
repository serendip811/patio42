<?php
namespace Wandu\Modelr\Stubs;

use Wandu\Modelr\Repository;

class ItemRepository extends Repository
{
    protected $name = 'wandu_example';

    public function factory()
    {
        return new Item($this);
    }
}
