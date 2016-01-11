(function ($) {
    var
    initialize = function () {
        $('.parallax').parallax();
        
        $('div.change-franchise > div.button').bind('click', addChangeFranchise);
        $('div.change-cost > div.button').bind('click', addChangeCost);
    },

    // 버튼 누르면 franchise 페이지 바꿔주기. (all)
    addChangeFranchise = function () {
        $this = $(this);
        if (! $this.hasClass('active')) {
            if ($this.hasClass('button-patio')) {
                $('div.container-patio').addClass('active');
                $('div.container-thepan').removeClass('active');
            } else {
                $('div.container-patio').removeClass('active');
                $('div.container-thepan').addClass('active');
            }
            $this.addClass('active');
            $this.siblings().removeClass('active');
        }
    },

    // 버튼 누르면 cost 페이지 바꿔주기. (all)
    addChangeCost = function () {
        $this = $(this);
        if (! $this.hasClass('active')) {
            if ($this.hasClass('button-patio')) {
                $('div.table-patio').addClass('active');
                $('div.table-thepan').removeClass('active');
            } else {
                $('div.table-patio').removeClass('active');
                $('div.table-thepan').addClass('active');
            }
            $this.addClass('active');
            $this.siblings().removeClass('active');
        }
    };

    initialize();

})(jQuery);