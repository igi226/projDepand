<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('Admin.Dashboard.dashboard');
    }

    public function siteInfo() {
        $data['siteInfos'] = SiteInfo::where('slug', 'defendable-stuff-site-info')->first();
        return view('Admin.SiteSetting.siteSettings', $data);
    }

    public function siteInfoUpdate(Request $req) {
        $req->validate([
            'site_name' => 'required|string',
            'email' => 'required|email'
        ]);
        $data = $req->except('_token', 'logo_image', 'favicon_image');
        $img = SiteInfo::where("slug", "defendable-stuff-site-info")->select('logo_image', 'favicon_image')->first();
        if ($req->has("logo_image")) {
            // dd('hasfile');
            File::delete("storage/SiteImages/" . $img->logo_image);

        
            $image = $req->file("logo_image");
            //dd($image);

            $logo_image =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();
            //dd($logo_image);
            $image->storeAs("public/SiteImages", $logo_image);

            //storePubliclyAs
            $data["logo_image"] = $logo_image;
        }

        //dd($data);
        else {
            //  dd('no');
           $data["logo_image"] = $img->logo_image;
        }

        if ($req->has("favicon_image")) {
           
            File::delete("storage/SiteImages/" . $img->favicon_image);
          
            $image = $req->file("favicon_image");
            // dd($image);

            $favicon =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();
            // dd($favicon);
            $image->storeAs("public/SiteImages", $favicon);
            //storePubliclyAs
            $data["favicon_image"] = $favicon;
        }

        //dd($data);
        else {
           
            $data["favicon_image"] = $img->favicon_image;
        }
        $update = SiteInfo::where("slug", "defendable-stuff-site-info")->update( $data );
        // $path = Storage::path('SiteImages/'.$favicon);
        // $path2 = asset('storage/SiteImages/'.$favicon);
        //dd($path);
        // dd($path2);
        if ($update) {
            return redirect()
                ->back()
                ->with("msg", "Site Information Updated Successfully");
        } else {
            return redirect()
                ->back()
                ->with("msg", "Some Error Occur!");
        }
    }
    
    public function logOut(){
        Session::forget('adminLogin');
        return redirect('admin');
    }
}
