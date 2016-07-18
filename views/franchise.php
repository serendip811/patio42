<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout/master', [
    'cssFiles' => [
        '/static/css/franchise.css?20160505'
    ],
    'jsFiles' => [
        '/static/js/popup.js?20160505',
        '/static/js/franchise.js?20160505'
    ]
]);
?>

<section id="about">
<?php /*
    <div class="change-franchise" style="background-color:white;">
        <div class="button button-patio active">PATIO42</div>
        <div class="button button-thepan">PATIO42 THE PAN</div>
    </div>

*/?>
    <div class="container container-patio active">
        <div class="title">PATIO42</div>
        <div class="description">파티오42 디자인은 유행을 타지 않도록 엔틱과 모던의 명쾌한 조화로 이루어졌습니다.<br/>돌, 나무, 조명을 적절히 활용하여 우리집 앞마당(Patio) 같은 아늑함을 제공합니다.</div>
        <div class="content">
            <a class="about about-delicious">
                <img src="/static/img/about-patio-1.jpg">
            </a>
            <div class="content-title content-title-delicious">
                <div class="content-title-part part-delicious-1">파티오42는</div>
                <div class="content-title-part part-delicious-2">맛있습니다.</div>
            </div>
            <div class="content-text content-text-delicious">너무 뻔한 이야기이지만, 가장 중요한 기준은 '맛'입니다. 파티오 42의 '맛'이 모든 가맹점에서 동일하게 유지됩니다.</div>
            <a class="about about-handsome">
                <img src="/static/img/about-patio-2.jpg">
            </a>
            <div class="content-title content-title-handsome">
                <div class="content-title-part part-handsome-1">파티오42는</div>
                <div class="content-title-part part-handsome-2">멋있습니다.</div>
            </div>
            <div class="content-text content-text-handsome">인테리어의 마지막은 '사람'입니다. 젊고 트렌디한 파티오42의 스텝과 손님 모두는 '멋'있습니다.</div>
        </div>
    </div>

    <div class="container container-thepan">
        <div class="title">Patio42 The Pan</div>
        <div class="description">기존의 프리미엄급 파티오42 이탈리안 레스토랑이 아닌, 더 저렴하고 캐주얼하게 즐길 수 있는 피자 전문점과 스테이크 전문점으로 분리된 브랜드입니다.</div>
        <div class="content">
            <a class="about about-meat">
                <img src="/static/img/about-thepan-1.jpg">
            </a>
            <div class="content-title content-title-meat">
                <div class="content-title-part part-meat-1">Pan Steak</div><br/>
                <div class="content-title-part part-meat-2">House</div><br/>
                <div class="content-title-part part-meat-3">The Pan</div>
            </div>
            <div class="content-text content-text-meat">파티오42 더팬은 호주산 청정우를 파티오42만의 숙성 방식으로 부드럽고 높은 퀄리티로 유지합니다. 다양한 소스를 이용한 스테이크, 샐러드, 라이스가 그릴 팬 위에 세트로 구성됩니다. </div>
            <a class="about about-pan">
                <img src="/static/img/about-thepan-2.jpg">
            </a>
            <div class="content-title content-title-pan">
                <div class="content-title-part part-pan-1">
                    <img src="/static/img/logo-thepan.png">
                </div>
            </div>
            <div class="content-text content-text-pan">10~30대를 타겟으로 한 캐주얼 팬스테이크 전문점으로, 다양한 소스들과 파티오42의 파스타, 피자 노하우를 더한 ‘가성비’를 최고치로 끌어올립니다.</div>
        </div>
    </div>  
</section>

<section id="picture" class="parallax" data-parallax="scroll" data-image-src="/static/img/parallax-store.jpg">
</section>

<section id="system">
    <div class="container">
        <div class="title">
            <div class="title-part title-part-1">PATIO42의 </div>
            <div class="title-part title-part-2">성공 창업 시스템</div>
        </div>
        <div class="content">
            <div class="explains">
                <div class="explain explain-with">
                    <a class="explain-logo">
                        <img src="/static/img/explain-with.png" />
                    </a>
                    <div class="explain-title">함께하는 파티오42</div>
                    <a class="line"></a>
                    <div class="explain-content">파티오42는 이탈리안 가정식 맛을 고수하면서 동시에 한국인들이 편하게 즐길 수 있는 맛, 가격, 분위기 등 고객만족의 감동을 제공하도록 최선을 다합니다.</div>
                </div>
                <div class="explain explain-trust">
                    <a class="explain-logo">
                        <img src="/static/img/explain-trust.png" />
                    </a>
                    <div class="explain-title">맛에 대한 책임</div>
                    <a class="line"></a>
                    <div class="explain-content">파티오42의 BOH팀은 모든 가맹점의 주방 교육, 메뉴 개발 등을 책임집니다. 본사는 맛의 퀄리티를 위하여 별도의 가공 소스 공급을 최소화합니다. 본사와 동일한 맛이 지속될 수 있도록 기본 레시피를 공유하고 꾸준히 관리하며 함께 협력합니다. 그것이 파티오42와 가맹점 모두가 WIN WIN할 수 있는 길입니다.</div>
                </div>
                <div class="explain explain-study">
                    <a class="explain-logo">
                        <img src="/static/img/explain-study.png" />
                    </a>
                    <div class="explain-title">철저한 교육 및 지원</div>
                    <a class="line"></a>
                    <div class="explain-content">홀과 주방에 대한 철저한 사전 교육을 합니다. 가맹점 주방팀이 본사 방문 교육은 물론, 매니저와 본사 BOH팀이 가맹점에 상주하며 홀과 주방에서 필요로하는 모든 요소에 대한 교육을 실시합니다.</div>
                </div>
                <div class="explain explain-item">
                    <a class="explain-logo">
                        <img src="/static/img/explain-item.png" />
                    </a>
                    <div class="explain-title">멀티 수익형 아이템</div>
                    <a class="line"></a>
                    <div class="explain-content">200개가 넘는 메뉴 운영에서의 노하우와 끝없이 변하는 트렌드에 맞춘 메뉴 개발(시즌별, 요일별, 지역별) 식사와 주류, 커피, 디저트, Take-Out을 함께 할 수 있는 멀티형 아이템으로 수익력을 확보합니다.</div>
                </div>
                <div class="explain explain-transit">
                    <a class="explain-logo">
                        <img src="/static/img/explain-transit.png" />
                    </a>
                    <div class="explain-title">물류 시스템</div>
                    <a class="line"></a>
                    <div class="explain-content">가맹점의 기동성있는 배송을 위해 물류 협력사와 업무 계약 체결을시행하여 매일 새벽 일찍 그날의 신선한 재료를 배송합니다.</div>
                </div>
                <div class="explain explain-support">
                    <a class="explain-logo">
                        <img src="/static/img/explain-support.png" />
                    </a>
                    <div class="explain-title">본사의 마케팅 지원</div>
                    <a class="line"></a>
                    <div class="explain-content">온라인 마케팅, 지역 마케팅 전문 업체와의 제휴로 가장 저렴한 마케팅 비용을 제안하며 각 매장별 꾸준한 이벤트를 다양하게 운영합니다.</div>
                </div>
                <div class="explain explain-custom">
                    <a class="explain-logo">
                        <img src="/static/img/explain-custom.png" />
                    </a>
                    <div class="explain-title">맞춤형 창업 프로그램</div>
                    <a class="line"></a>
                    <div class="explain-content">전국 상권의 유동 인구, 고객 유형, 가시성, 접근성, 경쟁사 분석 등을 통해 전반적인 매장 운영에 대한 컨설팅을 책임집니다.</div>
                </div>
                <div class="explain explain-delivery">
                    <a class="explain-logo">
                        <img src="/static/img/explain-delivery.png" />
                    </a>
                    <div class="explain-title">국내 최초 이탈리안 음식 배달 &amp; 테이크아웃</div>
                    <a class="line"> </a>
                    <div class="explain-content">축적된 포장 노하우를 바탕으로 배달 전문 업체와의 협력을 통한 추가 배달 또는 테이크아웃으로 수익을 창출합니다.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cost" class="parallax" data-parallax="scroll" data-image-src="/static/img/cost.jpg">
    <div class="container">
        <div class="title">가맹개설비용</div>
        <div class="vat">&#91;vat 별도&#93;</div>
        <div class="change-cost">
            <div class="button button-patio active">
                <a>PATIO42</a>
            </div>
<?/*
            <div class="button button-thepan">
                <a>PATIO42 THE PAN</a>
            </div>
*/?>
        </div>
        <div class="table table-patio active">
            <div class="th">
                <div class="td td-title">구분</div>
                <div class="td td-detail">세부내역</div>
                <div class="td td-standard">30평 기준</div>
                <div class="td td-etc">비고</div>
            </div>
            <div class="tr">
                <div class="td td-title">가맹비</div>
                <div class="td td-detail">상호/상표 사용 및 지역별 영업권 보호 경영 노하우 전수</div>
                <div class="td td-standard">600</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr">
                <div class="td td-title">교육비</div>
                <div class="td td-detail">주방 조리 교육 및 레시피 전수 / 홀 서비스 교육</div>
                <div class="td td-standard">600</div>
                <div class="td td-etc">전수 창업</div>
            </div>
            <div class="tr">
                <div class="td td-title">인테리어비</div>
                <div class="td td-detail">실내 인테리어, 목공사, 타일, 주방, 전기, 조명, 가구 등</div>
                <div class="td td-standard">6,000</div>
                <div class="td td-etc">평당 200</div>
            </div>
            <div class="tr">
                <div class="td td-title">가구류</div>
                <div class="td td-detail">의자, 탁자, 붙박이 시트 등</div>
                <div class="td td-standard">1,000</div>
                <div class="td td-etc">야외용 별도</div>
            </div>
            <div class="tr">
                <div class="td td-title">주방 설비</div>
                <div class="td td-detail">냉동냉장고, 토핑, 식기세척기, 화기, 접시류 등</div>
                <div class="td td-standard">2,500</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr">
                <div class="td td-title">주방 집기 / 홀 물품</div>
                <div class="td td-detail">커피머신, 접시, 각종 조리기구, 홀 용품 등</div>
                <div class="td td-standard">1,800</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr">
                <div class="td td-title">M42 마케팅</div>
                <div class="td td-detail">오픈 키워드, 블로그, 바이럴 마케팅</div>
                <div class="td td-standard">400</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr tr-pos">
                <div class="td td-title">POS</div>
                <div class="td td-detail">듀얼모니터, 본체, 프린터, 금전통, 사인패드, 카드체크기 등</div>
                <div class="td td-standard">무상지원</div>
                <div class="td td-etc">지원</div>
            </div>
            <div class="tr">
                <div class="td td-title">이행 보증금</div>
                <div class="td td-detail">계약 이행 보증금</div>
                <div class="td td-standard">200</div>
                <div class="td td-etc">계약 종료시 환급</div>
            </div>
            <div class="tr tr-result">
                <div class="td td-title">합계</div>
                <div class="td td-detail"></div>
                <div class="td td-standard">13,100</div>
                <div class="td td-etc"></div>
            </div>
        </div>
        <div class="table table-thepan">
            <div class="th">
                <div class="td td-title">구분</div>
                <div class="td td-detail">세부내역</div>
                <div class="td td-standard">30평 기준</div>
                <div class="td td-etc">비고</div>
            </div>
            <div class="tr">
                <div class="td td-title">가맹비</div>
                <div class="td td-detail">상호/상표 사용 및 지역별 영업권 보호 경영 노하우 전수</div>
                <div class="td td-standard">600</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr">
                <div class="td td-title">교육비</div>
                <div class="td td-detail">주방 조리 교육 및 레시피 전수 / 홀 서비스 교육</div>
                <div class="td td-standard">400</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr">
                <div class="td td-title">인테리어비</div>
                <div class="td td-detail">실내 인테리어, 목공사, 타일, 주방, 전기, 조명, 가구 등</div>
                <div class="td td-standard">5,400</div>
                <div class="td td-etc">평당 180</div>
            </div>
            <div class="tr">
                <div class="td td-title">가구류</div>
                <div class="td td-detail">의자, 탁자, 붙박이 시트 등</div>
                <div class="td td-standard">800</div>
                <div class="td td-etc">야외용 별도</div>
            </div>
            <div class="tr">
                <div class="td td-title">주방 설비</div>
                <div class="td td-detail">냉동냉장고, 토핑, 식기세척기, 피자 오븐, 화구 등</div>
                <div class="td td-standard">2,500</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr">
                <div class="td td-title">주방 집기 / 홀 물품</div>
                <div class="td td-detail">접시, 각종 조리기구, 홀 용품 및 판촉물</div>
                <div class="td td-standard">1,800</div>
                <div class="td td-etc"></div>
            </div>
            <div class="tr tr-pos">
                <div class="td td-title">POS</div>
                <div class="td td-detail">듀얼모니터, 본체, 프린터, 금전통, 사인패드, 카드체크기 등</div>
                <div class="td td-standard">무상지원</div>
                <div class="td td-etc">지원</div>
            </div>
            <div class="tr">
                <div class="td td-title">이행 보증금</div>
                <div class="td td-detail">계약 이행 보증금</div>
                <div class="td td-standard">200</div>
                <div class="td td-etc">계약 종료시 환급</div>
            </div>
            <div class="tr tr-result">
                <div class="td td-title">합계</div>
                <div class="td td-detail"></div>
                <div class="td td-standard">11,400</div>
                <div class="td td-etc"></div>
            </div>
        </div>
        <div class="optional"><a>&#42;</a> Optional &#58; 간판, 철거, 어닝, 외장, D/P, 전기 증설, 가스, 소방, 냉난방기, 온수 보일러 등은  매장 실측 후 필요 유무에 따라 추가 산정됨</div>
    </div>
</section>

<section id="mail">
    <div class="container">
        <div class="mail-content">가맹점 개설에 대한 상담을 원하시는 분들은<br/>이메일을 통해 연락 부탁드립니다.</div>
        <a href="mailto:patio42ap@naver.com">
            <img src="/static/img/mail-big.png">
        </a>
    </div>
</section>
