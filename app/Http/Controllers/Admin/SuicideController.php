<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Suicide;
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
}
