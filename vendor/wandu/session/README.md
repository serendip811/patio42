Wandu Session
===

[![Latest Stable Version](https://poser.pugx.org/wandu/session/v/stable.svg)](https://packagist.org/packages/wandu/session)
[![Latest Unstable Version](https://poser.pugx.org/wandu/session/v/unstable.svg)](https://packagist.org/packages/wandu/session)
[![Total Downloads](https://poser.pugx.org/wandu/session/downloads.svg)](https://packagist.org/packages/wandu/session)
[![License](https://poser.pugx.org/wandu/session/license.svg)](https://packagist.org/packages/wandu/session)

[![Build Status](https://img.shields.io/travis/Wandu/Session/master.svg)](https://travis-ci.org/Wandu/Session)
[![Code Coverage](https://scrutinizer-ci.com/g/Wandu/Session/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Wandu/Session/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Wandu/Session/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Wandu/Session/?branch=master)

Session Based on PSR-7(exactly based on PSR-7 ServerRequest's cookie).

## Basic Usage

```php
<?php
namespace Your\OwnNamespace;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wandu\Session\Handler\FileHandler;
use Wandu\Session\Manager;

$request = ''; // PSR7 ServerReqeustInterface
$response = ''; // PSR7 ResponseInterface

$manager = new Manager('WanduSess', new FileHandler(__DIR__));

$session = $manager->readFromRequest($request);
// your code area

$contents = $session['hello'];

$session['hello'] = 'hello worldzzzzzz';

// your code end

$response = $manager->writeToResponse($response, $session);
ResponseSender::send($response);
```

That's too simple. :D