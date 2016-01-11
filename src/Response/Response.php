<?php
namespace Wandu\Publ\Response;

use Psr\Http\Message\ServerRequestInterface;
use Wandu\Http\Response as BaseResponse;
use Wandu\Http\Stream;

class Response
{
    /**
     * @param string $location
     * @return Response
     */
    public static function redirect($location)
    {
        return new BaseResponse(302, '', ['Location' => [$location]], null);
    }

    /**
     * @param string $contents
     * @param array $headers
     * @return BaseResponse
     */
    public static function plain($contents, $headers = [])
    {
        $body = new Stream('php://memory', 'r+');
        $body->write($contents);
        return new BaseResponse(200, '', $headers, $body);
    }

    /**
     * @param int $statusCode
     * @param string $message
     * @param array $headers
     * @return BaseResponse
     */
    public static function factory($statusCode, $message, $headers = [])
    {
        $body = new Stream('php://memory', 'r+');
        $body->write($message);
        return new BaseResponse($statusCode, '', $headers, $body);
    }

    /**
     * @param ServerRequestInterface $request
     * @return BaseResponse|Response
     */
    public static function back(ServerRequestInterface $request)
    {
        $serverParams = $request->getServerParams();
        if (isset($serverParams['HTTP_REFERER'])) {
            return static::redirect($serverParams['HTTP_REFERER']);
        }
        return static::factory(200, "<script>window.history.back()</script>");
    }

    /**
     * @param $message
     * @return BaseResponse
     */
    public static function error404($message = 'Not Found')
    {
        return static::factory(404, $message);
    }

    /**
     * @param mixed $contents
     * @return BaseResponse
     */
    public static function ajax($contents)
    {
        return static::factory(200, json_encode($contents), [
            'Content-Type' => ['application/json']
        ]);
    }
}
