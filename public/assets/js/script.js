$(document).ready(function () {
    $("#map-toggle").click(function () {
        $(".props-lists").css({"display": "none"});
        $(".props-grid").css({"display": "none"});
        $(".map-view").css({"display": "block"});
    });
    $("#list-toggle").click(function () {
        $(".props-lists").css({"display": "block"});
        $(".props-grid").css({"display": "none"});
        $(".map-view").css({"display": "none"});

    });
    $("#grid-toggle").click(function () {
        $(".props-lists").css({"display": "none"});
        $(".props-grid").css({"display": "block"});
        $(".map-view").css({"display": "none"});
    });
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var widthh = $(window).width();
        if (scroll >= 100 && widthh >= 767) {
            $(".navbar.index").css({
                "height": "auto",
                "transition": "all .3s",
                "background": "#011621"
            });
            // $(".navbar.index .navbar-brand img").attr("src", "assets/img/logo2.svg");
            $(".navbar.index .navbar-brand img").css({
                "height": "65px",
                "transition": "all .2s"
            });
        }
        if (scroll <= 100 && widthh >= 767) {

            $(".navbar.index").css({
                "box-shadow": "none",
                "height": "auto",
                "transition": "all .4s",
                "background": "transparent"
            });
            // $(".navbar.index .navbar-brand img").attr("src", "assets/img/logo.svg");
            $(".navbar.index .navbar-brand img").css({
                "height": "160px",
                "transition": "all .2s"
            });
        }
    });
    $(window).scroll(function () {
        var scrolll = $(window).scrollTop();
        var widthhh = $(window).width();
        var colorr = $(".index .banner-contact .send-button button").css("background");
        if (scrolll >= 50 && widthhh <= 991) {
            $(".navbar.index").css({
                "height": "auto",
                "transition": "all .3s",
                "background": "#011621"
            });
            // $(".navbar.index .navbar-brand img").attr("src", "assets/img/logo2.svg");
            $(".navbar.index .navbar-brand img").css({
                "height": "65px",
                "transition": "all .2s"
            });
            $(".navbar.index .navbar-toggler").css({
                "background": colorr,
                "padding": "10px",
                "transition": "all .4s"
            });
        }
        if (scrolll <= 50 && widthhh <= 991) {
            $(".navbar.index").css({
                "box-shadow": "none",
                "height": "auto",
                "transition": "all .4s",
                "background": "transparent"
            });
            // $(".navbar.index .navbar-brand img").attr("src", "assets/img/logo.svg");
            $(".navbar.index .navbar-brand img").css({
                "height": "90px",
                "transition": "all .2s"
            });

            $(".navbar.index .navbar-toggler").css({
                "background": "transparent",
                "padding": "10px",
                "transition": "all .4s"
            });


        }
    });
    // $(window).scroll(function () {
    //     var scroll1= $(window).scrollTop();
    //     var widthh1= $(window).width();
    //     if (scroll1>= 600 && widthh1>= 767) {
    //         $(".property-detail-page .book-consultation").addClass("fixed-top");
    //
    //     }
    //     if (scroll1<= 600 && widthh1>= 767) {
    //         $(".property-detail-page .book-consultation").removeClass("fixed-top");
    //     }
    // });

    // $("#list-toggle").click(function () {
    //     $(".property-list-view").css({"display": "block"});
    //     $(".property-grid-view").css({"display": "none"});
    //
    // });
    // $("#grid-toggle").click(function () {
    //     $(".property-list-view").css({"display": "none"});
    //     $(".property-grid-view").css({"display": "block"});
    // });
    // var ldform = $(".landing-form").height();
    // var ldbanner = $(".landing .banner").height();
    // var ldbanner = $(".landing .banner").height();
    // $(".landing .banner").css({
    //     "height": "calc(100vh-"+ldform+");"});
    // console.log(ldform);
    // console.log(ldbanner);
    //
});
