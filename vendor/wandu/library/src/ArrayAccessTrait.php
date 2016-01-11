<?php
namespace Wandu\Library;

trait ArrayAccessTrait
{
    /** @var array */
    protected $values = [];

    /**
     * @param string $name
     * @return mixed|null
     */
    public function offsetGet($name)
    {
        return isset($this->values[$name]) ? $this->values[$name] : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function offsetSet($name, $value)
    {
        $this->values[$name] = $value;
    }

    /**
     * @param string $name
     */
    public function offsetUnset($name)
    {
        unset($this->values[$name]);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function offsetExists($name)
    {
        return isset($this->values[$name]);
    }
}
