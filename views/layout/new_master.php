<?php
use Wandu\Template\Syntax\Template;
?>

<!DOCTYPE HTML>
<!--//
This web page has been developed by J.
 - june@tastelab.co.kr
-->
<html lang="ko">
<head>
    <title>patio42</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" type="image/ico" href="/static/img/favicon.png
" />
    <!--[if lt IE 9]>
    <script src="/static/vendor/html5shiv/dist/html5shiv.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
<?php if (isset($cssFiles)) foreach ($cssFiles as $file) : ?>
    <link rel="stylesheet" href="<?php echo $file?>" />
<?php endforeach; ?>
    <!--[if lt IE 10]>
    <link rel="stylesheet" href="/static/css/ie.css" />
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="/static/vendor/respond/dest/respond.min.js"></script>
    <![endif]-->

    <script src="/static/vendor/jquery/dist/jquery.js"></script>
    <script src="/static/vendor/parallax.js/parallax.min.js"></script>
    <script src="/static/js/common.js"></script>
    <?php if (isset($jsFiles)) foreach ($jsFiles as $file) : ?>
    <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

</head>
<body>


<div class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
</div>

<nav>
    <ul>
        <li class="tab tab-about">
            <a href="/#About">ABOUT</a>
        </li>
        <li class="tab tab-event">
            <a href="/#Event">EVENT</a>
        </li>
        <li class="tab tab-store">
            <a href="/#Store">STORE</a>
        </li>
        <li class="tab tab-logo">
            <a href="/"><img src="/static/img/logo.png"/></a>
        </li>
        <li class="tab tab-menu">
            <a href="/#MenuLinks">MENU</a>
        </li>
        <li class="tab tab-news">
            <a href="/#News">NEWS</a>
        </li>
        <li class="tab tab-franchise">
            <a href="/franchise">FRANCHISE</a>
        </li>
    </ul>
</nav>

<?php foreach ($popupPosts as $key => $popupPost) :?>

<section class="Popup active" name="popup_<?php echo $popupPost['id']; ?>">
    <a class="close">x</a>
    <div class="container-popup">
        <div class="thumbnail">
<?php if (isset($popupPost['thumbnail']) && isset($popupPost['thumbnail']['name']) && isset($popupPost['thumbnail']['path'])) : ?>
<?php if (isset($popupPost['extra']['link']) && $popupPost['extra']['link'] !== "") { ?>
                <a href="<?php echo $popupPost['extra']['link']; ?>">
<?php } else {?>
                <a href="#!">
<?php } ?>
                    <img alt="<?php echo $popupPost['thumbnail']['name']; ?>" src="files<?php echo $popupPost['thumbnail']['path']; ?>" />
                </a>
<?php endif; ?>
        </div>
    </div>
</section>
<?php endforeach ?>


<?php echo Template::section('main'); ?>

<footer>
    <div class="container">
        <div class="social">
            <a class="fb" href="https://www.facebook.com/patio42" target="_blank"></a>
            <a class="mail" href="mailto:patio42ap@naver.com"></a>
        </div>
        <address>서울특별시 강남구 논현로159길 10 대표: 김영일<br/>
            Tel: 070-7783-9942  Email: patio42ap@naver.com</address>
        <div class="copyright">&copy; 2015 PATIO42</div>
    </div>
</footer>



</body>
</html>