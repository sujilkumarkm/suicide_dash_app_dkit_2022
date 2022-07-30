<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<x-admin-layout>
    <x-datatable-layout>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="100px">Action</th>
                </tr>
                @section('s_table')
            </thead>
            <tbody>
            </tbody>
        @endsection
        {{-- @section('title','Suicide')
        @section('tableTitle','Suicide')
        @section('createRoute')
            <a class="btn btn-primary btn-sm mr-2" href=" {{route('suicide.create')}}">Add new</a>
        @endsection
        @section('tableHead')
            <th>#</th>
            <th>Country</th>
            <th>Year</th>
            <th>Sex</th>
            <th>Suicides</th>
            <th>Action</th>
        @endsection
        @section('tableBody')
            @foreach($suicides->sortByDesc('id') as $suicide)
            <tr>
                <td></td>
                <td>{{$suicide->country}}</td>
                <td>{{$suicide->year}}</td>
                <td>{{$suicide->sex}}</td>
                <td>{{$suicide->suicides}}</td>
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
        @endsection --}}
    </x-datatable-layout>

</x-admin-layout>


<script type="text/javascript">
    $(function () {

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ view('admin.suicide.index') }}",
          columns: [
              {data: 'country', name: 'country'},
              {data: 'year', name: 'year'},
              {data: 'sex', name: 'sex'},
              {data: 'suicides', name: 'suicides'},
          ]
      });

    });
  </script>
