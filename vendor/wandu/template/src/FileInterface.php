<?php
namespace Wandu\Template;

interface FileInterface
{
    /**
     * @param $values
     * @return $this
     */
    public function setValues($values);

    /**
     * @param $layout
     * @param array $values
     * @return $this
     */
    public function setLayout($layout, $values = []);

    /**
     * @param FileInterface $file
     * @return $this
     */
    public function setMain(FileInterface $file);

    /**
     * @param string $target
     * @param string $contents
     * @return $this
     */
    public function setSection($target, $contents);

    /**
     * @param string $target
     * @return string
     */
    public function getSection($target);

    /**
     * @return string
     */
    public function render();


    /**
     * @param $template
     * @return FileInterface
     */
    public function createTemplate($template);
}
