<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout');
?>

<div class="contents main-second">
    <div class="header">
        <h2>Create New Post</h2>
    </div>
    <form method="post" action="/admin/posts" class="pure-form pure-form-aligned" enctype="multipart/form-data">
        <div class="body">
            <fieldset>
                <div class="pure-control-group">
                    <label for="formTitle">Title</label>
                    <input id="formTitle" type="text" name="title" placeholder="Title" autofocus />
                </div>

                <div class="pure-control-group">
                    <label for="formCategory">Category</label>
                    <select id="formCategory" name="category" data-ajax="/admin/ajax/categories" data-value="<?php echo $category?>">
                        <option value="0">--------</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="formSort">Sort</label>
                    <input id="formSort" type="text" name="sort" placeholder="1부터" autofocus />
                </div>

                <div class="textarea">
                    <label for="formContents">Contents</label>
                    <textarea id="formContents" name="contents"></textarea>
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[2]">
                    <label for="formExtra1">Url</label>
                    <input id="formExtra1" type="text" name="url" placeholder="Url" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[1,2,4]">
                    <label for="formExtra2">Link</label>
                    <input id="formExtra2" type="text" name="link" placeholder="Link" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra3">Filter</label>
                    origin <input id="formExtra3" type="radio" name="filter" value="origin" checked />
                    thepan <input id="formExtra3" type="radio" name="filter" value="thepan" />
                    patiod <input id="formExtra3" type="radio" name="filter" value="patiod" />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra4">페이스북</label>
                    <input id="formExtra4" type="text" name="facebook" placeholder="페이스북 주소" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra6">주소</label>
                    <input id="formExtra6" type="text" name="address" placeholder="위치" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra7">전화번호</label>
                    <input id="formExtra7" type="text" name="phone" placeholder="전화번호" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra8">영업 시간</label>
                    <textarea id="formExtra8" name="time" placeholder="영업 시간" autofocus></textarea>
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra9">좌석 수</label>
                    <input id="formExtra9" type="text" name="seat" placeholder="좌석 수" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra10">주차 가능 여부</label>
                    <input id="formExtra10" type="checkbox" name="parking" value="1" placeholder="주차 가능 여부" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra11">지도 y축 좌표</label>
                    <input id="formExtra11" type="text" name="lat" placeholder="지도 x축 좌표" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra12">지도 x축 좌표</label>
                    <input id="formExtra12" type="text" name="lng" placeholder="지도 y축 좌표" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra13">이벤트 여부</label>
                    <input id="formExtra13" type="checkbox" name="event" value="1" placeholder="이벤트 여부" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra14">이벤트 제목</label>
                    <input id="formExtra14" type="text" name="eventTitle" placeholder="이벤트 제목" autofocus />
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra15">이벤트 내용</label>
                    <textarea id="formExtra15" name="eventContents" placeholder="이벤트 내용" autofocus></textarea>
                </div>

                <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                    <label for="formExtra16">이벤트 주소</label>
                    <input id="formExtra16" type="text" name="eventLink" placeholder="이벤트 주소" autofocus />
                </div>

<?php for ($i = 0; $i < 4; $i++) : ?>
                    <div class="pure-control-group pure-control-group-choice" data-category="[3]">
                        <label for="formEventImage<?php echo $i; ?>">이벤트 사진 <?php echo $i; ?></label>
                        <input id="formEventImage<?php echo $i; ?>" type="file" name="eventImage<?php echo $i; ?>" />
                    </div>
<?php endfor; ?>

                <div class="pure-control-group pure-control-group-choice" data-category="[1,2,3,4,5]">
                    <label for="formThumbnail">Thumbnail</label>
                    <input id="formThumbnail" type="file" name="thumbnail" />
                </div>
            </fieldset>
        </div>
        <div class="footer">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </form>
</div>
