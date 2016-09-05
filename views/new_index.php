<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout/new_master', [
    'cssFiles' => [
        '/static/css/index_new.css',
    ],
    'jsFiles' => [
        '/static/js/jquery.instashow.packaged.js',
        '/static/vendor/isotope/dist/isotope.pkgd.min.js',
        '/static/vendor/jquery.simpleslider/jquery.simpleslider.min.js',
        '/static/js/popup.js?20160505',
        'http://openapi.map.naver.com/openapi/naverMap.naver?ver=2.0&key=31e4d5fd3ada24ea1057920a526149fb',
        '/static/js/map.js',
        '/static/js/index.js?20160505'
    ]
]);
?>

<section id="Header">
    <div class="container">
        <div class="header">
            <div class="header-col header-col-0 active" style="background-image :url(/static/img/bg1.jpeg)"></div>
            <div class="header-col header-col-1" style="background-image :url(/static/img/bg2.jpeg)"></div>
        </div>
    </div>
</section>

<section id="Banner">
    <div class="container">
        <div class="Event banner_area">
            <div class="slide">
                <img src="http://www.raracost.com/img/main/s_b1_1.jpg" class="event-col event-col-0 active"></img>
                <img src="http://fakeimg.pl/325x372/09F/fff/?text=Event" class="event-col event-col-1"></img>
                <img src="http://fakeimg.pl/325x372/9F0/fff/?text=325x372" class="event-col event-col-2"></img>
            </div>
        </div>
        <div class="Menu banner_area">
            <div class="controller">
                <a class="button button-menu-prev">prev image</a>
                <a class="button button-menu-next">next image</a>
            </div>
            <div class="slide">
                <img src="http://www.raracost.com/img/main/s_b2_img3.png" class="menu-col menu-col-0 active"></img>
                <img src="http://fakeimg.pl/251x214/F90/fff/?text=menu" class="menu-col menu-col-1"></img>
                <img src="http://fakeimg.pl/251x214/9F0/fff/?text=251x214" class="menu-col menu-col-2"></img>
            </div>
        </div>
        <div class="Store banner_area">
            <div class="new_store">
                <div class="slide">
                    <div class="store-col store-col-0 active">
                        <img src="http://patio42.co.kr/files/post_YpUTGF.jpg"/>
                        <div class="store_title">강남구청점</div>
                        <div class="address">서울특별시 강남구 학동로56길 26<br>02-6200-6642</div>
                    </div>
                    <div class="store-col store-col-1">
                        <img src="http://fakeimg.pl/325x185/F90/fff/?text=new store"/>
                        <div class="store_title">신사점</div>
                        <div class="address">서울특별시 강남구 논현동 16-44<br>02-516-1142</div>
                    </div>
                    <div class="store-col store-col-2">
                        <img src="http://fakeimg.pl/325x185/0F9/fff/?text=325x185"/>
                        <div class="store_title">부산점</div>
                        <div class="address">부산광역시 무슨구 무슨동 1234<br>051-1234-5678</div>
                    </div>
                </div>
                <div class="controller">
                    <a class="button button-store-prev">prev image</a>
                    <a class="button button-store-next">next image</a>
                </div>
            </div>
            <div class="franchise">
                <img src="http://www.raracost.com/img/main/s_b3_t_bg.gif" height="179" width="325">
            </div>
        </div>
    </div>
    
</section>

<section id="Instagram">
    <div class="container">
        <h2># INSTAGRAM</h2>
        <div id="instagram-contents">
            <div data-is data-is-api="http://www.stylistkelseysue.com/instashow/api/"
                data-is-source="#patio42, #patioD, #파티오42, #파티오디, #파티오D"
                data-is-speed="1000"
                data-is-auto="5000">
            </div>
        </div>
    </div>
</section>

<div class="popups">
</div>
