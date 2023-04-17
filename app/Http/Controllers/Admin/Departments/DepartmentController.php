<?php

namespace App\Http\Controllers\Admin\Departments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['departments'] = DB::table('departments')->get();
        return View::make('Admin.Department.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin.Department.create');
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
            'name' => 'required|string'
        ]);
        $data = $request->except('_token');
        $slug = Str::slug($data['name']);
       $slug_count = DB::table('departments')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().rand(100000, 999999).'-'.$slug;
        } 
       $data['slug'] = $slug;
        if ($request->has("image")) {
            
            $image = $request->file("image");
            
            $cms_img =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();
        
            $image->storeAs("public/DepartmentImage", $cms_img);
        
            $data["image"] = $cms_img;
        }
        // dd($data);
        $store = DB::table('departments')->insert($data);
        if($store) {
            return redirect('admin/departments')->with('msg', 'Departments Inserted Succesfully');
        }else{
            return redirect()->back()->with('msg', 'Some Error Occur!');
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
        $data['department'] = DB::table('departments')->where('slug', $slug)->first();
        // dd($member);
       
        return View::make('Admin.Department.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['department'] = DB::table('departments')->where('slug', $slug)->first();
        // dd($member);
       
        return View::make('Admin.Department.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
      $img = DB::table('departments')->where("slug", $slug)->select('image')->first();

        $data = $request->except('_token', '_method');
        if ($request->has("image")) {
            File::delete("storage/DepartmentImage/" . $img->image);
            $image = $request->file("image");
            
            $cms_img =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();
        
            $image->storeAs("public/DepartmentImage", $cms_img);
        
            $data["image"] = $cms_img;
        }else {
            $data["image"] = $img->image;
        }
        $update = Department::where('slug',$slug)->update($data);
        if ($update) {
            return redirect('admin/departments')
                ->with("msg", "Department Information Updated Successfully");
            } else {
            return redirect()
                ->back()
                ->with("msg", "Some Error Occured!");
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
        $delete_user = Department::where('slug',$slug)->first();
        $jobs = $delete_user->jobs()->get();
        foreach($jobs as $job) {
            $job->delete();
        }
        $delete_user->delete();
        return redirect()->back()->with('msg',$delete_user->title .' Deleted Successfully');
    }

    public function changeS(Request $request)
    {
       
    //   $data = $request->all();
    //   dd($data);
      $status = DB::table('departments')->where('slug',$request->slug)->update(['status'=>$request->status]);
        if($status){
            return response()->json([
                'status' => 1,
                'msg' => 'Status Successfully Updated'
            ]);
        }
    }
}
