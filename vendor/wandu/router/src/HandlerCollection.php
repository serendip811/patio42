<?php
namespace Wandu\Router;

use ArrayAccess;
use Countable;
use Psr\Http\Message\ServerRequestInterface;

class HandlerCollection implements Countable
{
    /** @var array */
    protected $handlers;

    /** @var int */
    protected $nextCount;

    /** @var ArrayAccess */
    protected $controllers;
    /**
     * @param ArrayAccess $controllers
     * @param array $handlers
     */
    public function __construct(array $handlers = [])
    {
        $this->handlers = $handlers;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->handlers);
    }

    /**
     * @param ServerRequestInterface $request
     * @return mixed
     */
    public function execute(ServerRequestInterface $request, ArrayAccess $controllers)
    {
        $this->nextCount = 0;
        $this->controllers = $controllers;
        return $this->next($request);
    }

    /**
     * @param ServerRequestInterface $request
     * @return mixed
     */
    public function next(ServerRequestInterface $request)
    {
        if (!isset($this->handlers[$this->nextCount])) {
            return;
        }
        $handler = $this->filterHandler($this->handlers[$this->nextCount]);
        return call_user_func($handler, $request, function (ServerRequestInterface $request) {
            $this->nextCount++;
            return $this->next($request);
        });
    }

    /**
     * @param string|callable $handler
     * @return callable
     */
    protected function filterHandler($handler)
    {
        if (!is_callable($handler)) {
            list($methodName, $className) = explode('@', $handler);
            $handler = [$this->controllers[$className], $methodName];
        }
        return $handler;
    }
}
