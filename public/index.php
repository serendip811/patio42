<?php
namespace Wandu\Publ;

use Wandu\Http\Factory\ServerRequestFactory;
use Wandu\Http\Sender\ResponseSender;

$basePath = dirname(__DIR__);
require $basePath .'/vendor/autoload.php';

$app = new Application($basePath);
$response = $app->execute(ServerRequestFactory::fromGlobals());
ResponseSender::send($response);
