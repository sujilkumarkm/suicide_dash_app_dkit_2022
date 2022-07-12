<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        @include('front.layouts.head')
        <script src="https://www.google.com/recaptcha/api.js?render={{env('GOOGLE_RECAPTCHA_KEY')}}"></script>
        <style>
        .grecaptcha-badge {
            visibility: hidden;
        }
    </style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}         
        </div>
    </body>

    @include('front.layouts.scripts')
    
    @yield('scripts')
</html>