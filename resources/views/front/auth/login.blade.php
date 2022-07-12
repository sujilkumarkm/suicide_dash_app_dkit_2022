<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="img/logo.png" alt="">
        </x-slot>

        <div class="validation-errors"></div>

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 btn btn-primary submit">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
            <p class="text-center mt-2">  OR </p>

            
            <div class="flex items-center justify-end mt-4">
                <a class="" href="{{ url('auth/facebook') }}" id="btn-fblogin">
                    <img src="img/fb-sigin.png" style="height:47px;">

                </a>
                
                <a href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: .2em;">
                </a>
            </div>
        </form>
    </x-jet-authentication-card>

@section('scripts')
<script>
$(document).on('submit', '#loginForm', function (event) {
    
    var datas = $(this).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(".submit").val('Please wait ..').attr('disabled', true);
    
    event.preventDefault();
    grecaptcha.ready(function () {
        grecaptcha.execute("{{env('GOOGLE_RECAPTCHA_KEY')}}", {action: "contact"}).then(function (token) {
            console.log(datas);
            $.ajax({
                type: 'post',
                url: "{{ url('login') }}",
                data: datas + "&recaptcha-response=" + token,
                success: function (response) {
                    if(response.success){
                        window.location = '/home';
                    }
                    $(".submit").val('Submit').attr('disabled', true);
                },
                error: function(jqXhr, json, errorThrown){
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = '';
                    $(".submit").val('Submit').attr('disabled', false);
                    $.each(errors['errors'], function (index, value) {
                        errorsHtml += '<ul class="list-group"><li class="list-group-item alert alert-danger">' + value + '</li></ul>';
                    $('.validation-errors').html(errorsHtml);
                });
                
                swal({
                    title: "Error " + jqXhr.status + ': ' + errorThrown,
                    html: errorsHtml,
                    width: 'auto',
                    confirmButtonText: 'Try again',
                    cancelButtonText: 'Cancel',
                    confirmButtonClass: 'btn',
                    cancelButtonClass: 'cancel-class',
                    showCancelButton: true,
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    type: 'error'
                }, function(isConfirm) {
                    
                });

            }
            });
        })
    })
});
</script>
@endsection

</x-guest-layout>

