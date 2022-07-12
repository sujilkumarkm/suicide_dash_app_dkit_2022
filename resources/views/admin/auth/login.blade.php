<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div class="validation-errors"></div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" id="loginForm">
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
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 btn btn-primary">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>

            
            <div class="flex items-center justify-end mt-4">
                {{-- <a class="" href="{{ url('admin/auth/facebook') }}" id="btn-fblogin">
                    <img src="{{ asset('img/fb-sigin.png') }}" style="height:47px;">

                </a>
                
                <a href="{{ url('admin/auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: .2em;">
                </a> --}}
            </div>
        </form>
    </x-jet-authentication-card>
    
    @section('scripts')
<script>

</script>
@endsection
</x-guest-layout>