<?php

namespace App\Http\Controllers\Admin\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['employers'] = DB::table('users')->where('user_type', 'Employer')->orderBy('id', 'desc')->get();
       return View::make('Admin.Employer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return View::make('Admin.Employer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->except('_token', 'password', 'slug');
        $slug = Str::slug($data['name']);
         $slug_count = DB::table('users')->where('slug',$slug)->count();
         if($slug_count>0){
             $slug = time().rand(100000, 999999).'-'.$slug;
         }
         $data['slug'] = $slug;
         $data['user_type'] = 'Employer';
        $data['password'] = Hash::make($request->password);
        $store = DB::table('users')->insert($data);
        if($store){
            return redirect('/admin/employers')->with("msg", $data['name']." Added Successfully");
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
