@extends('front.layouts.app')
@section('title',$metadata->title)
@section('description',$metadata->description)
@section('keywords',$metadata->keyword)
@section('nav-class','inner')
@section('sign-up','signup')
@section('logo'){{asset('assets/img/logo-white.png')}}@endsection
@section('content')
<div class="contact-page page">
    <div class="page-header">
        <div class="container">
            <h2>Contact Narayam Charitable Trust</h2>
        </div>
    </div>
    <div class="page-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="block-left" >
                        <!--                            <img src="assets/img/contact.png" alt="Commercial Property  Caledon" class="img-fluid">-->
                        <img src="{{asset('assets/img/hardeep.png')}}?v0.1" alt="Commercial Property Brampton" class="img-fluid">
                        <h4>Narayam Charitable Trust</h4>
                        <h5>Kottayam</h5>
                        <a href="tel:+1{{$data['site_details']->phone_2}}" style="font-size:15px;"><img src="{{asset('assets/img/call-blue.png')}}" alt="Call Icon" >+1 ({{substr($data['site_details']->phone_2 ,0,3)}}) {{substr($data['site_details']->phone_2,3,3)}}-{{substr($data['site_details']->phone_2,6,9)}}</a>
                        <a target="_blank" href="mailto:{{$data['site_details']->email_2}}" style="font-size:15px;"><img src="{{asset('assets/img/mail-blue.png')}}" alt="Email Icon">{{$data['site_details']->email_2}}</a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="contact-block">
                        <!-- <h3>Contact me by</h3> -->
                        <form action="{{route('enquiry.form')}}" method="post" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" placeholder="Name" name="name" class="form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" placeholder="Email" name="email" class="form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="tel" placeholder="Phone Number" name="phone" class="form-control" data-inputmask='"mask": "+1 (999) 999-9999"' data-mask data-inputmask-clearincomplete="true" required>
                                </div>
                                <div class="col-sm-12">
                                    <textarea rows="4" cols="50" name="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <p>By Submitting This Form, You Are Providing Express Consent To Receive Commercial
                                Electronic Messages From www.narayam.net You May Unsubscribe At Any Time.</p>
                            <input type="submit" value="Submit" class="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <iframe  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDjOtRANmY29jxlasbV7XnGD0UfzBiOS3E&q={{urlencode($data['site_details']->address)}}" width="100%" height="415" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
</div>
@endsection