@extends('admin.layouts.app')
@section('title','Add Meta Data')
@section('content')
    <div class="container-fluid">
        <div class="row" style="justify-content: center;margin: auto;">
            <div class="col-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Meta Data</h3>
                    </div>
                    <!--- Form starts -->
                   
                        <div class="card-body">
                                   <div class="row" style="justify-content: center;margin: auto;">
                                        <div class="col-6">
                                                <div class="form-group">
                                                    <label for="page_name" class="control-label">Page</label>
                                                    <select id="page_name" name="page_name" required class="form-control">
                                                    <option value="">--select--</option>
                                                    @foreach($metadatas as $metadata)
                                                      <option value="{{$metadata->page_name}}">{{$metadata->page_name}}</option>
                                                    @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                    </div> 
                                   
                                    <form method="POST" action="{{route('metadata.update')}}">
                                     @csrf
                                    <div class="row d-none" id="metadata" style="justify-content: center;margin: auto;" >  
                                    <input type="hidden" name="id" id="page_id"> 
                                            <!-- <div class="col-6">
                                            <div class="form-group">
                                                <label for="url" class="control-label">Url</label>
                                                    <input type="url" id="url" name="url" required class="form-control {{$errors->has('url') ? 'is-invalid' : ''}}" readonly>
                                                    @if($errors->has('url'))
                                                        <span class="help-block error invalid-feedback">
                                                            <strong>{{$errors->first('url')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div> -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="title" class="control-label">Title</label>
                                                    <input type="text" id="title" name="title"  class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{$site_details->title ?? ''}}" maxlength="60">
                                                    @if($errors->has('title'))
                                                        <span class="help-block error invalid-feedback">
                                                            <strong>{{$errors->first('title')}}</strong>
                                                        </span>
                                                    @endif
                                                    <div id="title-count"></div>
                                                </div>
                                                
                                            </div>    
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description" class="control-label">Description</label>
                                                        <textarea id="description" name="description"  class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" maxlength="160"></textarea>
                                                        @if($errors->has('description'))
                                                            <span class="help-block error invalid-feedback">
                                                                <strong>{{$errors->first('description')}}</strong>
                                                            </span>
                                                        @endif
                                                        <div id="des-count"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="keyword" class="control-label">Keyword</label>
                                                        <textarea id="keyword" name="keyword" required class="form-control {{$errors->has('keyword') ? 'is-invalid' : ''}}"></textarea>
                                                        @if($errors->has('keyword'))
                                                            <span class="help-block error invalid-feedback">
                                                                <strong>{{$errors->first('keyword')}}</strong>
                                                            </span>
                                                        @endif
                                                        <div id="key-count"></div>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="form-group">
                                                        <div class="d-flex justify-content-between">
                                                            <button type="submit" class="btn btn-primary" id="submit">
                                                            Save
                                                            </button>
                                                            <a href="@yield('indexRoute')" class="btn btn-danger">Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </form>   
  
                                </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('additionalScripts')
        <script>
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        $('#page_name').change(function()
        {
            $('#metadata').addClass('d-none');
            var page=$(this).val();
                    $.ajax({
                            url: "{{route('metadata.page')}}",
                            type: "POST",
                            data:
                            { 
                                "_token": "{{ csrf_token() }}",
                                'page':page,
                            },
                            success: function (response) {
                              
                                $('#page_id').val(response.id);
                                $('#url').val(response.url);
                                $('#title').val(response.title);
                                $('#keyword').val(response.keyword);
                                $('#description').val(response.description);
                                $('#metadata').removeClass('d-none');
                            }
                        });

        
        });
        $('#submit').click(function(e)
        {
            e.preventDefault();
            $("#submit").html('Saving <i class="fa fa-cog fa-spin"></i>');
            var id=$('#page_id').val();
            var url=$('#url').val();
            var title=$('#title').val();
            var keyword=$('#keyword').val();
            var description=$('#description').val();
            $.ajax({
                            url: "{{route('metadata.update')}}",
                            type: "POST",
                            data:
                            { 
                                "_token": "{{ csrf_token() }}",
                                'id':id,
                                'url':url,
                                'title':title,
                                'keyword':keyword,
                                'description':description,
                            },
                            success: function (response) 
                            {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Meta Data Add successfully'
                                })
                                $("#submit").html('Save')
                            }
            });
        });
        
        $('#description').keydown(function()
        {
           var count=this.value.length;
          $('#des-count').html('('+count+'/'+'160'+')');
        });
        $('#title').keydown(function()
        {
           var count=this.value.length;
          $('#title-count').html('('+count+'/'+'60'+')');
        });
        </script>
       
@endsection