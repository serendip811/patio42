    <div class="popup popup-<?php echo $post['id']; ?>">
        <a class="close">&times;</a>
        <div class="container">
<?php if (!is_null($post['extra']['store']['event']) && $post['extra']['store']['event'] === "1") : ?>
            <div class="header">
                <div class="col col-1">
                    <div class="decoration">EVENT</div>
                    <div class="title"><?php echo isset($post['extra']['event']['eventTitle']) ?
                            $post['extra']['event']['eventTitle'] : ''; ?></div>
                    <div class="contents"><?php echo isset($post['extra']['event']['eventContents']) ? nl2br($post['extra']['event']['eventContents']) : ''; ?></div>
                </div>
                <div class="col col-2">
                    <a href="<?php echo isset($post['extra']['event']['eventLink']) ? $post['extra']['event']['eventLink'] : '#'; ?>" class="link" target="_blank">이벤트 보러가기</a>
                </div>
            </div>
<?php endif; ?>
            <div class="body">
                <div class="slider">
                    <div class="thumbnails slides">
<?php if (isset($post['extra']['event']['eventImage'])) : ?>
<?php foreach ($post['extra']['event']['eventImage'] as $index => $image) : if (isset($image) && isset($image['name']) && isset($image['path'])) : ?>
                        <div class="slide slide-<?php echo $index?>"><img src="files<?php echo $image['path']?>" alt="<?php echo $image['name']?>"/></div>
<?php endif; endforeach; endif; ?>
                    </div>
                </div>
                <div class="information">
                    <div class="title"><?php echo $post['title']; ?></div>
                    <div class="item address"><?php echo isset($post['extra']['store']['address']) ? $post['extra']['store']['address'] : ''; ?></div>
                    <div class="item phone"><?php echo isset($post['extra']['store']['phone']) ? $post['extra']['store']['phone'] : ''; ?></div>
                    <div class="item time"><?php echo isset($post['extra']['store']['time']) ? nl2br($post['extra']['store']['time']) : ''; ?></div>
                    <div class="item seat"><?php echo isset($post['extra']['store']['seat']) ? $post['extra']['store']['seat'] : ''; ?></div>
                    <div class="item parking"><?php echo $post['extra']['store']['parking'] === '1' ? '주차 가능' : '주차 불가능'; ?></div>
                </div>
                <div id="map-<?php echo $post['id']; ?>" class="map" data-lat="<?php echo isset($post['extra']['store']['lat']) ?
                    $post['extra']['store']['lat'] :''; ?>" data-lng="<?php echo isset($post['extra']['store']['lng']) ?
                    $post['extra']['store']['lng'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>