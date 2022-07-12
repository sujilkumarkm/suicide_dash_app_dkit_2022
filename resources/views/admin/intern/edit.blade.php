
<x-form-layout>
@section('title','Update User')
@section('actionUrl')
    {{route('intern.update',$intern)}}
@endsection

@section('actionName','Update User')
@section('indexRoute')
    {{route('intern.index')}}
@endsection

@section('formBody')
    <!-- this is needed in edit form -->
    <input type="hidden" name="_method" value="PUT">
    <!-- ---------------------------- -->
    <div class="col-md-8 offset-md-2">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" id="name" name="name" required class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$intern->name}}">
            @if($errors->has('name'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="phone" class="control-label">Phone</label>
            <input type="text" id="phone" name="phone" required class="form-control" readonly value="{{$intern->phone}}">

        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="text" id="email" name="email" required class="form-control" value="{{$intern->email}}">
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
