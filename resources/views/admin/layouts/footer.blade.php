<footer class="main-footer">
    <strong>Copyright &copy; {{ now()->year }} <a href="https://dkit.ie/">dkit.ie</a>.</strong> All rights reserved.<br/>
    <small>dkit.ie , Dundalk Institute of technology</small>
</footer>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    //Script to activate menu item based on current URL
    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
<script type="text/javascript">
    $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

        @if ($message = Session::get('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{$message}}.'
                })
           @endif
           @if ($message = Session::get('error'))
           Toast.fire({
               icon: 'error',
               title: '{{$message}}.'
           })
        @endif
        @if ($message = Session::get('warning'))
        Toast.fire({
            icon: 'warning',
            title: '{{$message}}.'
        })
        @endif
        });
</script>
@yield('additionalScripts')
</body>
</html>
