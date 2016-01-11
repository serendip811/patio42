<?php
namespace Wandu\Publ\Request;

use Psr\Http\Message\ServerRequestInterface;

class Input
{
    /** @var array */
    private $queryParams;

    /** @var array */
    private $parsedBody;

    /**
     * @param ServerRequestInterface $request
     */
    public function __construct(ServerRequestInterface $request)
    {
        $this->queryParams = $request->getQueryParams();
        $this->parsedBody = $request->getParsedBody();
    }

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function query($name, $default = null)
    {
        return isset($this->queryParams[$name]) ? $this->queryParams[$name] : $default;
    }

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function body($name, $default = null)
    {
        return isset($this->parsedBody[$name]) ? $this->parsedBody[$name] : $default;
    }
}
