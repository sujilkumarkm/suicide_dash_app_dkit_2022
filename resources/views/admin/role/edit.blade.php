
<x-form-layout>
@section('title','Edit Role')
@section('actionUrl')
    {{route('role.update',$role)}}
@endsection

@section('actionName','Edit Role')
@section('indexRoute')
    {{route('role.index')}}
@endsection

@section('formBody')
    <!-- this is needed in edit form -->
    <input type="hidden" name="_method" value="PUT">
    <!-- ---------------------------- -->
    <div class="col-md-8 offset-md-2">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" id="name" name="name" required class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$role->name}}">
            @if($errors->has('name'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row p-2">
            @foreach ($permissions as $item)
                <div class="col-4">

                     <div class="form-check">
                        <input class="form-check-input" name="permissions[]" type="checkbox" {{\Arr::has($role->permissions()->pluck('name','permission_id'), $item->id) ? 'checked' : ''}} value="{{ $item->id }}" id="flexCheckDefault{{$item->id}}">
                        <label class="form-check-label" for="flexCheckDefault{{$item->id}}">
                            {{ $item->name }}
                        </label>
                    </div>
                </div>
                    
            @endforeach
        </div>
    </div>
@endsection
</x-form-layout>