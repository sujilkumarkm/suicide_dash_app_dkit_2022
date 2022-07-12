<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.layouts.head')

    @yield('styles')
    <style>
        .card {        
            width: 80%;
            margin: auto;
        }
        .note-editor.note-frame.card {
            width: 100%;
        }
        .justify-content-end .btn{
            margin: 5px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
        
    <!-- Site wrapper -->
    <div class="wrapper" id="app">
        
        <!-- Navigation Bar -->
        @include('admin.layouts.navigation')
        @include('admin.layouts.sidebar')
        
        <div class="content-wrapper">
            
            <!-- Main content -->
            <section class="content pt-4">
                @yield('content')
            </section>
        </div>
        <!-- Footer content -->
        @include('admin.layouts.footer')
    </div>
</body>

@include('admin.layouts.scripts')
@yield('scripts')
</html>