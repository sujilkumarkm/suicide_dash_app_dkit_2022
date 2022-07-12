
<x-form-layout>
    
    @section('title','Add new Permission')
    @section('actionUrl')
        {{route('permission.store')}}
    @endsection
    
    @section('actionName','Add Permission')
    @section('indexRoute')
        {{route('permission.index')}}
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
        </div>
    
    @endsection
    
        
    </x-form-layout>