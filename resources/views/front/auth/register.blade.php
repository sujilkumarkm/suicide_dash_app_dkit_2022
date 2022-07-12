<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="img/logo.png" alt="">
        </x-slot>

        <div class="mb-4 validation-errors text-danger"></div>

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
            <p class="text-center">  OR </p>

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
$(document).on('submit', '#registerForm', function (event) {
    
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
                url: "{{ url('register') }}",
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

