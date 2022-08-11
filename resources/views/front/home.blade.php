@extends('front.layouts.app')
@section('title',$metadata->title)
@section('description',$metadata->description)
@section('keywords',$metadata->keyword)
@section('nav-class','index sticky-top')
@section('logo'){{asset('assets/img/brokerage-logo-white.png')}}@endsection
@section('content')
<section id="app">

   <home :freeholds="{{ json_encode($freeholds) }}"
   :profiles="{{ json_encode($profiles) }}"
   :soldlistings="{{ json_encode($soldlistings) }}"

   <home :profiles="{{ json_encode($profiles) }}"

   <home
   :profiles="{{ json_encode($profiles) }}"

    :awards="{{ json_encode($awards)}}"
    enq_route="{{ route('enquiry') }}"
    csrf="{{ csrf_token() }}"
    pred_route="{{route('showValue')}}"
    dream_route="{{route('new-list-alert')}}"

    :site_details="{{ $data['site_details'] }}"
    :precondo="{{ json_encode($precondos) }}" ></home>

    :site_details="{{ $data['site_details'] }}">
    </home>

    :site_details="{{ $data['site_details'] }}"></home>

 </section>
@endsection
@push('scripts')
<script
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&sensor=false&libraries=places"></script>
<script>
    google.maps.event.addDomListener(window, 'load', function () {
        var options = {
            componentRestrictions: {country: ['CA']},
        };
        var places = new google.maps.places.Autocomplete(document.getElementById('placeSearch'), options);
        google.maps.event.addListener(places, 'place_click', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            $("#placeSearch").val(address)

        });
        var places1 = new google.maps.places.Autocomplete(document.getElementById('search'), options);
        google.maps.event.addListener(places1, 'place_click', function () {
            var place1 = places1.getPlace();
            var address1 = place1.formatted_address;
            $("#search").val(address1)

        });
    });
</script>
@endpush
