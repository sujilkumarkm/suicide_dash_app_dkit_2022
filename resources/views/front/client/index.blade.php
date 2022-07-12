

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('client.create') }}"><button class="btn btn-primary p-6">Add New</button></a>
                <h2><center>Client Data</center></h2>
                <div class="table w-full p-2">
                    <table class="w-full border">
                        <thead>
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">First Name</th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">Last Name</th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">Gender</th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">Proffession</th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">Phone</th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients->sortByDesc('id') as $client)
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="p-2 border-r">{{$client->fname}}</td>
                            <td class="p-2 border-r">{{$client->lname}}</td>
                            <td class="p-2 border-r">{{$client->gender}}</td>
                            <td class="p-2 border-r">{{$client->proffession}}</td>
                            <td class="p-2 border-r">{{$client->phone}}</td>
                            <td class="p-2 border-r">


                                <form action="{{route('client.destroy',$client->id)}}" method="POST" id="delete-form-{{$client->id}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="#" onclick="return confirmation({{$client->id}});"><i class="fa fa-trash"></i> </a>
                                </form>



                                <a href="{{route('client.edit',$client->id)}}"><i class="fa fa-edit"></i> </a>
                                <a href="{{route('client.show',$client->id)}}"><i class="fas fa-eye"></i> </a>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
