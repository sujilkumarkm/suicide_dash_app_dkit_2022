@extends('front.layouts.app')
@section('title',$metadata->title)
@section('description',$metadata->description)
@section('keywords',$metadata->keyword)
@section('nav-class','index sticky-top')
@section('logo'){{asset('assets/img/Dkit_logo_small.jpg')}}@endsection
@section('content')
<section id="app">
   <home
    enq_route="{{ route('enquiry.form') }}"
    csrf="{{ csrf_token() }}"
    :site_details="{{ $data['site_details'] }}"
    ></home>

 </section>
@endsection
@push('scripts')
@endpush
