

<x-admin-layout>
<x-datatable-layout>
@section('title','Suicides')
@section('tableTitle','Suicides')

@can('intern-create')
@section('createRoute')

    <a class="btn btn-primary btn-sm mr-2" href=" {{route('intern.create')}}">Add new</a>
@endsection
@endcan

@section('tableHead')
    <th>#</th>
    <th>Country</th>
    <th>Year</th>
    <th>Sex</th>
    <th>Suicides</th>
@endsection
@section('tableBody')

@can('post-list')
    @foreach($interns->sortByDesc('id') as $intern)
        <tr>
            <td></td>
            <td>{{$intern->name}}</td>
            <td>{{$intern->email}}</td>
            <td>
                <form action="{{route('intern.destroy',$intern->id)}}" method="POST" id="delete-form-{{$intern->id}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <a href="#" onclick="return confirmation({{$intern->id}});"><i class="fa fa-trash"></i> </a>
                </form>
                <a href="{{route('intern.edit',$intern->id)}}"><i class="fa fa-edit"></i> </a>
            </td>
        </tr>
    @endforeach
@endcan
@endsection

</x-datatable-layout>
</x-admin-layout>
