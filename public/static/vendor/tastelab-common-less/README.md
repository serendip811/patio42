Tastelab Common Less
===

내부에서 작업하는 웹에 기반으로 작성할 Less Library.

## Dependencies

의존성은 있지만 실제로 의존하지 않고 일부 파일을 가져와서 사용하고 있음.

- normalize.css https://github.com/necolas/normalize.css
- bootstrap 3.2.* https://github.com/twbs/bootstrap

## 사용법

```bash
$ bower install https://github.com/tastelab-kr/common-less.git --save
```

desktop의 경우 desktop.less를 사용.
mobile환경의 경우 mobile.less를 사용.


## 소스 수정하는 방법

소스 수정 후, `./test`를 실행 후 정상종료 되는지 확인.

## 예시


```less

@import "...../desktop.less";

@screen-mobile: 240px;
@screen-tablet: 643px;
@screen-desktop: 1200px;

.visible-sm() {
    .visible-less-than( @screen-tablet );
}

.visible-md() {
    .visible-between-and( @screen-tablet, @screen-desktop );
}

.visible-lg() {
    .visible-greater-than( @screen-desktop );
}

.mq-mobile(@rules) {
    @media (max-width: @screen-tablet) {
        @rules();
    }
}

.mq-desktop(@rules) {
    @media (min-width: @screen-tablet) {
        @rules();
    }
}


.show-mobile {
    .mq-desktop({
        display:none;
    });
}

.show-desktop {
    .mq-mobile({
        display:none;
    });
}
```