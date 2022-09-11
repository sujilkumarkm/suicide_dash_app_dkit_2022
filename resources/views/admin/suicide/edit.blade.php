
<x-form-layout>
@section('title','Edit Intern')
@section('actionUrl')
    {{route('suicide.update',$suicide)}}
@endsection

@section('actionName','Update Record')
@section('indexRoute')
    {{route('suicide.index')}}
@endsection

@section('formBody')
    <!-- this is needed in edit form -->
    <input type="hidden" name="_method" value="PUT">
    <!-- ---------------------------- -->
    <div class="col-md-8 offset-md-2">
        <div class="form-group">
            <label for="country" class="control-label">Country</label>
            <input type="text" id="country" name="country" required class="form-control {{$errors->has('country') ? 'is-invalid' : ''}}" value="{{$suicide->country}}">
            @if($errors->has('country'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('country')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="country_code" class="control-label">Country Code</label>
            <input type="text" id="country_code" name="country_code" required class="form-control {{$errors->has('country_code') ? 'is-invalid' : ''}}" value="{{$suicide->country_code}}">
            @if($errors->has('country_code'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('country_code')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="year" class="control-label">Year</label>
            <input type="text" id="year" name="year" required class="form-control {{$errors->has('year') ? 'is-invalid' : ''}}" value="{{$suicide->year}}">
            @if($errors->has('year'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->year}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="sex" class="control-label">Gender</label>
            <select id="sex" name="sex" class="form-control {{$errors->has('sex') ? 'is-invalid' : ''}}">
                <option selected vlaue="{{$suicide->sex}}">{{$suicide->sex}}</option>
                <option vlaue="Male">Male</option>
                <option vlaue="Female">Female</option>
                <option vlaue="N/A">Not disclosed</option>
              </select>
            @if($errors->has('password'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('password')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="age" class="control-label">Age</label>
            <select id="age" name="age" class="form-control {{$errors->has('age') ? 'is-invalid' : ''}}">
                <option selected vlaue="{{$suicide->age}}">{{$suicide->age}}</option>
                <option vlaue="75+ Years">75+ Years</option>
                <option vlaue="55-74 Years">55-74 Years</option>
                <option vlaue="35-54 Years">35-54 Years</option>
                <option vlaue="25-34 Years">25-34 Years</option>
                <option vlaue="15-24 Years">15-24 Years</option>
                <option vlaue="Less than 15 Years">Less than 15 Years</option>
              </select>
            @if($errors->has('age'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('age')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="suicides" class="control-label">suicides</label>
            <input type="text" id="suicides" name="suicides" required class="form-control {{$errors->has('suicides') ? 'is-invalid' : ''}}" value="{{$suicide->suicides}}">
            @if($errors->has('suicides'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('suicides')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="population" class="control-label">Population</label>
            <input type="text" id="population" name="population" required class="form-control {{$errors->has('population') ? 'is-invalid' : ''}}" value="{{$suicide->population}}">
            @if($errors->has('population'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('population')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="sucid_in_hundredk" class="control-label">Suicide in Hundredk</label>
            <input type="text" id="sucid_in_hundredk" name="sucid_in_hundredk" required class="form-control {{$errors->has('sucid_in_hundredk') ? 'is-invalid' : ''}}" value="{{$suicide->sucid_in_hundredk}}">
            @if($errors->has('sucid_in_hundredk'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('sucid_in_hundredk')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="yearly_gdp" class="control-label">Yearly GDP</label>
            <input type="text" id="yearly_gdp" name="yearly_gdp" required class="form-control {{$errors->has('yearly_gdp') ? 'is-invalid' : ''}}" value="{{$suicide->yearly_gdp}}">
            @if($errors->has('yearly_gdp'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('yearly_gdp')}}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="gdp_per_capita" class="control-label">GDP Per Capita</label>
            <input type="text" id="gdp_per_capita" name="gdp_per_capita" required class="form-control {{$errors->has('gdp_per_capita') ? 'is-invalid' : ''}}" value="{{$suicide->gdp_per_capita}}">
            @if($errors->has('gdp_per_capita'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('gdp_per_capita')}}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="internetusers" class="control-label">Internet Users</label>
            <input type="text" id="internetusers" name="internetusers" required class="form-control {{$errors->has('internetusers') ? 'is-invalid' : ''}}" value="{{$suicide->internetusers}}">
            @if($errors->has('internetusers'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('internetusers')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="expenses" class="control-label">Expenses</label>
            <input type="text" id="expenses" name="expenses" required class="form-control {{$errors->has('expenses') ? 'is-invalid' : ''}}" value="{{$suicide->expenses}}">
            @if($errors->has('expenses'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('expenses')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="employeecompensation" class="control-label">Employee Compensation</label>
            <input type="text" id="employeecompensation" name="employeecompensation" required class="form-control {{$errors->has('employeecompensation') ? 'is-invalid' : ''}}" value="{{$suicide->employeecompensation}}">
            @if($errors->has('employeecompensation'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('employeecompensation')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="unemployment" class="control-label">Unemployment</label>
            <input type="text" id="unemployment" name="unemployment" required class="form-control {{$errors->has('unemployment') ? 'is-invalid' : ''}}" value="{{$suicide->unemployment}}">
            @if($errors->has('unemployment'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('unemployment')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="physician_price" class="control-label">Physician Price</label>
            <input type="text" id="physician_price" name="physician_price" required class="form-control {{$errors->has('physician_price') ? 'is-invalid' : ''}}" value="{{$suicide->physician_price}}">
            @if($errors->has('physician_price'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('physician_price')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="laborforcetotal" class="control-label">laborforcetotal</label>
            <input type="text" id="laborforcetotal" name="laborforcetotal" required class="form-control {{$errors->has('laborforcetotal') ? 'is-invalid' : ''}}" value="{{$suicide->laborforcetotal}}">
            @if($errors->has('laborforcetotal'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('laborforcetotal')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="lifeexpectancy" class="control-label">lifeexpectancy</label>
            <input type="text" id="lifeexpectancy" name="lifeexpectancy" required class="form-control {{$errors->has('lifeexpectancy') ? 'is-invalid' : ''}}" value="{{$suicide->lifeexpectancy}}">
            @if($errors->has('lifeexpectancy'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('lifeexpectancy')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="mobilesubscriptions" class="control-label">mobilesubscriptions</label>
            <input type="text" id="mobilesubscriptions" name="mobilesubscriptions" required class="form-control {{$errors->has('mobilesubscriptions') ? 'is-invalid' : ''}}" value="{{$suicide->mobilesubscriptions}}">
            @if($errors->has('mobilesubscriptions'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('mobilesubscriptions')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="refugees" class="control-label">refugees</label>
            <input type="text" id="refugees" name="refugees" required class="form-control {{$errors->has('refugees') ? 'is-invalid' : ''}}" value="{{$suicide->refugees}}">
            @if($errors->has('refugees'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('refugees')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="selfemployed" class="control-label">selfemployed</label>
            <input type="text" id="selfemployed" name="selfemployed" required class="form-control {{$errors->has('selfemployed') ? 'is-invalid' : ''}}" value="{{$suicide->selfemployed}}">
            @if($errors->has('selfemployed'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('selfemployed')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="electricityacess" class="control-label">electricityacess</label>
            <input type="text" id="electricityacess" name="electricityacess" required class="form-control {{$errors->has('electricityacess') ? 'is-invalid' : ''}}" value="{{$suicide->electricityacess}}">
            @if($errors->has('electricityacess'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('electricityacess')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="continent" class="control-label">continent</label>
            <input type="text" id="continent" name="continent" required class="form-control {{$errors->has('continent') ? 'is-invalid' : ''}}" value="{{$suicide->continent}}">
            @if($errors->has('continent'))
                <span class="help-block error invalid-feedback">
                    <strong>{{$errors->first('continent')}}</strong>
                </span>
            @endif
        </div>



    </div>
@endsection
</x-form-layout>
