<?php
namespace Wandu\Library;

use ArrayAccess;
use Iterator;
use Wandu\Standard\Arrayable;
use Wandu\Standard\Jsonable;

class Collection implements ArrayAccess, Iterator, Arrayable, Jsonable
{
    use ArrayAccessTrait;

    /**
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        $this->values = $values;
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
        return json_encode($this->values);
    }

    /**
     * @param mixed $item
     */
    public function push($item)
    {
        array_push($this->values, $item);
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->values);
    }

    /**
     * @param mixed $item
     */
    public function unshift($item)
    {
        array_unshift($this->values, $item);
    }

    /**
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->values);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return key($this->values) !== null;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return current($this->values);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->values);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->values);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->values);
    }
}
