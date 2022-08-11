@extends('front.emails.user-mail')
@section('preText')
    Hi, you have new message. {{$enquiry['name']}} , Message: {{$enquiry['message']}}
@endsection
@section('body')
    Hi ,<br/><br/>
    You have a new enquiry<br/>
    Name: {{$enquiry['name']}}<br/>
    Email: {{$enquiry['email']}}<br/>
    Phone: {{$enquiry['phone']}}<br/>
    Message: {{$enquiry['message']}}
@endsection
