<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Suicide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SuicideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        if (! Gate::allows('suicide-list')) {
            return abort(401);
        }

        $suicides=Suicide::all();

        return view('admin.suicide.index',['suicides'=>$suicides]);
    }
    public function create()
    {
        if (! Gate::allows('suicide-create')) {
            return abort(401);
        }
        return view('admin.suicide.create');
    }
    public function store(Request $request)
    {
        if (! Gate::allows('intern-create')) {
            return abort(401);
        }

        $request->validate([
            'country' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'sex' => 'required|string',
            'age' => 'required|string',
            'suicides' => 'required|numeric',
            'population' => 'required|numeric',
            'sucid_in_hundredk' => 'required|numeric',
            'yearly_gdp' => 'required|numeric',
            'gdp_per_capita' => 'required|numeric',
            'electricityacess' => 'required|numeric',
            'refugees' => 'required|numeric',
            'internetusers' => 'required|numeric',
            'mobilesubscriptions' => 'required|numeric',
            'laborforcetotal' => 'required|numeric',
            'physician_price' => 'required|numeric',
            'unemployment' => 'required|numeric',
        ]);

        $suicides  = new Suicide();
        $suicides->country = $request->country;
        $suicides->year = $request->year;
        $suicides->sex = $request->sex;
        $suicides->age = $request->age;
        $suicides->suicides = $request->suicides;
        $suicides->population = $request->population;
        $suicides->sucid_in_hundredk = $request->sucid_in_hundredk;
        $suicides->yearly_gdp = $request->yearly_gdp;
        $suicides->gdp_per_capita = $request->gdp_per_capita;
        $suicides->internetusers = $request->internetusers;
        $suicides->expenses = $request->expenses;
        $suicides->employeecompensation = $request->employeecompensation;
        $suicides->unemployment = $request->unemployment;
        $suicides->physician_price = $request->physician_price;
        $suicides->laborforcetotal = $request->laborforcetotal;
        $suicides->lifeexpectancy = $request->lifeexpectancy;
        $suicides->mobilesubscriptions = $request->mobilesubscriptions;
        $suicides->refugees = $request->refugees;
        $suicides->selfemployed = $request->selfemployed;
        $suicides->electricityacess = $request->electricityacess;
        $suicides->continent = $request->continent;
        $suicides->mobilesubscription = $request->mobilesubscription;
        $suicides->save();
        return redirect()->route('suicide.index')->with('success', 'New record successfully added');
    }
    public function destroy($id)
    {
        if (! Gate::allows('suicide-delete')) {
            return abort(401);
        }

        $user = Suicide::findOrFail($id);
        $user->delete();

        return redirect()->route('suicide.index')->with('success','Record deleted successfully!');
    }
    public function edit($id)
    {
        if (! Gate::allows('post-edit')) {
            return abort(401);
        }

        $suicides=Suicide::findOrFail($id);
        return view('admin.suicide.edit',['suicide'=>$suicides]);
    }
    public function update(Request $request, $id)
    {
        if (! Gate::allows('intern-edit')) {
            return abort(401);
        }

        $request->validate([
            'country' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'sex' => 'required|string',
            'age' => 'required|string',
            'suicides' => 'required|numeric',
            'population' => 'required|numeric',
            'sucid_in_hundredk' => 'required|numeric',
            'yearly_gdp' => 'required|numeric',
            'gdp_per_capita' => 'required|numeric',
            'electricityacess' => 'required|numeric',
            'refugees' => 'required|numeric',
            'internetusers' => 'required|numeric',
            'mobilesubscriptions' => 'required|numeric',
            'laborforcetotal' => 'required|numeric',
            'physician_price' => 'required|numeric',
            'unemployment' => 'required|numeric',
        ]);

        $suicide = Suicide::findOrFail($id);
        // dd($suicide);
        $suicide->country = $request->country;
        $suicide->year = $request->year;
        $suicide->sex = $request->sex;
        $suicide->age = $request->age;
        $suicide->suicides = $request->suicides;
        $suicide->population = $request->population;
        $suicide->sucid_in_hundredk = $request->sucid_in_hundredk;
        $suicide->yearly_gdp = $request->yearly_gdp;
        $suicide->gdp_per_capita = $request->gdp_per_capita;
        $suicide->internetusers = $request->internetusers;
        $suicide->expenses = $request->expenses;
        $suicide->employeecompensation = $request->employeecompensation;
        $suicide->unemployment = $request->unemployment;
        $suicide->physician_price = $request->physician_price;
        $suicide->laborforcetotal = $request->laborforcetotal;
        $suicide->lifeexpectancy = $request->lifeexpectancy;
        $suicide->mobilesubscriptions = $request->mobilesubscriptions;
        $suicide->refugees = $request->refugees;
        $suicide->selfemployed = $request->selfemployed;
        $suicide->electricityacess = $request->electricityacess;
        $suicide->continent = $request->continent;
        $suicide->mobilesubscription = $request->mobilesubscription;
        $suicide->update();

        return redirect()->route('suicide.index')->with('success','Record updated successfully!');
    }
}
