

<x-admin-layout>
    <x-datatable-layout>
    @section('title','Roles')
    @section('tableTitle','Roles')
    @section('createRoute')

        <a class="btn btn-primary btn-sm mr-2" href=" {{route('role.create')}}">Add new</a>
    @endsection
    @section('tableHead')
        <th>#</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Permissions</th>
        <th>Action</th>
    @endsection
    @section('tableBody')

        @foreach($roles->sortByDesc('id') as $role)
            <tr>
                <td></td>
                <td>{{$role->name}}</td>
                <td>{{$role->slug}}</td>
                <td>
                    @foreach ($role->permissions as $item)
                        <span class="badge badge-primary">{{ $item->name }}</span>
                    @endforeach

                </td>
                <td>
                    <form action="{{route('role.destroy',$role->id)}}" method="POST" id="delete-form-{{$role->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="#" onclick="return confirmation({{$role->id}});"><i class="fa fa-trash"></i> </a>
                    </form>
                    <a href="{{route('role.edit',$role->id)}}"><i class="fa fa-edit"></i> </a>
                </td>
            </tr>
        @endforeach
    @endsection
    </x-datatable-layout>
    </x-admin-layout>

