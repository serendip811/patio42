<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout/new_master', [
    'cssFiles' => [
        '/static/css/index_new.css?20170201',
    ],
    'jsFiles' => [
        '/static/js/jquery.instashow.packaged.js',
        '/static/vendor/isotope/dist/isotope.pkgd.min.js',
        '/static/vendor/jquery.simpleslider/jquery.simpleslider.min.js',
        '/static/js/popup.js?20170201',
        'http://openapi.map.naver.com/openapi/naverMap.naver?ver=2.0&key=31e4d5fd3ada24ea1057920a526149fb',
        '/static/js/map.js',
        '/static/js/index.js?20170201'
    ]
]);
?>

<section id="Header">
    <div class="container">
        <div class="header">
            <div class="header-col header-col-0 active" style="background-image :url(/static/img/bg1.jpeg)"></div>
            <div class="header-col header-col-1" style="background-image :url(/static/img/bg3.jpg)"></div>
            <div class="header-col header-col-2" style="background-image :url(/static/img/bg4.jpg)"></div>
        </div>
    </div>
</section>

<section id="Banner">
    <div class="container">
        <div class="Event banner_area">
            <div class="slide">
            <?php foreach ($newsPosts as $post) : ?>
                <a href="<?php echo isset($post['extra']['link']) ? $post['extra']['link'] : ''?>" target="_blank" class="event-col event-col-0 active">
                    <img src="/files<?php echo $post['thumbnail']['path']?>" width="325" height="372"></img>
                </a>
            <?php endforeach ?>
            </div>
        </div>
        <div class="Menu banner_area">
            <div class="controller">
                <a class="button button-menu-prev">prev image</a>
                <a class="button button-menu-next">next image</a>
            </div>
            <a href="/detail#MenuLinks">
            <div class="slide" style="margin: 56px 12px;">
                <img src="/static/img/menu_2_3.jpg" class="menu-col menu-col-0 active" width="300" height="277"></img>
                <img src="/static/img/menu_3_3.jpg" class="menu-col menu-col-1" width="300" height="277"></img>
                <img src="/static/img/menu_4_3.jpg" class="menu-col menu-col-1" width="300" height="277"></img>
                <img src="/static/img/menu_5_3.jpg" class="menu-col menu-col-1" width="300" height="277"></img>
                <img src="/static/img/menu_6_3.jpg" class="menu-col menu-col-1" width="300" height="277"></img>
            </div>
            </a>
        </div>
        <div class="Store banner_area">
            <div class="new_store" id="StoreItems2">
                <div class="slide">
                <?php foreach ($storePosts as $idx => $post) : ?>
                    <a class="detail" data-store-id="<?php echo $post['id']; ?>">
                        <div class="store-col store-col-0 active">
                                <img alt="<?php echo $post['thumbnail']['name']; ?>" src="files<?php echo $post['thumbnail']['path']; ?>"/>
                            <div class="store_title"><?php echo isset($post['title']) ? $post['title'] : ''; ?></div>
                            <div class="address"><?php echo isset($post['extra']['store']['address']) ?
                                $post['extra']['store']['address'] : ''; ?><br><?php echo isset($post['extra']['store']['phone']) ?
                                $post['extra']['store']['phone'] : ''; ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>

                </div>
                <div class="controller">
                    <a class="button button-store-prev">prev image</a>
                    <a class="button button-store-next">next image</a>
                </div>
            </div>
            <div class="sns_list">
                <h2>파티오 <span class="orange">SNS</span></h2>
                <p class="clear">파티오의 즐거운 이벤트와 새로운 소식을<br>파티오SNS에서 가장 빨리 만나보세요!</p>
                <ul>
                    <li><a href="https://www.facebook.com/patio42" target="_blank"><img src="/static/img/f_sns1.gif" alt="페이스북"></a></li>
                    <!-- <li><a href="javascript:alert('준비중입니다');" onfocus="this.blur()"><img src="/static/img/f_sns2.gif" alt="트위터"></a></li> -->
                    <!-- <li><a href="javascript:alert('준비중입니다');" onfocus="this.blur()"><img src="/static/img/f_sns3.gif" alt="카카오스토리"></a></li> -->
                    <li><a href="https://www.instagram.com/patio_official/" onfocus="this.blur()"><img src="/static/img/f_sns4.gif" alt="인스타그램"></a></li>
                </ul>
            </div>
        </div>
        <div class="Franchise banner_area">
<div style="padding-top:10px;"><a href="/franchise_new" style="font-size: 15px; color: red; text-decoration: underline;">[창업 바로가기 Click!]</a></div>
            <h2 style="padding:10px 20px;">빠른창업상담 </h2>
            <form action="/consulting" method="post" id="consulting_form">
                <table>
                    <tr>
                        <td class="label">이름</td>
                        <td class="value"><input type="text" class="input1" name="name"/></td>
                    </tr>
                    <tr>
                        <td class="label">연락처</td>
                        <td class="value"><input type="text" class="input2" name="tel1"/>-<input type="text" class="input2" name="tel2"/>-<input type="text" class="input2" name="tel3"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea rows="5" placeholder="상담내용을 입력하세요.(창업 희망지역 등)"  name="contents"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input onclick="void(0);" type="image" id="btn_submit" src="/static/img/btn_write1.png" border="0"></td>
                    </tr>
                </table>
            </form>
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
