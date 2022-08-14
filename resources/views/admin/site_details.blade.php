@extends('admin.layouts.app')
@section('title','Add Site Details')
@section('content')
    <div class="container-fluid">
        <div class="row" style="justify-content: center;margin: auto;">
            <div class="col-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Site Details</h3>
                    </div>
                    <!--- Form starts -->
                    <form method="POST" action="{{route('site-details')}}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row" style="justify-content: center;margin: auto;">
                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="address" class="control-label">Address</label>
                                                <input type="text" id="address" name="address" required class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" value="{{$site_details->address ?? ''}}">
                                                @if($errors->has('address'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('address')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                        <input type="hidden" name="id" id="site_id" value="{{$site_details->id ?? ''}}">
                                            <label for="phone_1" class="control-label">Phone Number 1</label>
                                            <input type="text" id="phone_1" name="phone_1" required class="form-control {{$errors->has('phone_1') ? 'is-invalid' : ''}}" value="{{$site_details->phone_1 ?? ''}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                            @if($errors->has('phone_1'))
                                                <span class="help-block error invalid-feedback">
                                                    <strong>{{$errors->first('phone_1')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="phone_2" class="control-label">Phone Number 2</label>
                                            <input type="text" id="phone_2" name="phone_2"  class="form-control {{$errors->has('phone_2') ? 'is-invalid' : ''}}" value="{{$site_details->phone_2 ?? ''}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                            @if($errors->has('phone_2'))
                                                <span class="help-block error invalid-feedback">
                                                    <strong>{{$errors->first('phone_2')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                            <div class="form-group">
                                                <label for="whatsapp" class="control-label">Whatsapp</label>
                                                <input type="text" id="whatsapp" name="whatsapp"  class="form-control {{$errors->has('whatsapp') ? 'is-invalid' : ''}}" value="{{$site_details->whatsapp ?? ''}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                                @if($errors->has('whatsapp'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('whatsapp')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="email_1" class="control-label">Email 1</label>
                                                <input type="email" id="email_1" name="email_1" required class="form-control {{$errors->has('email_1') ? 'is-invalid' : ''}}" value="{{$site_details->email_1 ?? ''}}">
                                                @if($errors->has('email_1'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('email_1')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email_2" class="control-label">Email 2</label>
                                                <input type="email" id="email_2" name="email_2"  class="form-control {{$errors->has('email_2') ? 'is-invalid' : ''}}" value="{{$site_details->email_2 ?? ''}}">
                                                @if($errors->has('email_2'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('email_2')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="facebook" class="control-label">Facebook</label>
                                                <input type="url" id="facebook" name="facebook"  class="form-control {{$errors->has('facebook') ? 'is-invalid' : ''}}" value="{{$site_details->facebook ?? ''}}">
                                                @if($errors->has('facebook'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('facebook')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="twitter" class="control-label">Twitter</label>
                                                <input type="url" id="twitter" name="twitter" class="form-control {{$errors->has('twitter') ? 'is-invalid' : ''}}" value="{{$site_details->twitter ?? ''}}">
                                                @if($errors->has('twitter'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('twitter')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="linkedin" class="control-label">Linkedin</label>
                                                <input type="url" id="linkedin" name="linkedin" class="form-control {{$errors->has('linkedin') ? 'is-invalid' : ''}}" value="{{$site_details->linkedin ?? ''}}">
                                                @if($errors->has('linkedin'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('linkedin')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="instagram" class="control-label">Instagram</label>
                                                <input type="url" id="instagram" name="instagram"  class="form-control {{$errors->has('instagram') ? 'is-invalid' : ''}}" value="{{$site_details->instagram ?? ''}}">
                                                @if($errors->has('instagram'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('instagram')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="youtube" class="control-label">Youtube</label>
                                                <input type="url" id="youtube" name="youtube" class="form-control {{$errors->has('youtube') ? 'is-invalid' : ''}}" value="{{$site_details->youtube ?? ''}}">
                                                @if($errors->has('youtube'))
                                                    <span class="help-block error invalid-feedback">
                                                        <strong>{{$errors->first('youtube')}}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            
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
        $(document).ready(function()
        {
            $('[data-mask]').inputmask()
        });
        // $('#submit').click(function(e)
        // {
        //     $("#submit").html('Saving <i class="fa fa-cog fa-spin"></i>');
        // });
</script>
@endsection