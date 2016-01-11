<?php
namespace Wandu\Publ\Facade;

class Input extends Facade
{
    /** @var string */
    protected static $accessor = 'input';

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public static function fromBody($name, $default = null)
    {
        return static::getFacade()->body($name, $default);
    }

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public static function fromQuery($name, $default = null)
    {
        return static::getFacade()->query($name, $default);
    }
}
