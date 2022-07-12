

<x-admin-layout>
    <x-datatable-layout>
    @section('title','Clients')
    @section('tableTitle','Clients')

    @can('intern-create')
    @section('createRoute')

        {{-- <a class="btn btn-primary btn-sm mr-2" href=" {{route('intern.create')}}">Add new</a> --}}
    @endsection
    @endcan

    @section('tableHead')
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Profession</th>
        <th>Gender</th>
        <th>Malayali</th>
        <th>Source</th>
        <th>Facebook</th>
        <th>Instagram</th>
        <th>Linkedin</th>
        <th>Action</th>
    @endsection
    @section('tableBody')

    @can('post-list')
        @foreach($clients->sortByDesc('id') as $client)
            <tr>
                <td></td>
                <td>{{$client->fname}} {{$client->lname}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->proffession}}</td>
                <td>{{$client->gender}}</td>
                <td>{{$client->malayali}}</td>
                <td>{{$client->source}}</td>
                <td>{{$client->facebook}}</td>
                <td>{{$client->instagram}}</td>
                <td>{{$client->linkedin}}</td>
                <td>
                    <form action="{{route('clients.destroy',$client->id)}}" method="POST" id="delete-form-{{$client->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="#" onclick="return confirmation({{$client->id}});"><i class="fa fa-trash"></i> </a>
                    </form>
                    <a href="{{route('clients.edit',$client->id)}}"><i class="fa fa-edit"></i> </a>
                </td>
            </tr>
        @endforeach
    @endcan
    @endsection

    </x-datatable-layout>
    </x-admin-layout>
