<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\Memberrequest;
use App\Models\TeamMemBer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mebers = DB::table('team_mem_bers')->get();
        return View::make('Admin.Member.index')
        ->with('mebers', $mebers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin.Member.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Memberrequest $request)
    {
        $data = $request->except('_token','slug');
       $slug = Str::slug($data['name']);
       $slug_count = DB::table('team_mem_bers')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().rand(100000, 999999).'-'.$slug;
        } 
       $data['slug'] = $slug;
       if ($request->has("image")) {
            
            $image = $request->file("image");
            
            $member_image =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();
        
            $image->storeAs("public/MemberImage", $member_image);
        
            $data["image"] = $member_image;
        }

        $store = DB::table('team_mem_bers')->insert($data);
        if($store){
            return redirect('/admin/members')->with("msg", $data['name']." Added Successfully");
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
        $member = DB::table('team_mem_bers')->where('slug', $slug)->first();
        return View::make('Admin.Member.view')
        ->with('member', $member);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $member = DB::table('team_mem_bers')->where('slug', $slug)->first();
        // dd($member);
       
        return View::make('Admin.Member.edit')
            ->with('member', $member);
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
        $member = DB::table('team_mem_bers')->where('slug', $slug)->first();
        if($member){

        
      $request->validate([
        'name' => 'required|string'
      ]);
      $img = DB::table('team_mem_bers')->where("slug", $slug)->select('image')->first();
      $data = $request->except('_token', '_method', 'image');
      if ($request->has("image")) {
       
        File::delete("storage/MemberImage/" . $img->image);
        
        $image = $request->file("image");
        $member_img =
            time() .
            rand(0000, 9999) .
            "." .
            $image->getClientOriginalExtension();
        
        $image->storeAs("public/MemberImage", $member_img);
   
        $data["image"] = $member_img;
            }else {
                $data["image"] = $img->image;
            }
            // dd($data);
            $update = TeamMemBer::where('slug',$slug)->update($data);
            if ($update) {
                return redirect('admin/members')
                    ->with("msg", "Member Information Updated Successfully");
                } else {
                return redirect()
                    ->back()
                    ->with("msg", "Some Error Occured!");
            }
        }else{
            return redirect()
            ->back()
            ->with("msg", "Member doesn't exist!");
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
        $delete_user = TeamMemBer::where('slug',$slug)->first();
        $delete_user->delete();
        return redirect()->back()->with('msg',$delete_user->name .' Deleted Successfully');
    }
}
