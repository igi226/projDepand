<?php

namespace App\Http\Controllers\Admin\Subadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\User\UserRequest as UserUserRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubadminController extends Controller
{

    public function index()
    {
        $data['sub_admins'] = DB::table('admins')->where('user_type', 'Subadmin')->get();
        return view('Admin.Subadmin.index', $data);
    }


    public function create()
    {
        return view('Admin.Subadmin.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'subadmin_access' => 'required'
        ]);


        $data = $request->except('_token', 'password', 'admin_slug');
        $slug = Str::slug($data['admin_name']);
        $slug_count = DB::table('admins')->where('admin_slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . rand(100000, 999999) . '-' . $slug;
        }
        $data['admin_slug'] = $slug;
        $data['user_type'] = 'Subadmin';
        $data['subadmin_access'] = implode(',',$request->subadmin_access);
        $data['password'] = Hash::make($request->password);
        // dd($data);
        $store = DB::table('admins')->insert($data);
        if ($store) {
            return redirect('/admin/sub-admins')->with("msg", $data['admin_name'] . " Added Successfully");
        } else {
            return redirect()->back()->with('msg', 'some error occur!');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($slug)
    {
        $user = Admin::where('admin_slug', $slug)->first();

        return view('Admin.Subadmin.edit')
            ->with('subadmin', $user);
    }


    public function update(Request $request, $slug)
    {
        $subadmin = Admin::where('admin_slug', $slug)->first();
        if ($subadmin) {
            $data = $request->except('_token', '_method');
            if ($data['password'] != null) {

                $data['password'] = Hash::make($data['password']);
            } else {
                $data['password'] = $subadmin->password;
            }
            $update = Admin::where('admin_slug', $slug)->update($data);
            if ($update) {
                return redirect('admin/sub-admins')
                    ->with("msg", "Subadmin Information Updated Successfully");
            } else {
                return redirect()
                    ->back()
                    ->with("msg", "Some Error Occured!");
            }
        } else {
            return redirect()
                ->back()
                ->with("msg", "Subadmin doesn't exist!");
        }
    }


    public function destroy($slug)
    {
        $delete_user = Admin::where('admin_slug', $slug)->first();
        $delete_user->delete();
        return redirect()->back()->with('msg', $delete_user->admin_name . ' Deleted Successfully');
    }


    // public function changeS(Request $request)
    // {
    //     $status = DB::table('users')->where('slug', $request->slug)->update(['status' => $request->status]);
    //     if ($status) {
    //         return response()->json([
    //             'status' => 1,
    //             'msg' => 'Status Successfully Updated'
    //         ]);
    //     }
    // }
}