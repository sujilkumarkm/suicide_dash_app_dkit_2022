@extends('admin.layouts.form')
@section('title','Reset Password')
@section('actionUrl')
    {{route('password.update',$user)}}
@endsection

<!------  --    ----------------------- -->
@section('actionName','Reset')
@section('formBody')
    <!-- this is needed in edit form -->
    <input type="hidden" name="_method" value="PUT">
    <!-- ---------------------------- -->
    <div class="col-6">
        @if(Session::has('message'))
            <p style="color: red;">{{ Session::get('message') }}</p>
        @endif
            <div class="col-6">
            <div class="form-group">
                <label for="current_password" class="control-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" required class="form-control {{$errors->has('current_password') ? 'is-invalid' : ''}}" value="{{old('current_password')}}">
                @if($errors->has('current_password'))
                    <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('current_password')}}</strong>
                </span>
                @endif
            </div>
            <div class="thanks" style="display: none">Old Password is wrong</div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="password" class="control-label">New Password</label>
                <input type="password" id="password" name="password" required class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" value="{{old('password')}}">
                @if($errors->has('password'))
                    <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('password')}}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="confirm_password" class="control-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required class="form-control {{$errors->has('confirm_password') ? 'is-invalid' : ''}}" value="{{old('confirm_password')}}">
                @if($errors->has('confirm_password'))
                    <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('confirm_password')}}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
@endsection

