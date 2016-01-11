<!DOCTYPE html>
<!--//
This web page has been developed by Wani.
 - me@wani.kr
 - http://wani.kr
-->
<!--[if lte IE 8]><html class="ie" lang="ko"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ko"><!--<![endif]-->
<head>
    <title>Login - Publ</title>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lobster|Droid+Serif|Roboto" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static/publ/css/login.css" />
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>

<div class="container container-vertical">
    <div class="inner">
        <h1>Publ</h1>
        <form method="post" action="/user/login" class="pure-form pure-form-aligned">
            <input type="hidden" name="_token" value="<?php echo $token?>" />
            <fieldset class="pure-group">
                <input type="text" name="username" placeholder="Username" class="pure-input-1" autofocus />
                <input type="password" name="password" placeholder="Password" class="pure-input-1" />
            </fieldset>
            <button type="submit" class="pure-button pure-input-1 pure-button-primary">Sign in</button>
        </form>
    </div>
</div>

</body>
</html>
