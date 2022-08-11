@extends('front.emails.user-mail')
@section('preText')
Thank you for sharing your details. We are working on your estimate for this address and we will get in touch with you if we need more details.
@endsection
@section('body')
    Dear {{$enquiry['name']}},<br/>
    <p>Thank you for sharing your feedback. We are working on your estimate for this address and we will get in touch with you if we need more details.</p>
@endsection
