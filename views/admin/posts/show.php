<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout');
?>

<div class="contents main-second">
    <div class="header">
        <h2>Modify Post</h2>
    </div>
    <form method="post" action="/admin/posts/<?php echo $post['id']?>" class="pure-form pure-form-aligned" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put" />
        <div class="body">
            <fieldset>
                <div class="pure-control-group">
                    <label for="formTitle">Title</label>
                    <input id="formTitle" type="text" name="title" placeholder="Title" autofocus value="<?php echo $post['title']?>" />
                </div>

                <div class="pure-control-group">
                    <label for="formCategory">Category</label>
                    <select id="formCategory" name="category" data-ajax="/admin/ajax/categories" data-value="<?php echo $post['category_id']?>"></select>
                </div>

                <div class="pure-control-group">
                    <label for="formSort">Sort</label>
                    <input id="formSort" type="text" name="sort" placeholder="1부터" autofocus value="<?php echo $post['sort']?>" />
                </div>

                <div class="textarea">
                    <label for="formContents">Contents</label>
                    <textarea id="formContents" name="contents"><?php echo $post['contents']?></textarea>
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[2]">
                    <label for="formExtra1">Url</label>
                    <input id="formExtra1" type="text" name="url" placeholder="Url" value="<?php echo isset($post['extra']['url']) ? $post['extra']['url'] : '' ?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[1,2,4]">
                    <label for="formExtra2">Link</label>
                    <input id="formExtra2" type="text" name="link" placeholder="Link" value="<?php echo isset($post['extra']['link']) ? $post['extra']['link'] : ''?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra3">Filter</label>
                    origin <input id="formExtra3" type="radio" name="filter" value="origin" <?php if (isset($post['extra']['store']['filter'])) { echo ($post['extra']['store']['filter'] === 'origin') ? 'checked' : ''; } ?> />
                    thepan <input id="formExtra3" type="radio" name="filter" value="thepan" <?php if (isset($post['extra']['store']['filter'])) { echo ($post['extra']['store']['filter'] === 'thepan') ? 'checked' : ''; } ?> />
                    patiod <input id="formExtra3" type="radio" name="filter" value="patiod" <?php if (isset($post['extra']['store']['filter'])) { echo ($post['extra']['store']['filter'] === 'patiod') ? 'checked' : ''; } ?> />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra4">페이스북 주소</label>
                    <input id="formExtra4" type="text" name="facebook" placeholder="페이스북 주소" value="<?php echo isset($post['extra']['store']['facebook']) ? $post['extra']['store']['facebook'] : ''?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra6">주소</label>
                    <input id="formExtra6" type="text" name="address" placeholder="주소" value="<?php echo isset($post['extra']['store']['address']) ? $post['extra']['store']['address'] : ''?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra7">전화번호</label>
                    <input id="formExtra7" type="text" name="phone" placeholder="전화번호" value="<?php echo isset($post['extra']['store']['phone']) ? $post['extra']['store']['phone'] : ''?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra8">영업 시간</label>
                    <textarea id="formExtra8" name="time" placeholder="영업 시간" autofocus><?php echo isset($post['extra']['store']['time']) ? $post['extra']['store']['time'] : ''?></textarea>
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra9">좌석 수</label>
                    <input id="formExtra9" type="text" name="seat" placeholder="좌석 수" value="<?php echo isset($post['extra']['store']['seat']) ? $post['extra']['store']['seat'] : ''?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra10">주차 가능 여부</label>
                    <input id="formExtra10" type="checkbox" name="parking" placeholder="주차 가능 여부" value="1" <?php echo isset($post['extra']['store']['parking']) ? 'checked' : ''?> />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra11">지도 y축 좌표</label>
                    <input id="formExtra11" type="text" name="lat" placeholder="지도 x축 좌표" value="<?php echo isset($post['extra']['store']['lat']) ? $post['extra']['store']['lat'] : '1'?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra12">지도 x축 좌표</label>
                    <input id="formExtra112" type="text" name="lng" placeholder="지도 y축 좌표" value="<?php echo isset($post['extra']['store']['lng']) ? $post['extra']['store']['lng'] : ''?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra13">이벤트 여부</label>
                    <input id="formExtra13" type="checkbox" name="event" placeholder="이벤트 여부" value="1" <?php echo isset($post['extra']['store']['event']) ? 'checked' : ''?> />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra14">이벤트 제목 </label>
                    <input id="formExtra14" type="text" name="eventTitle" placeholder="이벤트 제목" value="<?php echo isset($post['extra']['event']['eventTitle']) ? $post['extra']['event']['eventTitle'] : ''?>" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra15">이벤트 내용</label>
                    <textarea id="formExtra15" name="eventContents" placeholder="이벤트 내용" autofocus><?php echo isset($post['extra']['event']['eventContents']) ? $post['extra']['event']['eventContents'] : ''?></textarea>
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra16">이벤트 주소</label>
                    <input id="formExtra16" type="text" name="eventLink" placeholder="이벤트 주소" value="<?php echo isset($post['extra']['event']['eventLink']) ? $post['extra']['event']['eventLink'] : ''?>" />
                </div>

<?php for ($i = 0; $i < 4; $i++) : ?>
                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formEventImage<?php echo $i; ?>">매장 사진<?php echo ($i+1); ?></label>
                    <input id="formEventImage<?php echo $i; ?>" type="file" name="eventImage<?php echo $i; ?>" />
                    <label><input type="checkbox" name="eventImageDelete<?php echo $i?>" value="1" />삭제</label>
                </div>

<?php if (isset($post['extra']['event']['eventImage'][$i]) && isset($post['extra']['event']['eventImage'][$i]['name'])
        && isset($post['extra']['event']['eventImage'][$i]['path'])) : ?>
                    <div class="eventImage">
                        <img src="/files<?php echo $post['extra']['event']['eventImage'][$i]['path']?>" alt="<?php echo $post['extra']['event']['eventImage'][$i]['name']?>" />
                    </div>
<?php endif; ?>
<?php endfor; ?>

                <div class="pure-control-group pure-control-group-choice" data-category="[1,2,3,4,5]">
                    <label for="formThumbnail">Thumbnail</label>
                    <input id="formThumbnail" type="file" name="thumbnail" />
                    <label><input type="checkbox" name="thumbnailDelete" value="1" />삭제</label>
                </div>

<?php if (isset($post['thumbnail']) && isset($post['thumbnail']['path']) && isset($post['thumbnail']['name'])) : ?>
                <div class="thumbnail">
                <?php if(strpos($post['thumbnail']['name'], '.pdf') > 0) : ?>
                    <a href="/files<?php echo $post['thumbnail']['path']?>" target="_new"><?php echo $post['thumbnail']['name']?></a>
                <?php else : ?>
                    <img src="/files<?php echo $post['thumbnail']['path']?>" alt="<?php echo $post['thumbnail']['name']?>" />
                <?php endif; ?>
                </div>
<?php endif; ?>
            </fieldset>
        </div>
        <div class="footer">
            <button type="submit" class="pure-button pure-button-primary">Modify</button>
        </div>
    </form>
</div>
