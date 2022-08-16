<!-- STYLESHEET INTERNAL -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}?v0.2">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.min.css')}}">

<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="quick-links">
                           <li><a href="/">Home</a></li>
                            <li><a href="/residential-properties?property_type_1=1">Residential</a></li>
                            <li><a href="/residential-properties?property_type_1=2">Condo</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="footer-contact">
                            <li>
                                <h6>CALL</h6>
                                <a href="tel:+353{{$data['site_details']->phone_1}}">+353 ({{substr($data['site_details']->phone_1 ,0,3)}}) {{substr($data['site_details']->phone_1,3,3)}}-{{substr($data['site_details']->phone_1,6,9)}}</a>
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
                            <a  href="https://dkit.ie.narayam.net" target="_blank">
                                <img src="{{asset('assets/img/logo.png')}}" alt="" style="max-width:150px;" class="img-fluid"></a>
                            </div>
                            <!-- <p class="text-center">Designed by Narayam</p> -->
                            <p class="text-center">Trusted listing from narayam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-sm-7">
                        <ul class="list-inline more-links">
                            <li class="list-inline-item">© Copyright &copy; {{ now()->year }} www.dkit.ie.narayam.net</li>
                            <!-- <li class="list-inline-item"><a href="">Sitemap</a></li> -->
                            <li class="list-inline-item"><a href="{{route('login')}}" target="_blank"> Admin Login</a></li>

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
                     <a  href="https://dkit.ie.narayam.net" style="color:white;" target="_blank"> <p class="text-center">Designed by Narayam</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
