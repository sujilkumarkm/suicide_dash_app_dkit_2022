<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO META TAGS -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="{{Request::fullUrl()}}"/>
    <meta property="og:url" content="{{Request::fullUrl()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('description')"/>
    <meta property="og:image" content="@yield('og_image','/assets/img/logo.png')"/>
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <!-- SEO META TAGS -->

    <!-- ICONS -->
    <link rel="icon" href="{{asset('assets/img/fav.png')}}" type="image/png">
    <!-- ICONS -->

    <!--STYLESHEETS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
          <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

    <!-- STYLESHEET CDN -->

    <!-- STYLESHEET INTERNAL -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/narayam.css')}}?v0.2">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <!-- STYLESHEET INTERNAL -->

    <!--SCRIPTS CDN -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--    slider-price-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <!--SCRIPTS CDN -->

    <!--SCRIPTS INTERNAL -->
    <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script defer src="{{ asset('js/app.js') }}?v6.1" type="text/javascript"></script>
    <!--SCRIPTS INTERNAL -->

    <style>
    </style>
    <!-- RECAPTCHA -->
    @stack('styles')
</head>
<body>
@include('sweetalert::alert')
<nav class="navbar navbar-expand-xl smart-scroll navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" style="max-height:80px !important;" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                    <a class="nav-link toggle-menu" href="/">Home</a>
                </li>
            <li class="nav-item dropdown ddown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Dashboard</a>
                    <ul class="dropdown-menu">
                           <li class="ddown">
                                <a class="dropdown-item" href="#">Prediction</a>
                            </li>
                            <li class="ddown">
                                <a class="dropdown-item" href="#">Overview</a>
                            </li>
                        </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link toggle-menu" href="/about">about us</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link toggle-menu" href="/contact">contact us</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="modal fade" id="consultation-modal" tabindex="-1" role="dialog" aria-labelledby="consultation-modal"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="{{asset('assets/img/close.png')}}" alt=""></span>
                </button>
            </div>
        </div>
    </div>
</div>
<a href="mailto:{{$data['site_details']->email_1}}" class="chat-icon" ><img src="{{asset('assets/img/email-icon.png')}}?v0.1" alt="" class="img-fluid"></a>

@yield('content')
<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="quick-links">
                           <li><a href="/">Home</a></li>
                            <li><a href="/about">About </a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="" target="_blank">Dashboard</a></li>
                            <li><a href="" target="_blank">Prediction</a></li>
                            <li><a href="" target="_blank">Analysis</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="footer-contact">
                            <li>
                                <h6>CALL</h6>
                                <a href="tel:+353 wire:{{$data['site_details']->phone_1}}">+353 ({{substr($data['site_details']->phone_1 ,0,3)}}) {{substr($data['site_details']->phone_1,3,3)}}-{{substr($data['site_details']->phone_1,6,9)}}</a>
                            </li>
                            <li></li>
                            <li>
                                <h6>EMAIL</h6>
                                <a href="mailto:{{$data['site_details']->email_1}}">{{$data['site_details']->email_1}}</a>
                            </li>
                            <li>
                                <h6>ADDRESS</h6>
                                <span style="color:white !important;">{{$data['site_details']->address}}</span>
                            </li>

                        </ul>

                    </div>
                    <div class="col-sm-3">
                        <div class="designed">
                            <div class="logo">
                            <a  href="https://narayam.net" target="_blank">
                                <img src="{{asset('assets/img/footer-logo.png')}}" alt="" style="max-width:150px;" class="img-fluid"></a>
                            </div>
                            <!-- <p class="text-center">Designed by Narayam</p> -->
                            <p class="text-center">Dundalk Institute of Technology</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-sm-7">
                        <ul class="list-inline more-links">
                            <li class="list-inline-item">© Copyright 2022 www.dkit.ie.narayam.net</li>
                            <!-- <li class="list-inline-item"><a href="">Sitemap</a></li> -->
                            <li class="list-inline-item"><a href="{{route('admin.login')}}" target="_blank"> Admin Login</a></li>

                        </ul>
                    </div>
                    <div class="col-sm-3">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="{{$data['site_details']->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="{{$data['site_details']->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="{{$data['site_details']->linkedin}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="{{$data['site_details']->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                    </div>
                     <div class="col-sm-2">
                     <a  href="https://narayam.net" style="color:white;" target="_blank"> <p class="text-center">Designed by Sujil</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
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

    $(function () {
        $('.ddown').hover(function () {
            // alert('Happy');
            $(this).children('ul').stop(true).delay(150).slideDown(350);

        }, function () {
        $(this).children('ul').stop(true).delay(150).slideUp(300);
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
        }, 300);

    });
</script>

@stack('scripts')
</body>
</html>
