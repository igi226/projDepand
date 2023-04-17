<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function pageLogin() {
    return view('Admin.Auth.login');
    }

    public function adminLogin( Request $request ) {
        $request->validate([
            'admin_email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = Admin::where('admin_email',$request->admin_email)->first();
       
        if(!$admin || !Hash::check($request->password,$admin->password)){
            return redirect()->back()->with('msg','Cradentials are wrong! Provide correct information');
        } else{
          
           Session::put('adminLogin',['id'=>$admin->id, 'name'=>$admin->admin_name, 'slug'=>$admin->admin_slug ]);

           return redirect('admin/dashboard');

         }   
    } 

    public function showProfile() {
        $data['admin_info'] = Admin::where('admin_slug', 'Admin-d')->first();
        return view('Admin.Profile.profile', $data);
    }

    public function updateProfile(Request $req) {
        $data = $req->except('_token', 'admin_image');

        $img = Admin::where("admin_slug", "Admin-d")->select('admin_image')->first();
        if ($req->has("admin_image")) {
           
            File::delete("storage/Admin/" . $img->admin_image);
            $image = $req->file("admin_image");
            $admin_image =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();
          
            $image->storeAs("public/Admin", $admin_image);
          
            $data["admin_image"] = $admin_image;
        } else {
                $data["admin_image"] = $img->admin_image;
               }

        $update = Admin::where("admin_slug", "Admin-d")->update( $data );
        if ($update) {
            return redirect()
                ->back()
                ->with("msg", "Admin Information Updated Successfully");
        } else {
            return redirect()
                ->back()
                ->with("msg", "Some Error Occur!");
        }
     
    }

    public function showPassword() {
        return view('Admin.Profile.changePassword');
    }
    public function updatePassword( Request $req) {
        $req->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'same:new_password',
        ]);
        $old_password = Admin::where("admin_slug", "Admin-d")->first();
        if (Hash::check($req->current_password, $old_password->password)) {
            $old_password->update(['password' => Hash::make($req->new_password)]);
            return redirect()->back()->with('msg', 'Password updated successfully');
            
        }else{
            return redirect()->back()->with("msg", "Current Password doesn not Match");
        }
    }
    
}
