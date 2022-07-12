
<x-form-layout>
@section('title','Edit clients')
@section('actionUrl')
    {{route('clients.update',$clients)}}
@endsection

@section('actionName','Edit clients')
@section('indexRoute')
    {{route('clients.index')}}
@endsection

@section('formBody')
    <!-- this is needed in edit form -->
    <input type="hidden" name="_method" value="PUT">
    <!-- ---------------------------- -->
    <div class="col-md-8 offset-md-2">
        <div class="form-group">
            <label for="name" class="control-label">First Name</label>
            <input type="text" id="fname" name="fname" class="form-control {{$errors->has('fname') ? 'is-invalid' : ''}}" value="{{$clients->fname}}">
            @if($errors->has('fname'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('fname')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Last Name</label>
            <input type="text" id="lname" name="lname" class="form-control {{$errors->has('lname') ? 'is-invalid' : ''}}" value="{{$clients->lname}}">
            @if($errors->has('lname'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('lname')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="phone" class="control-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" readonly value="{{$clients->phone}}">

        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="{{$clients->email}}">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Gender</label>
            <select id="gender" name="gender" class="form-control {{$errors->has('gender') ? 'is-invalid' : ''}}">
                <option selected vlaue="{{$clients->gender}}">{{$clients->gender}}</option>
                <option vlaue="Male">Male</option>
                <option vlaue="Female">Female</option>
                <option vlaue="N/A">Not disclosed</option>
              </select>
            @if($errors->has('password'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('password')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="control-label">Profession</label>
            <input type="text" type="text" id="profession" name="profession" class="form-control {{$errors->has('profession') ? 'is-invalid' : ''}}" placeholder="Type profession" value="{{$clients->proffession}}">
            @if($errors->has('profession'))
            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <strong>{{$errors->first('profession')}}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="control-label">Source</label>
            <input type="text" type="text" id="source" name="source" class="form-control {{$errors->has('source') ? 'is-invalid' : ''}}" placeholder="Type source" value="{{$clients->proffession}}">
            @if($errors->has('source'))
            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <strong>{{$errors->first('source')}}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="control-label">Facebook</label>
            <input type="text" type="text" id="facebook" name="facebook" class="form-control {{$errors->has('facebook') ? 'is-invalid' : ''}}" value="{{$clients->facebook}}" placeholder="Type Facebook profile link ">
                        @if($errors->has('facebook'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('facebook')}}</strong>
                        </span>
                        @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="control-label">Instagram</label>
            <input type="text" type="text" id="instagram" name="instagram" class="form-control {{$errors->has('instagram') ? 'is-invalid' : ''}}" value="{{$clients->instagram}}" placeholder="Type Instagram profile link ">
            @if($errors->has('instagram'))
            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <strong>{{$errors->first('instagram')}}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="control-label">Linkedin</label>
            <input type="text" type="text" id="linkedin" name="linkedin" class="form-control {{$errors->has('linkedin') ? 'is-invalid' : ''}}" value="{{$clients->linkedin}}" placeholder="Type Linkedin profile link ">
            @if($errors->has('linkedin'))
            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <strong>{{$errors->first('linkedin')}}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="control-label"></label>

        </div>
    </div>
@endsection
</x-form-layout>
