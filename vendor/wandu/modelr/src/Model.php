<?php
namespace Wandu\Modelr;

use ArrayAccess;
use Wandu\Standard\Arrayable;
use Wandu\Standard\Jsonable;
use Wandu\Library\ArrayAccessTrait;

abstract class Model implements Arrayable, Jsonable, ArrayAccess
{
    use ArrayAccessTrait;

    /** @var Repository */
    protected $repository;

    /** @var string */
    protected $primaryKey = 'id';

    /** @var array */
    protected $defaults = [];

    /**
     * @param Repository $repository
     */
    public function __construct(Repository $repository = null)
    {
        $this->values = $this->defaults;
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->values;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * @param array $valuesFromArray
     * @return self
     */
    public function fromArray($valuesFromArray)
    {
        $this->values = $valuesFromArray;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
}
