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
 <div class="banner">
    <img src="/assets/img/wall_paper.png" alt="" class="img-fluid w-100">
</div>
 <h1 class="text-center pt-3 pb-3">SUICIDE DASH APPLICATION DKIT 2022</h1>
 <p class="ml-3 mr-3">This iteration is a deep dive into the suicide dataset to learn much more about the reasons for the thousands of suicides that occur each year around the world. Even though various studies on suicide have already been done previously, such as John et al. (2018), this study aimed to produce new insights that can help government bodies better grasp the problems that lie beneath them. This research could also benefit them in developing new strategies to minimize mortality rates over time. This research will look at a variety of suicide attributes and predict how many more fatalities will occur in various countries in the next years.
    The goal of this research is to figure out why people commit suicide in each country. Every year, 800,000 individuals commit suicide, according to Wikipedia (2012). Suicide, for example, is becoming a more prevalent and serious problem in India, according to the World Health Organization (WHO). To address these issues, we must examine various patterns and clusters in the data and determine what circumstances cause someone to consider suicide. In addition, a web-based system will be developed that may offer dynamically illuminating visualizations of the suicide dataset, as well as opportunities for page administrators to submit new suicides to the dataset. This initiative will have a huge influence on society by allowing the government to identify and assist those who are in need, hence reducing the number of suicides each year in each nation. The government will not only save lives but also make the globe a better and safer place for people to live by implementing suitable steps based on the findings of this study.</p>
@endsection
@push('scripts')
@endpush
