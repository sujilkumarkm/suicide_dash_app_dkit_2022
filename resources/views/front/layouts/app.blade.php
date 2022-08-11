<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('front.layouts.head')

    @yield('styles')
</head>
<body class="font-sans antialiased hold-transition sidebar-mini">


    <div class="min-h-screen bg-gray-100">

        <!-- Navigation Bar -->
        @include('front.layouts.navigation')

        <!-- Main content -->
    @yield('content')

        @include('front.layouts.footer')
        <!-- Footer content -->

    </div>
</body>
<script>
    function confirmation(i){
        if(confirm('are you sure?')){
            let form_name='delete-form-'+i;
            document.getElementById(form_name).submit();
        }else{
            return false;
        }
    }
</script>
@include('front.layouts.scripts')

<script src="{{asset('/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- form submission -->
<script src="{{asset('/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- New Price range script -->
<script>
    var formatter = new Intl.NumberFormat('en-US', {
        maximumSignificantDigits: 3
    });
    $('.dropdown-menu.ddRange')
        .click(function (e) {
            e.stopPropagation();
        });

    function disableDropDownRangeOptions(max_values, minValue) {
        if (max_values) {
            let minval = parseInt(minValue);
            if (minval < 600000 || minval == '') {
                var x = 50000;
                var y = 50000;
            } else if (minval >= 600000 && minval < 1500000) {
                var x = 100000;
                var y = 100000;
            } else if (minval == 1500000) {
                var x = 250000;
                var y = 250000;
            } else {
                var x = 500000;
                var y = 500000;
            }
            max_values.each(function () {
                if (this.id != 'maxX') {
                    $(this).attr('value', minval + x);
                    $(this).html('$' + formatter.format(minval + x));
                    x += y;
                }


                // if (parseInt(maxValue) < parseInt(minValue)) {
                //     $(this).addClass('disabled');
                // } else {
                //     $(this).removeClass('disabled');
                // }
            });
        }
    }

    function setuinvestRangeDropDownList(min_values, max_values, min_input, max_input, clearLink, dropDownControl) {
        min_values.click(function () {
            var minValue = $(this).attr('value');
            min_input.val(minValue);
            max_input.val('');
            document.getElementById('price_range1').innerHTML = '$' + formatter.format(minValue);
            document.getElementById('price_range1').setAttribute('value', minValue);
            document.getElementById('price_range2').innerHTML = '';
            document.getElementById('price_range2').setAttribute('value', '');
            //Update max values
            disableDropDownRangeOptions(max_values, minValue);
            validateDropDownInputs();
        });

        max_values.click(function () {
            var maxValue = $(this).attr('value');
            if (maxValue == '') {
                max_input.val(maxValue);
                document.getElementById('price_range2').innerHTML = 'Any';
                document.getElementById('price_range2').setAttribute('value', '');
            } else {
                max_input.val(maxValue);
                document.getElementById('price_range2').innerHTML = '$' + formatter.format(maxValue);
                document.getElementById('price_range2').setAttribute('value', maxValue);
            }

            toggleDropDown();
        });

        clearLink.click(function () {
            min_input.val('');
            max_input.val('');
            document.getElementById('price_range1').innerHTML = '';
            document.getElementById('price_range1').setAttribute('value', '');
            document.getElementById('price_range2').innerHTML = '';
            document.getElementById('price_range2').setAttribute('value', '');

            //disableDropDownRangeOptions(max_values);

            validateDropDownInputs();
        });

        min_input.on('input',
            function () {
                var minValue = min_input.val();
                document.getElementById('price_range1').innerHTML = '$' + minValue;
                document.getElementById('price_range1').setAttribute('value', minValue);
                if (minValue != '')
                    disableDropDownRangeOptions(max_values, minValue);
                validateDropDownInputs();
            });

        max_input.on('input', function () {
            var maxValue = max_input.val();
            document.getElementById('price_range2').innerHTML = '$' + maxValue;
            document.getElementById('price_range2').setAttribute('value', maxValue);
            //disableDropDownRangeOptions(min_values, maxValue);
            validateDropDownInputs();
        });

        max_input.blur('input',
            function () {
                toggleDropDown();
            });

        function validateDropDownInputs() {
            var minValue = parseInt(min_input.val());
            var maxValue = parseInt(max_input.val());

            if (maxValue > 0 && minValue > 0 && maxValue < minValue) {
                min_input.addClass('inputError');
                max_input.addClass('inputError');

                return false;
            } else {
                min_input.removeClass('inputError');
                max_input.removeClass('inputError');

                return true;
            }
        }

        function toggleDropDown() {
            if (validateDropDownInputs() &&
                parseInt(min_input.val()) > 0) {

                // auto close if two values are valid
                dropDownControl.dropdown('toggle');
            }
        }
    }

    setuinvestRangeDropDownList(
        $('.investRange .min_value'),
        $('.investRange .max_value'),
        $('.investRange .freeformPrice .min_input'),
        $('.investRange .freeformPrice .max_input'),
        $('.investRange .btnClear'),
        $('.investRange .dropdown-toggle'));

</script>
<!-- New Price range script -->
<script>
    // AOS.init();
    $(document).ready(function () {
        $('[data-mask]').inputmask();
    $(document).on('click', '.dropdown-menu', function (e) {
        e.stopPropagation();
    });

    // make it as accordion for smaller screens
    if ($(window).width() < 200) {
        $('.dropdown-menu a').click(function (e) {
            e.preventDefault();
            if ($(this).next('.submenu').length) {
                $(this).next('.submenu').toggle();
            }
            $('.dropdown').on('hide.bs.dropdown', function () {
                $(this).find('.submenu').hide();
            })
        });
    }
    $(function () {
        $('.ddown').hover(function () {
            //  alert('Happy');
            $(this).children('ul').stop(true).delay(150).slideDown(350);

        }, function () {
        $(this).children('ul').stop(true).delay(150).slideUp(300);
        });
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 770000,
            values: [100000, 400000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));

        $("#slider-range1").slider({
            range: true,
            min: 0,
            max: 770000,
            values: [100000, 400000],
            slide: function (event, ui) {
                $("#amount1").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount1").val("$" + $("#slider-range1").slider("values", 0) +
            " - $" + $("#slider-range1").slider("values", 1));
    });

    $(document).ready(function () {
        $(".advanced-search").click(function () {
            $(".search-by-bottom").toggleClass("main");
            $(".advanced-search").toggleClass("main");
        });
        $(".fav").click(function () {
            $(".fav").toggleClass("main");
        });
        $(".grid-view-link").click(function () {
            event.preventDefault();
            event.stopPropagation();
            $(".list-view").css("display", "none");
            $(".grid-view").css("display", "block");
            $(".detail-view").css("display", "none");
        });
        $(".detail-view-link").click(function () {
            event.preventDefault();
            event.stopPropagation();
            $(".list-view").css("display", "none");
            $(".grid-view").css("display", "none");
            $(".detail-view").css("display", "block");
        });
        $(".list-view-link").click(function () {
            event.preventDefault();
            event.stopPropagation();
            $(".list-view").css("display", "block");
            $(".grid-view").css("display", "none");
            $(".detail-view").css("display", "none");
        });
        var owl = $('.our-team-slider');
        owl.owlCarousel({
            loop: true,
            rewindNav: false,
            nav: true,
            margin: 30,
            dots: false,
            center: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            autoplaySpeed: 1500,
            responsive: {
                0: {
                    items: 1,
                    margin: 15
                },
                600: {
                    items: 3
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                },

                1600: {
                    items: 4
                }
            }
        });
        var owl = $('.testimonial-slider');
        owl.owlCarousel({
            loop: true,
            rewindNav: false,
            nav: true,
            margin: 30,
            dots: false,
            center: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            autoplaySpeed: 1500,
            responsive: {
                0: {
                    items: 1,
                    margin: 15,
                    nav: false
                },
                600: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                },

                1600: {
                    items: 1
                }
            }
        });
        var owl = $('.city-slider');
        owl.owlCarousel({
            loop: true,
            nav: false,
            margin: 30,
            dots: true,
            center: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            autoplaySpeed: 3000,
            responsive: {
                0: {
                    items: 1.1,
                    margin: 15
                },
                600: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                },

                1600: {
                    items: 3
                }
            }
        });
        var owl = $('.featured-slider');
        owl.owlCarousel({
            loop: false,
            // autoWidth: true,
            // mergeFit: true,
            // rewindNav: false,
            nav: false,
            margin: 30,
            dots: false,
            center: false,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            autoplaySpeed: 2500,
            responsive: {
                0: {
                    items: 1.1,
                    dots: false,
                },
                600: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                },

                1600: {
                    items: 3
                }
            }
        });
        var owl = $('.sale-slider');
        owl.owlCarousel({
            loop: false,
            // autoWidth: true,
            // mergeFit: true,
            // rewindNav: false,
            nav: true,
            margin: 30,
            dots: false,
            center: false,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            autoplaySpeed: 2500,
            responsive: {
                0: {
                    items: 1,
                    dots: false,
                },
                600: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 3
                },

                1600: {
                    items: 3
                }
            }
        });
        var owl = $('.banner-slider-five');
        owl.owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            animateOut: 'fadeOut',
            autoplayTimeout: 5000,
            checkVisible: false,
            autoplayHoverPause: false,
            autoplaySpeed: 5000,
            touchDrag: false,
            mouseDrag: false
        });
        var owl = $('.featured-slider-inner');
        owl.owlCarousel({
            loop: true,
            nav: true,
            margin: 0,
            dots: false,
            center: false,
            autoplay: false,
            autoplayTimeout: 5500,
            autoplayHoverPause: true,
            autoplaySpeed: 2500,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                },

                1600: {
                    items: 1
                }
            }
        });
        var owl = $('.neighbourhood-slider');
        owl.owlCarousel({
            loop: true,
            nav: true,
            margin: 30,
            dots: false,
            autoplay: false,
            autoplayTimeout: 5500,
            autoplayHoverPause: true,
            autoplaySpeed: 2500,
            responsive: {
                0: {
                    items: 1,
                    dots: false
                },
                600: {
                    items: 2
                },
                992: {
                    items: 2.5
                },
                1200: {
                    items: 3
                },

                1600: {
                    items: 3
                }
            }
        });
        var owl = $('.properties-slider-detail');
        owl.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            // animateOut: 'fadeOut',
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            autoplaySpeed: 2000,
            responsive: {
                0: {
                    items: 1,
                    center: true
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
        $(".show-less").click(function () {
            $(".show-less").toggleClass("main");
            $(".property-detail-inner .bg-common .detail-block").toggleClass("main");
        });
        $(".fav").on('click', function () {
            $(this).toggleClass("active");
        });
        var owl = $('.property-list-slider');
        owl.owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1,
                    margin: 10,
                    center: true,
                    loop: false
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        var owl = $('.pre-property-detail-slider');
        owl.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1400: {
                    items: 1
                }
            }
        });
        var owl = $('.platinum-slider');
        owl.owlCarousel({
            loop: true,
            margin: 15,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1.1
                },
                600: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1400: {
                    items: 5
                }
            }
        });
        var owl = $('.awards-slider');
        owl.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1200: {
                    items: 2
                },
                1400: {
                    items: 2
                }
            }
        });
        $(document).click(function (event) {
            $('.navbar-collapse').collapse('hide');
        });
        $(document).scroll(function (event) {
            $('.navbar-collapse').collapse('hide');
        });
        $(".see-all").click(function () {
            $(".see-all").toggleClass("main");
            $(".amenities-block").toggleClass("main");
        });
        $(".see-all-features").click(function () {
            $(".see-all-features").toggleClass("main");
            $(".feature-content").toggleClass("main");
        });
        $("#are-you-a").selectmenu();
        setTimeout(function () {
            $('#consultation-modal').modal('show');
        }, 10000000);
        setTimeout(function () {
            $('#thanks-modal').modal('show');
        }, 20000000);
    });
});
</script>
<script>
    $(document).on('submit', '.contact-form', function (event) {
        var type = $(this).attr('data-type');
        var text = $(".submit").val();
        var datas = $(this).serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".submit").val('Please wait ..');
        $(".submit").html('Please wait ..');
        $("#submit").html('Wait..');
        event.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute("{{env('GOOGLE_RECAPTCHA_KEY')}}", {action: "contact"}).then(function (token) {
                $.ajax({
                    type: 'post',
                    url: '/enquiry',
                    data: datas + "&recaptcha-response=" + token,
                    success: function (response) {

                        if (response == 'OK') {
                            $("#consultation-modal").modal('hide')
                            if (type == 'signup') {
                                location.reload();
                            } else {
                                $("#thanks-modal").modal('show')
                            }

                        }

                        $(".submit").val(text);
                        $(".submit").html('SUBMIT');
                        $("#submit").html('<i class="fa fa-arrow-right"></i>');
                        $(".contact-form").trigger("reset");
                    },
                    error: function () {
                        alert('Some error occurred');
                    }
                });
            })
        })
    });
</script>
@stack('scripts')

</html>
