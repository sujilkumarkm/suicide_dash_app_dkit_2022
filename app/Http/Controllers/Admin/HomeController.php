<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function settings($id)
    {

        $site_details=SiteDetails::where('id',$id)->first();
        // dd($site_details);
        if($site_details)
        {
            return view('admin.site_details',['site_details'=>$site_details]);
        }
        return view('admin.site_details');

    }
    public function sitedetails(Request $request)
    {
        $site_details=SiteDetails::where('id',$request->id)->first();
        if($site_details)
        {
            $data=[
                'phone_1'=>preg_replace('/\D/', '', $request->phone_1),
                'phone_2'=>preg_replace('/\D/', '', $request->phone_2),
                'email_1'=>$request->email_1,
                'email_2'=>$request->email_2,
                'address'=>$request->address,
                'whatsapp'=>preg_replace('/\D/', '', $request->whatsapp),
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
            ];
            $site_details->update($data);

        }
        else{
            $data=[
                'phone_1'=>preg_replace('/\D/', '', $request->phone_1),
                'phone_2'=>preg_replace('/\D/', '', $request->phone_2),
                'email_1'=>$request->email_1,
                'email_2'=>$request->email_2,
                'address'=>$request->address,
                'whatsapp'=>preg_replace('/\D/', '', $request->whatsapp),
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
            ];
            SiteDetails::create($data);
        }

        return back()->with('success','Details Add Successfully');
    }
}
