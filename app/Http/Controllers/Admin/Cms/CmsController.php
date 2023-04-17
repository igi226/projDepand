<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\CmsRequest;
use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str; 

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_s = DB::table('cms')->get();
        return View::make('Admin.CMS.index')
        ->with('data_s', $data_s);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin.CMS.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CmsRequest $request)
    {
        $data = $request->except('_token', 'image');
        $slug = Str::slug($data['title']);
       $slug_count = DB::table('cms')->where('slug',$slug)->count();
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
        
            $image->storeAs("public/CmsImage", $cms_img);
            // $image->move(public_path("CmsImage"), $cms_img);
        
            $data["image"] = $cms_img;
        }
        $store = DB::table('cms')->insert($data);
        if($store){
            return redirect('/admin/cms')->with("msg", " Added Successfully");
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
        $data['cms'] = DB::table('cms')->where('slug', $slug)->first();
        // dd($member);
       
        return View::make('Admin.CMS.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data['cms'] = DB::table('cms')->where('slug', $slug)->first();
        // dd($member);
       
        return View::make('Admin.CMS.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CmsRequest $request, $slug)
    {
       $data = $request->except('_method', '_token', 'image');
       $img = DB::table('cms')->where("slug", $slug)->select('image')->first();

        $data = $request->except('_token', '_method');
        if ($request->has("image")) {
            // if(File::exists("storage/app/public/CmsImage/".$img->image)){
            //     unlink("storage/app/public/CmsImage/".$img->image);
            // }
            if(!empty($img->image) && file_exists(public_path("CmsImage/" . $img->image))){
                //     unlink("storage/app/public/UserImage/".$img->image);
                //  File::delete(public_path("storage/UserImage/" . $img->image));
                //dd($img->image);
                unlink(public_path("CmsImage/" . $img->image));
                }
            
            
            $image = $request->file("image");
            
            $cms_img =
                time() .
                rand(0000, 9999) .
                "." .
                $image->getClientOriginalExtension();
        
            // $image->move(public_path("CmsImage"), $cms_img);
            $image->storeAs("public/CmsImage", $cms_img);

        
            $data["image"] = $cms_img;
        }else {
            $data["image"] = $img->image;
        }
        $update = Cms::where('slug', $slug)->update($data);

        if($update){
            return redirect('/admin/cms')->with("msg", " Information Updated Successfully");
        }else{
            return redirect()->back()->with('msg', 'some error occur!');
        }
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
