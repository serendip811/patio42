<?php
namespace Wandu\Standard;

use Wandu\Standard\IO\Writable;

interface Executable
{
    /**
     * @param string $command
     * @return string
     */
    public function execute($command);

    /**
     * @param $command
     * @param Writable $writer
     * @return int
     */
    public function executeWithWriter($command, Writable $writer);
}
