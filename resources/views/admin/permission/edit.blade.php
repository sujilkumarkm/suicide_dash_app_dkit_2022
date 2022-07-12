
<x-form-layout>
@section('title','Edit Permission')
@section('actionUrl')
    {{route('permission.update',$permission)}}
@endsection

@section('actionName','Edit Permission')
@section('indexRoute')
    {{route('permission.index')}}
@endsection

@section('formBody')
    <!-- this is needed in edit form -->
    <input type="hidden" name="_method" value="PUT">
    <!-- ---------------------------- -->
    <div class="col-md-8 offset-md-2">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" id="name" name="name" required class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$permission->name}}">
            @if($errors->has('name'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
    </div>
@endsection
</x-form-layout>