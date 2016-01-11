<?php
namespace Wandu\Standard\IO;

interface Writable
{
    /**
     * @param string $text
     */
    public function write($text = '');
}
