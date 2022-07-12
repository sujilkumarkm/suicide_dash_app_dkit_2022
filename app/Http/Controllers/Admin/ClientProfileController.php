<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ClientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $clients  = ClientProfile::all();
        return view('admin.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'required|string|min:10|unique:client_profiles',
            'gender' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'source' => 'string|max:255',
            'profession' => 'nullable|string|max:255',
            'malayali' => 'nullable|string|max:255',
        ]);

        $client  = new ClientProfile();
        $client->fname = $request->fname;
        $client->lname = $request->lname;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->facebook = $request->facebook;
        $client->instagram = $request->instagram;
        $client->linkedin = $request->linkedin;
        $client->gender = $request->gender;
        $client->source = $request->source;
        $client->proffession = $request->profession;
        $client->malayali=$request->malayali;

        $client->save();
        // dd('working');
        return redirect()->route('client.create')->with('success', 'Client data successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = ClientProfile::findOrFail($id);
        return view('front.client.show', compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = ClientProfile::findOrFail($id);
        return view('admin.client.edit', compact('clients'));
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
        // dd($id);
        $client = ClientProfile::findOrFail($id);
        $request->validate([
            'fname' => 'nullable|string|max:255',
            'lname' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'required|string|min:10|unique:client_profiles,phone,'.$client->id,
            'gender' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'source' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
        ]);


        $client->fname = $request->fname;
        $client->lname = $request->lname;
        $client->email = $request->email;
        $client->facebook = $request->facebook;
        $client->instagram = $request->instagram;
        $client->linkedin = $request->linkedin;
        $client->gender = $request->gender;
        $client->source = $request->source;
        $client->proffession = $request->profession;

        $client->update();
        // dd('working');
        return redirect()->route('clients.index')->with('success', 'Client data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = ClientProfile::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client data successfully deleted');
    }
}
