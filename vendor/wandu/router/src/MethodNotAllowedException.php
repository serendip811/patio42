<?php
namespace Wandu\Router;

use Exception;
use RuntimeException;

class MethodNotAllowedException extends RuntimeException
{
    public function __construct($message = "Method not allowed.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
