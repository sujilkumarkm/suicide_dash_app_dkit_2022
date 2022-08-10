<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MetaData;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $metadata=MetaData::where('page_name','Home')->first();
        return view('front.home',compact('metadata'));
    }
    public function contact()
    {
        $metadata=MetaData::where('page_name','Contact Us')->first();
        return view('front.contact',['metadata'=>$metadata]);
    }
    public function about()
    {
        $metadata=MetaData::where('page_name','About Us')->first();
        return view('front.about',['metadata'=>$metadata]);
    }

}
