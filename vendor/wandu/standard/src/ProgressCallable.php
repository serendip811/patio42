<?php
namespace Wandu\Standard;

interface ProgressCallable
{
    /**
     * @param double $ratio
     */
    public function progress($ratio);
}
