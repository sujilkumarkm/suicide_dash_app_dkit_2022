<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Suicide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DataTables;

class SuicideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
        if (! Gate::allows('suicide-list')) {
            return abort(401);
        }
        $suicides = Suicide::all();
        // $suicides=Suicide::paginate(10);
        if ($request->ajax()) {
            $suicides = Suicide::all();
            return Datatables::of($suicides)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

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

        $intern  = new Suicide();
        $intern->country = $request->country;
        $intern->year = $request->year;
        $intern->sex = $request->sex;
        $intern->age = $request->age;
        $intern->suicides = $request->suicides;
        $intern->population = $request->population;
        $intern->sucid_in_hundredk = $request->sucid_in_hundredk;
        $intern->yearly_gdp = $request->yearly_gdp;
        $intern->gdp_per_capita = $request->gdp_per_capita;
        $intern->internetusers = $request->internetusers;
        $intern->expenses = $request->expenses;
        $intern->employeecompensation = $request->employeecompensation;
        $intern->unemployment = $request->unemployment;
        $intern->physician_price = $request->physician_price;
        $intern->laborforcetotal = $request->laborforcetotal;
        $intern->lifeexpectancy = $request->lifeexpectancy;
        $intern->mobilesubscriptions = $request->mobilesubscriptions;
        $intern->refugees = $request->refugees;
        $intern->selfemployed = $request->selfemployed;
        $intern->electricityacess = $request->electricityacess;
        $intern->continent = $request->continent;
        $intern->mobilesubscription = $request->mobilesubscription;
        $intern->save();
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
}
