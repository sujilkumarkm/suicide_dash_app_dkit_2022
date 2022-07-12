<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
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
        if (! Gate::allows('permission-list')) {
            return abort(401);
        }

        $permissions  = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        if (! Gate::allows('permission-create')) {
            return abort(401);
        }

        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        if (! Gate::allows('permission-create')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required|max:255',
        ]);
        
        $permission  = new Permission();
        $permission->name = $request->name;
        $permission->slug = Permission::generateSlug($request->name);
        $permission->save();

        return redirect()->route('permission.index')->with('success', 'Permission Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        if (! Gate::allows('permission-show')) {
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
        if (! Gate::allows('permission-edit')) {
            return abort(401);
        }

        $permission = Permission::findOrFail($id);       
        return view('admin.permission.edit', compact('permission'));
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
        if (! Gate::allows('permission-edit')) {
            return abort(401);
        }

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->slug = Permission::generateSlug($request->name);
        $permission->update();

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        if (! Gate::allows('permission-delete')) {
            return abort(401);
        }

        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permission.index');
    }
}
