@extends('front.layouts.app')
@section('title',$metadata->title)
@section('description',$metadata->description)
@section('keywords',$metadata->keyword)
@section('nav-class','index sticky-top')
@section('logo'){{asset('assets/img/logo.png')}}@endsection
@section('content')
    <div class="banner">
        <img src="/assets/img/wall_paper.png" alt="" class="img-fluid w-100">
    </div>
     <h1 class="text-center pt-5 pb-3">SUICIDE DASH APPLICATION DKIT 2022</h1>
     <div class="col-lg-12 col-md-12 col-sm-12 mr-2 ml-2 justify-items-stretch text-justify">
       <p> {!!$data['site_details']->about_us!!} </p>
    </div>
@endsection
@push('scripts')
@endpush
