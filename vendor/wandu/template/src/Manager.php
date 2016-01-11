<?php
namespace Wandu\Template;

class Manager
{
    /** @var string */
    private $path;

    /** @var array */
    private $predefinedValues;

    /**
     * @param string $path
     * @param array $predefinedValues
     */
    public function __construct($path, array $predefinedValues = [])
    {
        $this->path = $path;
        $this->predefinedValues = $predefinedValues;
    }

    /**
     * @param $template
     * @param array $values
     * @return string
     */
    public function render($template, $values = [])
    {
        return File::factory("{$this->path}/{$template}.php", $values + $this->predefinedValues)->render();
    }
}
