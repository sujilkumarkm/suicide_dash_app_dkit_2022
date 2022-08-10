<?php

namespace App\Http\Middleware;
use App\Models\SiteDetails;
use App\Models\MetaData;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Closure;

class ShareVariable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $site_details=SiteDetails::where('id','1')->first();
        $sellers=Post::where('show_in',"Seller's Guide")->first();
        $buyers=Post::where('show_in',"Buyer's Guide")->first();
        $blogs=Post::where('show_in',"Blogs")->first();
        $blog_data=Post::all();
        $data=array(
            'site_details'=>$site_details,
            'sellers'=>$sellers,
            'buyers'=>$buyers,
            'blogs'=>$blogs,
            'blog_data'=>$blog_data
        );
        //view()->share('data', $data);
        View::share('data', $data);
        return $next($request);
    }
}
