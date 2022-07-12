
<x-form-layout>
@section('title','Edit User')
@section('actionUrl')
    {{route('user.update',$user)}}
@endsection

@section('actionName','Edit User')
@section('indexRoute')
    {{route('user.index')}}
@endsection

@section('formBody')
    <!-- this is needed in edit form -->
    <input type="hidden" name="_method" value="PUT">
    <!-- ---------------------------- -->
    <div class="col-md-8 offset-md-2">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" id="name" name="name" required class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$user->name}}">
            @if($errors->has('name'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="text" id="email" name="email" required class="form-control" readonly value="{{$user->email}}">
            
        </div>
        <div class="form-group row p-2">
            @foreach ($roles as $item)
                <div class="col-4">

                     <div class="form-check">
                        <input class="form-check-input" name="roles[]" type="checkbox" {{\Arr::has($user->roles()->pluck('name','role_id'), $item->id) ? 'checked' : ''}} value="{{ $item->id }}" id="flexCheckDefault{{$item->id}}">
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