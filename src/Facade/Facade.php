<?php
namespace Wandu\Publ\Facade;

use ArrayAccess;
use RuntimeException;

class Facade
{
    /** @var ArrayAccess */
    protected static $container;

    /** @var  string */
    protected static $accessor;

    /**
     * @param ArrayAccess $container
     */
    final public static function setContainer(ArrayAccess $container)
    {
        self::$container = $container;
    }

    /**
     * @return ArrayAccess
     */
    final public static function getContainer()
    {
        return self::$container;
    }

    /**
     * @return mixed
     */
    protected static function getFacade()
    {
        $container = static::getContainer();
        if (!isset(static::$accessor)) {
            throw new RuntimeException("\"accessor\" static property must be inherited.");
        }
        if (!isset($container[static::$accessor])) {
            $accessor = static::$accessor;
            throw new RuntimeException("facade named \"{$accessor}\" is not defined.");
        }
        return static::getContainer()[static::$accessor];
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getFacade();
        switch (count($args))
        {
            case 0:
                return $instance->$method();
            case 1:
                return $instance->$method($args[0]);
            case 2:
                return $instance->$method($args[0], $args[1]);
            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);
            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);
            default:
                return call_user_func_array(array($instance, $method), $args);
        }
    }
}
