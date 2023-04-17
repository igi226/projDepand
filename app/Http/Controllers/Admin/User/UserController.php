<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest as UserUserRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class UserController extends Controller
{
   
    public function index()
    {
        $users = DB::table('users')->where('user_type', 'Employee')->orderBy('id', 'desc')->get();
        return View::make('Admin.User.index')
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserUserRequest $request)
    {
       $data = $request->except('_token', 'password', 'slug');
       $slug = Str::slug($data['name']);
        $slug_count = DB::table('users')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().rand(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        $data['user_type'] = 'Employee';

       $data['password'] = Hash::make($request->password);
       $store = DB::table('users')->insert($data);
       if($store){
           return redirect('/admin/users')->with("msg", $data['name']." Added Successfully");
       }else{
           return redirect()->back()->with('msg', 'some error occur!');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = DB::table('users')->where('slug', $slug)->first();
        return View::make('Admin.User.view')
        ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();
// dd($user);
        // show the edit form and pass the shark
        return View::make('Admin.User.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $slug)
    {
       $user = User::where('slug', $slug)->first();
       if($user){
       $data = $request->except('_token', '_method');
       if($data['password'] != null){
        
        $data['password'] = Hash::make($data['password']);
       }else{
        $data['password'] = $user->password;
       } 
       $update = User::where('slug',$slug)->update($data);
       if ($update) {
           return redirect('admin/users')
               ->with("msg", "User Information Updated Successfully");
        } else {
           return redirect()
               ->back()
               ->with("msg", "Some Error Occured!");
       }
     } else{
        return redirect()
               ->back()
               ->with("msg", "User doesn't exist!");
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $delete_user = User::where('slug',$slug)->first();
        $delete_user->delete();
        return redirect()->back()->with('msg',$delete_user->name .' Deleted Successfully');
    }

    public function changeS(Request $request)
    {
       
    //   $data = $request->all();
    //   dd($data);
      $status = DB::table('users')->where('slug',$request->slug)->update(['status'=>$request->status]);
        if($status){
            return response()->json([
                'status' => 1,
                'msg' => 'Status Successfully Updated'
            ]);
        }
    }

    public function changeEV(Request $request)
    {
        if($request->is_email_verified == 1){
            $is_email_verified = date("Y-m-d h:i");
        }else{
            $is_email_verified = null;
        }
      $status = DB::table('users')->where('slug',$request->slug)->update(['email_verified_at'=>$is_email_verified]);
        if($status){
            if($request->is_email_verified == 1){
                $msg = "Email is verified successfully";
            }else{
                $msg = "Email verificaton is disabled";

            }
            return response()->json([
                'status' => 1,
                'msg' =>  $msg 
            ]);
        }
    }

    
}
