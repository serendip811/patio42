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
<div id="Home" class="page">
    <header>
        <div class="logo">
                <span>Since. 2011</span>
                <img src="/static/img/logo2.png"/>
                <span>CASUAL ITALIAN BISTRO & PUB</span>
        </div>
        <div class="description">
            <div>이탈리안의 오리지널리티를 유지하며 독창적인 재료의 다양한 메뉴를 선보이는 우리들만의 아지트</div>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="#Home">*HOME</a>
                </li>
                <li>
                    <a href="#About">ABOUT</a>
                </li>
                <li>
                    <a href="#Store">STORE</a>
                </li>
                <li>
                    <a href="#">MENU</a>
                </li>
                <li>
                    <a href="#">NEWS</a>
                </li>
                <li>
                    <a href="#">FRANCHISE</a>
                </li>
            </ul>
        </div>
    </header>
    <div class="contents">
            <div class="main-image">
                <div class="main-image-col main-image-col-0 active">
                    <img src="/static/img/background-index.jpg">
                    <div class="main-contents">
                        <h1>SP 4. 딸리아뗄레<br/>이탈리안 까르보나라</h1>
                        <div>부드러운 식감의 딸리아뗄레 파스타와 <br/> 촉촉히 묻어나는 레지아노치즈 & 달걀 소스가 <br/> 조화를 이룬 파티오42 추천 파스타</div>
                    </div>
                </div>
                <div class="main-image-col main-image-col-1">
                    <img src="/static/img/about-patio-1.jpg">
                    <div class="main-contents">
                        <h1>SP 3. 딸리아뗄레<br/>이탈리안 까르보나라</h1>
                        <div>부드러운 식감의 딸리아뗄레 파스타와 <br/> 촉촉히 묻어나는 레지아노치즈 & 달걀 소스가 <br/> 조화를 이룬 파티오42 추천 파스타</div>
                    </div>
                </div>
            </div>
            <div id="instagram-contents">
                <div data-is data-is-api="http://www.stylistkelseysue.com/instashow/api/"
                    data-is-source="#patio42, #patioD, #파티오42, #파티오디, #파티오D"
                    data-is-speed="1000"
                    data-is-auto="5000"
                    data-is-rows="1">
                </div>
            </div>
    </div>
</div>
<div id="About" class="page">
    <header>
        <div class="logo">
                <span>Since. 2011</span>
                <img src="/static/img/logo2.png"/>
                <span>CASUAL ITALIAN BISTRO & PUB</span>
        </div>
        <div class="description">
            <div>이탈리안의 오리지널리티를 유지하며 독창적인 재료의 다양한 메뉴를 선보이는 우리들만의 아지트</div>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="#Home">HOME</a>
                </li>
                <li>
                    <a href="#About">*ABOUT</a>
                </li>
                <li>
                    <a href="#Store">STORE</a>
                </li>
                <li>
                    <a href="#">MENU</a>
                </li>
                <li>
                    <a href="#">NEWS</a>
                </li>
                <li>
                    <a href="#">FRANCHISE</a>
                </li>
            </ul>
        </div>
    </header>
    <div class="contents">
    </div>
</div>
<div id="Store" class="page">
    <header>
        <div class="logo">
                <span>Since. 2011</span>
                <img src="/static/img/logo2.png"/>
                <span>CASUAL ITALIAN BISTRO & PUB</span>
        </div>
        <div class="description">
            <div>이탈리안의 오리지널리티를 유지하며 독창적인 재료의 다양한 메뉴를 선보이는 우리들만의 아지트</div>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="#Home">HOME</a>
                </li>
                <li>
                    <a href="#About">ABOUT</a>
                </li>
                <li>
                    <a href="#Store">*STORE</a>
                </li>
                <li>
                    <a href="#">MENU</a>
                </li>
                <li>
                    <a href="#">NEWS</a>
                </li>
                <li>
                    <a href="#">FRANCHISE</a>
                </li>
            </ul>
        </div>
    </header>
    <div class="contents">
    </div>
</div>
<script src="/static/vendor/jquery/dist/jquery.js"></script>
<script src="/static/vendor/parallax.js/parallax.min.js"></script>
<script src="/static/js/common.js"></script>
<?php if (isset($jsFiles)) foreach ($jsFiles as $file) : ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

</body>
</html>
