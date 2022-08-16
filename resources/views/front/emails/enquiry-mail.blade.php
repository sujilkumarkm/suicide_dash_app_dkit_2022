@extends('front.emails.user-mail')
@section('preText')
    Hi Admin, you have new message. {{$enquiry['name']}} , Message: {{$enquiry['message']}}
@endsection
@section('body')
    Hi Admin,<br/><br/>
    You recieved a new feedback from our page visitor.<br/>
    Name: {{$enquiry['name']}}<br/>
    Email: {{$enquiry['email']}}<br/>
    Phone: {{$enquiry['phone']}}<br/>
    Message: {{$enquiry['message']}}
@endsection
