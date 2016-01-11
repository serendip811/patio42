<?php
namespace Wandu\Publ\Facade;

class Session extends Facade
{
    /** @var string */
    protected static $accessor = 'session.storage';

    /**
     * @param string $name
     * @return mixed
     */
    public static function get($name)
    {
        return static::getFacade()->get($name);
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public static function set($name, $value)
    {
        static::getFacade()->set($name, $value);
    }

    /**
     * @param string $name
     */
    public static function remove($name)
    {
        static::getFacade()->offsetUnset($name);
    }
}
