<?php
namespace Wandu\Template;

use Closure;
use Wandu\Template\Syntax\Template;

class File implements FileInterface
{
    /** @var string */
    private $fileName;

    /** @var array */
    private $values = [];

    /** @var File */
    private $layout = null;

    /** @var FileInterface */
    private $main = null;

    /** @var array array<File> */
    private $sections = [];

    /**
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        if (!file_exists($fileName)) {
            throw new FileNotFoundException("cannot find the file : ".$fileName);
        }
        $this->fileName = $fileName;
    }

    /**
     * @param array $values
     * @return $this
     */
    public function setValues($values)
    {
        $this->values = array_merge($this->values, $values);
        return $this;
    }

    /**
     * @param $layout
     * @param array $values
     * @return File
     */
    public function setLayout($layout, $values = [])
    {
        return $this->layout = $this->createTemplate($layout)->setValues($values)->setMain($this);
    }

    /**
     * @param FileInterface $file
     * @return $this
     */
    public function setMain(FileInterface $file)
    {
        $this->main = $file;
        return $this;
    }

    /**
     * @param string $target
     * @param string $contents
     * @return $this
     */
    public function setSection($target, $contents)
    {
        $this->sections[$target] = $contents;
        return $this;
    }

    /**
     * @param string $target
     * @return string
     */
    public function getSection($target)
    {
        if (isset($this->sections[$target])) {
            return $this->sections[$target];
        }
        if (isset($this->main)) {
            return $this->main->getSection($target);
        }
        return null;
    }

    /**
     * @return string
     */
    public function render()
    {
        $templateLast = Template::setInstance($this);

        $contents =  $this->capture(function () {
            extract($this->values);
            require $this->fileName;
        });

        Template::setInstance($templateLast);

        if (isset($this->layout)) {
            return $this->layout->setSection('main', $contents)->render();
        }
        return $contents;
    }

    /**
     * @param $template
     * @return FileInterface
     */
    public function createTemplate($template)
    {
        return $this->factory($this->getFullPath($template), $this->values);
    }

    /**
     * @param string $template
     * @return string
     */
    protected function getFullPath($template)
    {
        return dirname($this->fileName) ."/{$template}.php";
    }

    /**
     * @param callable $closure
     * @return string
     */
    protected function capture(Closure $closure)
    {
        ob_start();
        call_user_func($closure);
        return ob_get_clean();
    }

    /**
     * @param string $fileFullPath
     * @param array $values
     * @return FileInterface
     */
    public static function factory($fileFullPath, $values = [])
    {
        return (new static($fileFullPath))->setValues($values);
    }
}
