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
    <title>파티오42</title>
    <meta name="description" content="캐주얼 이탈리안 레스토랑 & 와인바 / 브랜드 소개 , 매장 정보 및 전국 레스토랑 창업 안내 / TEL : 070-7783-9942">
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
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84126527-1', 'auto');
  ga('send', 'pageview');

</script>

<div class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
</div>

<nav>
    <ul class="sns">
        <li class="face"><a href="https://www.facebook.com/patio42" target="_blank" onfocus="this.blur()"><img src="/static/img/sns_01.png" alt="페이스북"></a></li>
        <li class="instagram"><a href="javascript:alert('준비중입니다');" onfocus="this.blur()"><img src="/static/img/sns_04.png" alt="인스타그램"></a></li>
    </ul>
    <ul>
        <li class="tab tab-about" data-kor="홈" data-eng="HOME">
            <a href="/">HOME</a>
        </li>
        <li class="tab tab-about" data-kor="소개" data-eng="ABOUT">
            <a href="/detail#About">ABOUT</a>
        </li>
        <li class="tab tab-store" data-kor="매장" data-eng="STORE">
            <a href="/detail#Store">STORE</a>
        </li>
        <li class="tab tab-logo">
            <a href="/"><img src="/static/img/logo.png"/></a>
        </li>
        <li class="tab tab-menu" data-kor="메뉴" data-eng="MENU">
            <a href="/detail#MenuLinks">MENU</a>
        </li>
        <li class="tab tab-news" data-kor="소식" data-eng="NEWS">
            <a href="/detail#News">NEWS</a>
        </li>
        <li class="tab tab-franchise" data-kor="창업" data-eng="FRANCHISE">
            <a href="/franchise_new">FRANCHISE</a>
        </li>
    </ul>
</nav>

<?php $i = 0; ?>
<?php foreach ($popupPosts as $key => $popupPost) :?>

<section class="Popup active" name="popup_<?php echo $popupPost['id']; ?>" style="margin-left:<?php echo $i*420; ?>px;">
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
<?php $i++; ?>
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

<script src="/static/vendor/jquery/dist/jquery.js"></script>
<script src="/static/vendor/parallax.js/parallax.min.js"></script>
<script src="/static/js/common.js?20170222"></script>
<?php if (isset($jsFiles)) foreach ($jsFiles as $file) : ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

</body>
</html>
