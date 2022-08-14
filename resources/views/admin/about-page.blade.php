@extends('admin.layouts.app')
@section('title','Add About')
@section('additionalStyles')
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row" style="justify-content: center;margin: auto;">
            <div class="col-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Site Details</h3>
                    </div>
                    <!--- Form starts -->
                    <form method="POST" action="{{route('site.about')}}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row" style="justify-content: center;margin: auto;">
                                    <div class="col-12">
                                            <div class="form-group">
                                            <input type="hidden" name="id" id="site_id" value="{{$id}}">
                                                <label for="about_us" class="control-label">About Page</label>
                                                <textarea  id="about_us" name="about_us" required class="form-control textarea {{$errors->has('about_us') ? 'is-invalid' : ''}}">
                                                {!!$site_details->about_us ?? ''!!}
                                                </textarea>
                                                @if($errors->has('about_us'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('about_us')}}</strong>
                                                    </span>
                                                @endif
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additionalScripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script>
const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        $(document).ready(function()
        {
            $('[data-mask]').inputmask()
        });
        $('#submit').click(function(e)
        {
            e.preventDefault();
            $("#submit").html('Saving <i class="fa fa-cog fa-spin"></i>');
          var about=$('#about_us').val();
          var id=$('#site_id').val();
          $.ajax({
                            url: "{{route('site.about')}}",
                            type: "POST",
                            data:
                            { 
                                "_token": "{{ csrf_token() }}",
                                'id':id,
                                'about_us':about,
                            },
                            success: function (response) 
                            {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'About Add successfully'
                                })
                                $("#submit").html('Save')
                            }
            });
        });
    </script>
        <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote({
                height:300,
            });
        })
   
</script>
@endsection