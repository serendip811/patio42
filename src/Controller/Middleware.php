<?php
namespace Wandu\Publ\Controller;

use Closure;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Publ\Response\Response;
use Wandu\Session\Manager;
use Wandu\Standard\DI\ContainerInterface;

class Middleware
{
    /** @var ContainerInterface */
    private $container;

    /** @var Manager */
    private $session;

    /**
     * @param ContainerInterface $container
     * @param Manager $session
     */
    public function __construct(ContainerInterface $container, Manager $session)
    {
        $this->container = $container;
        $this->session = $session;
    }

    /**
     * @param ServerRequestInterface $request
     * @param callable $next
     * @return ResponseInterface
     */
    public function responsiblize(ServerRequestInterface $request, Closure $next)
    {
        $response = $next($request);
        if (is_string($response) || !isset($response)) {
            $response = Response::plain($response);
        }
        return $response;
    }

    /**
     * @param ServerRequestInterface $request
     * @param callable $next
     * @return ResponseInterface
     */
    public function session(ServerRequestInterface $request, Closure $next)
    {
        $storage = $this->session->readFromRequest($request);
        $this->container->instance('session.storage', $storage);
        return $this->session->writeToResponse($next($request), $storage);
    }
}
