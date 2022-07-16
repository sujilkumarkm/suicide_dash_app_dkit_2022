

<x-admin-layout>
    <x-datatable-layout>
    @section('title','Suicides')
    @section('tableTitle','Suicides')

    @can('suicide-create')
    @section('createRoute')

        <a class="btn btn-primary btn-sm mr-2" href=" {{route('suicide.create')}}">Add new</a>
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
        @foreach($suicides->sortByDesc('id') as $suicide)
            <tr>
                <td></td>
                <td>{{$suicide->country_year}}</td>
                <td>{{$suicide->year}}</td>
                <td>{{$suicide->sex}}</td>
                <td>
                    <form action="{{route('suicide.destroy',$suicide->id)}}" method="POST" id="delete-form-{{$suicide->id}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="#" onclick="return confirmation({{$suicide->id}});"><i class="fa fa-trash"></i> </a>
                    </form>
                    <a href="{{route('suicide.edit',$suicide->id)}}"><i class="fa fa-edit"></i> </a>
                </td>
            </tr>
        @endforeach
    @endcan
    @endsection

    </x-datatable-layout>
    </x-admin-layout>
