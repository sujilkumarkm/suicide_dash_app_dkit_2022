

<x-admin-layout>
    <x-datatable-layout>  
    @section('title','Users')
    @section('tableTitle','Users')
    @section('createRoute')
        
        <a class="btn btn-primary btn-sm mr-2" href=" {{route('user.create')}}">Add new</a>
    @endsection
    @section('tableHead')
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    @endsection
    @section('tableBody')
    
        @foreach($users->sortByDesc('id') as $user)
            <tr>
                <td></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach ($user->roles as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach

                </td>
                <td>
                    <form action="{{route('user.destroy',$user->id)}}" method="POST" id="delete-form-{{$user->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="#" onclick="return confirmation({{$user->id}});"><i class="fa fa-trash"></i> </a>
                    </form>
                    <a href="{{route('user.edit',$user->id)}}"><i class="fa fa-edit"></i> </a>
                </td>
            </tr>
        @endforeach
    @endsection
    </x-datatable-layout>
    </x-admin-layout>
    