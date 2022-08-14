@extends('front.layouts.app')
@section('title',$metadata->title)
@section('description',$metadata->description)
@section('keywords',$metadata->keyword)
@section('nav-class','inner')
@section('logo'){{asset('assets/img/inner-Dkit_logo_small.jpg')}}@endsection
@section('content')
    <div class="about-us page">
        <div class="page-header">
            <div class="container">
                <h2>About DKIT Suicide Dash App</h2>
            </div>
        </div>
        <div class="page-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-5">
                        <div class="left-block">
                            <img src="{{asset('assets/img/logo.png')}}?v0.1" alt="Sell House Niagara" class="img-fluid">
                            <div class="bg-block">
                                <h3>DKIT Suicide Dash App</h3>
                                <h4>MSc, Data Analytics</h4>
                                <a href="tel:+353{{$data['site_details']->phone_2}}" style="font-size:15px;"><img src="{{asset('assets/img/call.png')}}" alt="Call Icon" style="width:13px;height:12px;">+353 ({{substr($data['site_details']->phone_1 ,0,3)}}) {{substr($data['site_details']->phone_2,3,3)}}-{{substr($data['site_details']->phone_1,6,9)}}</a>
                                <a href="mailto:{{$data['site_details']->email_2}}" style="font-size:15px;" target="_blank"><img src="{{asset('assets/img/email.png')}}" style="width:13px;height:12px;"
                                                                                              alt="Email Icon">{{$data['site_details']->email_2}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 mt-3">
                        {!!$data['site_details']->about_us!!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
