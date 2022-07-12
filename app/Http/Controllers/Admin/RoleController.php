<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
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
          
        if (! Gate::allows('role-list')) {
            return abort(401);
        }

        $roles  = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
        if (! Gate::allows('role-create')) {
            return abort(401);
        }

        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        if (! Gate::allows('role-create')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required|max:255',
        ]);
        
        $role  = new Role();
        $role->name = $request->name;
        $role->slug = Role::generateSlug($request->name);
        $role->save();
        
        $role->permissions()->attach($request->permissions);

        return redirect()->route('role.index')->with('success', 'Role Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        if (! Gate::allows('role-show')) {
            return abort(401);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        if (! Gate::allows('role-edit')) {
            return abort(401);
        }

        $permissions = Permission::all();
        $role = Role::findOrFail($id);       
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        if (! Gate::allows('role-edit')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->slug = Role::generateSlug($request->name);
        $role->update();
        $role->permissions()->sync($request->permissions);

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        if (! Gate::allows('role-delete')) {
            return abort(401);
        }

        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index');
    }
}
