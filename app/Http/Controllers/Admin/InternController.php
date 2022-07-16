<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InternController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (! Gate::allows('intern-list')) {
            return abort(401);
        }

        $interns=User::all();

        return view('admin.intern.index',['interns'=>$interns]);
    }
    public function create()
    {
        if (! Gate::allows('intern-create')) {
            return abort(401);
        }
        return view('admin.intern.create');
    }
    public function store(Request $request)
    {
        if (! Gate::allows('intern-create')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $intern  = new User();
        $intern->name = $request->name;
        $intern->email = $request->email;
        $intern->password = Hash::make($request->password);
        $intern->save();
        return redirect()->route('intern.index')->with('success', 'Suicide Successfully added');
    }
    public function edit($id)
    {
        if (! Gate::allows('post-edit')) {
            return abort(401);
        }

        $interns=User::findOrFail($id);
        return view('admin.intern.edit',['intern'=>$interns]);
    }
    public function update(Request $request, $id)
    {
        if (! Gate::allows('intern-edit')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $intern = User::findOrFail($id);
        $intern->name = $request->name;
        $intern->email = $request->email;
        $intern->update();

        return redirect()->route('intern.index')->with('success','Suicide updated successfully!');
    }
    public function destroy($id)
    {
        if (! Gate::allows('intern-delete')) {
            return abort(401);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('intern.index')->with('success','Suicide deleted successfully!');
    }
}
