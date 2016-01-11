<?php
namespace Wandu\Template\Syntax;

use Wandu\Template\FileInterface;

class Template
{
    /** @var FileInterface */
    protected static $instance = null;

    /**
     * @param FileInterface $instance
     * @return FileInterface
     */
    public static function setInstance(FileInterface $instance = null)
    {
        $oldInstance = static::$instance;
        static::$instance = $instance;
        return $oldInstance;
    }

    /**
     * @return FileInterface
     */
    public static function getInstance()
    {
        return static::$instance;
    }

    /**
     * @param $template
     * @param array $values
     * @return string
     */
    public static function load($template, $values = [])
    {
        return static::getInstance()->createTemplate($template)->setValues($values)->render();
    }

    /**
     * @param string $target
     * @return string
     */
    public static function section($target)
    {
        return static::getInstance()->getSection($target);
    }

    /**
     * @param string $layout
     * @param array $values
     * @return void
     */
    public static function setLayout($layout, $values = [])
    {
        static::getInstance()->setLayout($layout, $values);
    }

    /**
     * @param string $target
     * @param string $contents
     */
    public static function setSection($target, $contents)
    {
        static::getInstance()->setSection($target, $contents);
    }
}
