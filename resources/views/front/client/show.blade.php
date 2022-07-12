

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    <form action="{{ route('client.update',$clients) }}" name="update-client-data-form" id="update-client-data-form" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="flex h-screen bg-gray-200 items-center justify-center  mt-32 mb-32">
                    <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                      <div class="flex justify-center py-4">
                        <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                            <i class="fas fa-eye"></i>
                        </div>
                      </div>

                      <div class="flex justify-center">
                        <div class="flex">
                          <h1 class="text-gray-600 font-bold md:text-2xl text-xl">View Client Data</h1>
                        </div>
                      </div>

                      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First Name</label>
                          <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="fname" name="fname"  readonly class="form-control {{$errors->has('fname') ? 'is-invalid' : ''}}" value="{{$clients->fname}}" placeholder="Type client first name">
                          @if($errors->has('fname'))
                          <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              <strong>{{$errors->first('fname')}}</strong>
                          </span>
                            @endif

                        </div>
                        <div class="grid grid-cols-1">
                          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last Name</label>
                          <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="lname" name="lname"  readonly class="form-control {{$errors->has('lname') ? 'is-invalid' : ''}}" value="{{$clients->lname}}" placeholder="Type client last name" />
                          @if($errors->has('lname'))
                          <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              <strong>{{$errors->first('lname')}}</strong>
                          </span>
                            @endif

                        </div>
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                        <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="gender" name="gender" class="form-control {{$errors->has('gender') ? 'is-invalid' : ''}}" value="{{$clients->gender}}">
                            <option vlaue="{{$clients->gender}}">{{$clients->gender}}</option>
                          </select>
                        @if($errors->has('gender'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('gender')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Phone</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="phone" name="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" value="{{$clients->phone}}" placeholder="Type client contact number" readonly>
                        @if($errors->has('phone'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('phone')}}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$clients->email}}" placeholder="Type client email" readonly>
                        @if($errors->has('email'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Proffession</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="profession" name="profession" readonly class="form-control {{$errors->has('profession') ? 'is-invalid' : ''}}" placeholder="Type profession" value="{{$clients->proffession}}">
                        @if($errors->has('profession'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('profession')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Facebook Link</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="facebook" name="facebook" class="form-control {{$errors->has('facebook') ? 'is-invalid' : ''}}" value="{{$clients->facebook}}" placeholder="Type Facebook profile link " readonly>
                        @if($errors->has('facebook'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('facebook')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Instagram Link</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="instagram" name="instagram" readonly class="form-control {{$errors->has('instagram') ? 'is-invalid' : ''}}" value="{{$clients->instagram}}" placeholder="Type Instagram profile link ">
                        @if($errors->has('instagram'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('instagram')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Linkedin Link</label>
                        <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" type="text" id="linkedin" name="linkedin" readonly class="form-control {{$errors->has('linkedin') ? 'is-invalid' : ''}}" value="{{$clients->linkedin}}" placeholder="Type Linkedin profile link ">
                        @if($errors->has('linkedin'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('linkedin')}}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="grid grid-cols-1 mx-7 pb-5">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Source</label>

                        <select class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2  readonly focus:ring-purple-600 focus:border-transparent" id="source" name="source" class="form-control {{$errors->has('source') ? 'is-invalid' : ''}}" value="{{old('source')}}">
                            <option vlaue="{{$clients->email}}">{{$clients->email}}</option>
                          </select>
                        @if($errors->has('source'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            <strong>{{$errors->first('source')}}</strong>
                        </span>
                        @endif
                      </div>

                    </div>
                  </div>
            </div>
        </div>
    </div>
    </form>
</x-app-layout>
