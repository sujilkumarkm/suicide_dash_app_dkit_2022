@extends('front.emails.user-mail')
@section('preText')
Thank you for sharing your details. We Will be getting back to you soon.
@endsection
@section('body')
    Dear {{$enquiry['name']}},<br/>
    <p>Thank you for sharing your feedback.We Will be getting back to you soon.</p>
@endsection
