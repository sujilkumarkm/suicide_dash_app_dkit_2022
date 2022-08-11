@extends('front.emails.user-mail')
@section('pretext')Dear {{$enquiry['name']}}  You are almost ready to start enjoying our exclusive daily real estate update.@endsection
@section('body')
    <p>Dear {{$enquiry['name']}},</p>
    <p>You are almost ready to start enjoying our exclusive python dash app.</p>
    <p>Simply <a href="{{ route('verify-email',[ 'token' => $enquiry['token']]) }}"> click here to </a> to verify your
        email address.</p>
@endsection
