function map($, targetId, y, x) {
    var oPoint = new nhn.api.map.LatLng(y, x);  //위에서 얻은 x,y값을 이렇게 작성하여 준다 (y값,x값)
    var $self = $('#' + targetId);
    //var targetName = targetId.replace('NaverMap', '').toLowerCase();
    var oMap = new nhn.api.map.Map(targetId, {
        point : oPoint,
        zoom : 12, // – 초기 줌 레벨은 12으로 둔다.
        enableWheelZoom : true,
        enableDragPan : true,
        enableDblClickZoom : false,
        mapMode : 0,
        activateTrafficMap : false,
        activateBicycleMap : false,
        minMaxLevel : [ 1, 14 ],
        size: new nhn.api.map.Size(613.5, 212)
    });

    oMap.addOverlay(new nhn.api.map.Marker(
        new nhn.api.map.Icon(
            '/static/img/map-marker.png',
            new nhn.api.map.Size(28, 37),
            new nhn.api.map.Size(14, 37)
        ),
        {
            title: 'patio',
            point: oPoint
        }
    ));

    oMap.attach('click', function(oCustomEvent) {
        window.open('http://map.naver.com', '_blank');
    });

    $(window).bind('resize', function() {
        if ($(window).width() < 768) {
            oMap.enableDragPan(false);
            oMap.enableWheelZoom(false);
        } else {
            oMap.enableDragPan(true);
            oMap.enableWheelZoom(true);
        }
        var currentWidth = $self.siblings('.slider').width();
        var mapWidth = oMap.getSize().width;
        if (mapWidth !== currentWidth) {
            oMap.setSize(new nhn.api.map.Size(currentWidth-0.5, oMap.getSize().height));
        }
    });
};
