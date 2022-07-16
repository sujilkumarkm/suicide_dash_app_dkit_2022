
<x-form-layout>

    @section('title','Add new Intern')
    @section('actionUrl')
        {{route('suicide.store')}}
    @endsection

    @section('actionName','Add suicide')
    @section('indexRoute')
        {{route('suicide.index')}}
    @endsection
    @section('formBody')

        <div class="col-md-8 offset-md-2">
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" id="name" name="name" required class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}">
                @if($errors->has('name'))
                    <span class="help-block error invalid-feedback">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" id="email" name="email" required class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}">
                @if($errors->has('email'))
                    <span class="help-block error invalid-feedback">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" id="password" name="password" required class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" value="{{old('password')}}">
                @if($errors->has('password'))
                    <span class="help-block error invalid-feedback">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="control-label">Confirm Passeord</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" value="{{old('password_confirmation')}}">
                @if($errors->has('password_confirmation'))
                    <span class="help-block error invalid-feedback">
                        <strong>{{$errors->first('password_confirmation')}}</strong>
                    </span>
                @endif
            </div>
        </div>

    @endsection


    </x-form-layout>
