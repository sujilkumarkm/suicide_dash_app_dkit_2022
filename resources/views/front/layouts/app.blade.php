<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('front.layouts.head')

    @yield('styles')
</head>
<body class="font-sans antialiased hold-transition sidebar-mini">


    <div class="min-h-screen bg-gray-100">

        <!-- Navigation Bar -->
        @include('front.layouts.navigation')

        <!-- Main content -->
        <main>
            {{ $slot }}
        </main>

        @include('front.layouts.footer')
        <!-- Footer content -->

    </div>
</body>
<script>
    function confirmation(i){
        if(confirm('are you sure?')){
            let form_name='delete-form-'+i;
            document.getElementById(form_name).submit();
        }else{
            return false;
        }
    }
</script>
@include('front.layouts.scripts')
</html>
