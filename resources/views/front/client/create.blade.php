

<x-app-layout>

    @section('title','Add new Client')
    @section('actionUrl')
        {{route('client.store')}}
    @endsection

    @section('actionName','Add Client')
    @section('indexRoute')
        {{route('client.index')}}
    @endsection
    @section('formBody')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    <form action="{{ route('client.store') }}" name="add-client-data-form" id="add-client-data-form" method="post">
        @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="flex h-screen bg-gray-200 items-center justify-center  mt-32 mb-32">
                    <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                      <div class="flex justify-center py-4">
                        <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                            <i class="fas fa-user-plus"></i>
                        </div>
                      </div>

                      <div class="flex justify-center">
                        <div class="flex">
                          <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Add Client Data</h1>
                        </div>
                      </div>

                      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First Name</label>
                          <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="fname" name="fname"  class="form-control {{$errors->has('fname') ? 'is-invalid' : ''}}" value="{{old('fname')}}" placeholder="Type client first name">
                          @if($errors->has('fname'))
                          <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              <strong>{{$errors->first('fname')}}</strong>
                          </span>
                            @endif

                        </div>
                        <div class="grid grid-cols-1">
                          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last Name</label>
                          <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="lname" name="lname"  class="form-control {{$errors->has('lname') ? 'is-invalid' : ''}}" value="{{old('lname')}}" placeholder="Type client last name" />
                          @if($errors->has('lname'))
                          <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              <strong>{{$errors->first('lname')}}</strong>
                          </span>
                            @endif

                        </div>
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                        <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="gender" name="gender" class="form-control {{$errors->has('gender') ? 'is-invalid' : ''}}">
                            <option selected vlaue="">-- Choose Gender --</option>
                            <option vlaue="Male">Male</option>
                            <option vlaue="Female">Female</option>
                            <option vlaue="N/A">Not disclosed</option>
                          </select>
                        @if($errors->has('gender'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('gender')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Phone</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="phone" name="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" value="{{old('phone')}}" placeholder="Type client contact number">
                        @if($errors->has('phone'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('phone')}}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}" placeholder="Type client email">
                        @if($errors->has('email'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Proffession</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="profession" name="profession" class="form-control {{$errors->has('profession') ? 'is-invalid' : ''}}" value="{{old('profession')}}" placeholder="Type profession">
                        @if($errors->has('profession'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('profession')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Facebook Link</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="facebook" name="facebook" class="form-control {{$errors->has('facebook') ? 'is-invalid' : ''}}" value="{{old('facebook')}}" placeholder="Type Facebook profile link ">
                        @if($errors->has('facebook'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('facebook')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Instagram Link</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="instagram" name="instagram" class="form-control {{$errors->has('instagram') ? 'is-invalid' : ''}}" value="{{old('instagram')}}" placeholder="Type Instagram profile link ">
                        @if($errors->has('instagram'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('instagram')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Linkedin Link</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="linkedin" name="linkedin" class="form-control {{$errors->has('linkedin') ? 'is-invalid' : ''}}" value="{{old('linkedin')}}" placeholder="Type Linkedin profile link ">
                        @if($errors->has('linkedin'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('linkedin')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Source</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="source" name="source" class="form-control {{$errors->has('source') ? 'is-invalid' : ''}}" value="{{old('source')}}" placeholder="Type source information">
                        @if($errors->has('source'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('source')}}</strong>
                        </span>
                        @endif
                      </div>



                      <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                        <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
                      </div>

                    </div>
                  </div>
            </div>
        </div>
    </div>
    </form>
</x-app-layout>
