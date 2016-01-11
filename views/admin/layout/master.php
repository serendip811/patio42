<?php
use Wandu\Template\Syntax\Template;

$self = isset($self) ? $self : null;
?>
<!DOCTYPE html>
<!--//
This web page has been developed by Wani.
 - me@wani.kr
 - http://wani.kr
-->
<!--[if lte IE 8]><html class="ie" lang="ko"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ko"><!--<![endif]-->
<head>
    <title><?php echo isset($title) ? $title . ' - ' : '' ?>Publ</title>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lobster|Droid+Serif|Roboto" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static/publ/css/admin.css" />
<?php if (isset($cssFiles)) foreach ($cssFiles as $file) : ?>
    <link rel="stylesheet" href="<?php echo $file?>" />
<?php endforeach; ?>
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>

<aside>
    <h1><a href="/admin" class="logo">Publ</a></h1>
    <div class="nav-inner">
        <a class="pure-button button-logout" href="/user/logout">Logout</a>
        <nav>
            <ul class="pure-menu-list">
                <li class="pure-menu-item<?php echo $self === 'posts'? ' active' : ''?>">
                    <a href="/admin/posts" class="pure-menu-link"><i class="fa fa-pencil"></i> Posts</a>
                </li>
                <li class="pure-menu-item<?php echo $self === 'users'? ' active' : ''?>">
                    <a href="/admin/users" class="pure-menu-link"><i class="fa fa-users"></i> Users</a>
                </li>
                <li class="pure-menu-item<?php echo $self === 'settings'? ' active' : ''?>">
                    <a href="/admin/settings" class="pure-menu-link"><i class="fa fa-cogs"></i> Settings</a>
                </li>
            </ul>
        </nav>
        <ul class="pure-menu-list" id="Categories"></ul>
    </div>
</aside>

<main><?php echo Template::section('main'); ?></main>

<script src="/static/vendor/jquery/dist/jquery.min.js"></script>
<script src="/static/publ/js/common.js"></script>
<?php if (isset($jsFiles)) foreach ($jsFiles as $file) : ?>
<script src="<?php echo $file?>"></script>
<?php endforeach; ?>
</body>
</html>
