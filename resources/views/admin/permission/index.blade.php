

<x-admin-layout>
    <x-datatable-layout>  
    @section('title','Permissions')
    @section('tableTitle','Permissions')
    @section('createRoute')
    @role('admin')
    <a class="btn btn-primary btn-sm mr-2" href=" {{route('permission.create')}}">Add new</a>
    @endrole
    @endsection
    @section('tableHead')
        <th>#</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Action</th>
    @endsection
    @section('tableBody')
    
        @foreach($permissions->sortByDesc('id') as $permission)
            <tr>
                <td></td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->slug}}</td>
                <td>
                    <form action="{{route('permission.destroy',$permission->id)}}" method="POST" id="delete-form-{{$permission->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="#" onclick="return confirmation({{$permission->id}});"><i class="fa fa-trash"></i> </a>
                    </form>
                    <a href="{{route('permission.edit',$permission->id)}}"><i class="fa fa-edit"></i> </a>
                </td>
            </tr>
        @endforeach
    @endsection
    </x-datatable-layout>
    </x-admin-layout>
    