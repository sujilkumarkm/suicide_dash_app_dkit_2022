<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Suicide;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuicideController extends Controller
{
    public function index()
    {

        if (! Gate::allows('suicide-list')) {
            return abort(401);
        }

        $suicides=Suicide::all();

        return view('admin.suicide.index',['suicides'=>$suicides]);
    }
}
