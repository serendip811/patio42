<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout/new_master', [
    'cssFiles' => [
        '/static/css/index_new.css?20160713',
    ],
    'jsFiles' => [
        '/static/js/jquery.instashow.packaged.js',
        '/static/vendor/isotope/dist/isotope.pkgd.min.js',
        '/static/vendor/jquery.simpleslider/jquery.simpleslider.min.js',
        '/static/js/popup.js?20160628',
        'http://openapi.map.naver.com/openapi/naverMap.naver?ver=2.0&key=31e4d5fd3ada24ea1057920a526149fb',
        '/static/js/map.js',
        '/static/js/index.js?20160628'
    ]
]);
?>

<section id="Header">
    <div class="container">
        <div class="header">
            <div class="header-col header-col-0 active" style="background-image :url(/static/img/bg1.jpeg)"></div>
            <div class="header-col header-col-1" style="background-image :url(/static/img/bg2.jpeg)">
            </div>
        </div>
    </div>
</section>

<section id="About">
    <div class="container">
    <h2>ABOUT</h2>
	<div class="picture picture-1"><img src="/static/img/About-interior.jpg" /></div>
        <div class="content content-1">
            <div class="thumbnail"><img src="/static/img/About-interior-thumbnail.png" /></div>
            <div class="text">점심에는 레스토랑으로, 저녁에는 캐주얼바로<br />
                운영되며 그 외 시간대에는 누구나 편히 쉴 수 있는<br />
                카페로 즐길 수 있는 복합공간의 파티오42
            </div>
        </div>
        <div class="picture picture-2"><img src="/static/img/About-food.png" /></div>
        <div class="content content-2">
            <div class="thumbnail"><img src="/static/img/About-food-thumbnail.png" /></div>
            <div class="text">독창적인 재료의 다양한 소스와 레시피로<br />
                흔히 접할 수 없는 이탈리안 가정식 요리들을 선보이는<br />
                우리들만의 아지트 파티오42
            </div>
        </div>
        <div class="picture picture-3"><img src="/static/img/About-name2.jpeg" /></div>
        <div class="content content-3">
            <div class="text">"파티오42"는 앞마당을 뜻하는 '파티오'와<br />
                영화 '은하수를 여행하는 히치하이커를 위한 안내서'의<br />
                숫자 '42'에서 이름을 따왔습니다.
            </div>
        </div>
        <div class="banner">
            <div class="thumbnail"><img src="/static/img/About-banner.png" /></div>
            <div class="text">인생과 우주, 그리고 모든 것에 대한 답을 뜻한다는 숫자 '42'. 우리는 이 숫자처럼 '파티오42'라는 공간이 맛있는 음식과 함게 어떠한 답을 찾아 특별한 순간을 만끽할 수 있는 아지트가 되기를 희망합니다.
            </div>
        </div>
    </div>
</section>

<section id="Store">
    <div class="container">
        <h2>STORE</h2>
        <div id="StoreCategoriesMobile">All</div>
        <div id="StoreCategories" class="">
            <div class="category active"><a data-filter="*">ALL</a></div>
            <div class="category"><a data-filter=".origin">PATIO42</a></div>
            <!--div class="category"><a data-filter=".thepan">PATIO42 THE PAN</a></div-->
            <div class="category category-last"><a data-filter=".patiod">PATIO D</a></div>
        </div>
        <div id="StoreItems">
<?php foreach ($storePosts as $idx => $post) : ?>
            <div class="item <?php echo isset($post['extra']['store']['filter']) ? $post['extra']['store']['filter'] : ''; ?>">
<?php if (isset($post['thumbnail']) && isset($post['thumbnail']['name']) && isset($post['thumbnail']['path'])) : ?>
                <div class="thumbnail"><img alt="<?php echo $post['thumbnail']['name']; ?>" src="files<?php echo $post['thumbnail']['path']; ?>" /></div>
<?php endif; ?>
                <div class="contents">
                    <div class="category"><?php echo ($post['extra']['store']['filter'] === 'origin') ?
                            'PATIO42': (($post['extra']['store']['filter'] === 'thepan') ? 'PATIO42 THE PAN' : 'PATIO D'); ?></div>
                    <div class="title"><?php echo isset($post['title']) ? $post['title'] : ''; ?></div>
                    <div class="address"><?php echo isset($post['extra']['store']['address']) ?
                            $post['extra']['store']['address'] : ''; ?><br /><?php echo isset($post['extra']['store']['phone']) ?
                            $post['extra']['store']['phone'] : ''; ?>
                    </div>
                </div>
                <div class="footer">
                    <a class="detail" data-store-id="<?php echo $post['id']; ?>">매장정보 상세보기</a>
                    <a class="facebook" href="<?php echo isset($post['extra']['store']['facebook']) ?
                        $post['extra']['store']['facebook'] : ''; ?>" target="_blank">Facebook</a>
                </div>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</section>

<section id="MenuLinks">
    <h2>MENU</h2>
    <div class="row">
        <div class="links-col links-col-1">
            <div class="logo"><img src="/static/img/MenuLinks-logo-1.png"></div>
            <a style="height:50px;" class="view view-1" href="/files<?php echo $menuPosts[0]['thumbnail']['path']; ?>" target="_blank">VIEW MENU<br/>압구정 본점</a>
        </div>
        <!--div class="links-col links-col-2">
            <div class="logo" style="width:65%"><img src="/static/img/MenuLinks-logo-2-1.png"></div>
            <a style="height:50px;" class="view view-2" href="/files<?php echo $menuPosts[1]['thumbnail']['path']; ?>" target="_blank">VIEW MENU<br/>가로수길 본점</a>
        </div-->
        <!--div class="links-col links-col-3">
            <div class="logo"><img src="/static/img/MenuLinks-logo-3.png"></div>
            <a class="view view-3" target="_blank">준비중입니다</a>
        </div-->
    </div>
    <div class="row" style="padding-top:15px; padding-bottom:15px;">
        <span style="height:15px;color:black;font-size:15px">
            * 각 매장마다 다를 수 있으니 각 매장에 문의 바랍니다.
        </span>
    </div>
</section>

<section id="Menu">
    <div class="container">
        <div class="content">
            <div class="text text-main">"재료의 신선도는<br />음식의 생명입니다."</div>
            <div class="text text-sub">파티오42의 바질, 루꼴라, 이태리 파슬리 등 일부 특수 채소는 대전에 위치한 파티오 42 직영농장에서 무농약으로 재배되며 그 외 모든 식재료들은 테이블 위의 건강함을 유지하기 위해 매일 새벽 각 매장으로 직배송됩니다.
            </div>
        </div>
        <div class="picture"></div>
    </div>
</section>

<section id="News">
    <div class="container">
        <h2>NEWS & EVENT</h2>
        <div id="NewsItems">
<?php foreach ($newsPosts as $post) : ?>
            <div class="item item-1">
                <div class="thumbnail">
                    <a href="<?php echo isset($post['extra']['link']) ? $post['extra']['link'] : ''?>" target="_blank">
<?php if (isset($post['thumbnail']) && isset($post['thumbnail']['path'])) :?>
                        <img src="/files<?php echo $post['thumbnail']['path']?>" />
<?php endif ?>
                    </a>
                </div>
                <div class="content">
                    <div class="title"><?php echo isset($post['title']) ? $post['title'] : ''?></div>
                </div>
            </div>
<?php endforeach ?>
        </div>
    </div>
</section>

<section id="Press">
    <h2>PRESS</h2>
    <div class="container">
        <div class="controller">
            <a class="button button-press-prev">prev image</a>
            <a class="button button-press-next">next image</a>
        </div>
        <div class="press">
<?php foreach ($pressPosts as $index => $post) : ?>
            <div class="press-col press-col-<?php echo $index?> <?php echo $index === 0 ? 'active' : '' ?>">
                <div class="thumbnail">
<?php if (isset($post['thumbnail']) & isset($post['thumbnail']['path'])) :?>
                   <img src="/files<?php echo $post['thumbnail']['path']; ?>" />
<?php endif; ?>
                </div>
                <div class="content">
                    <div class="title"><?php echo isset($post['title']) ? $post['title'] : ''; ?></div>
                    <div class="text"><?php echo isset($post['contents']) ? nl2br($post['contents']) : ''; ?></div>
                    <div class="link"><?php echo isset($post['extra']['url']) ? $post['extra']['url'] : ''?></div>
                </div>
                <a class="button-read" href="<?php echo isset($post['extra']['link']) ? $post['extra']['link'] : '#'?>" target="_blank">READ</a>
            </div>
<?php endforeach ?>
        </div>
    </div>
</section>

<div class="popups">
</div>
