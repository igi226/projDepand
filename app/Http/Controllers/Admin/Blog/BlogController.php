<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::table('blogs')->get();
        return View::make('Admin.Blog.index')
        ->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
      $session = Session::get('adminLogin');
        // dd($session['id']);
        $data = $request->except('_token', 'image', 'slug');
        $slug = Str::slug($data['title']);
        $slug_count = DB::table('blogs')->where('slug',$slug)->count();
         if($slug_count>0){
             $slug = time().rand(100000, 999999).'-'.$slug;
         } 
        $data['slug'] = $slug;
        if ($request->has("image")) {
             
             $image = $request->file("image");
             
             $blog_image =
                 time() .
                 rand(0000, 9999) .
                 "." .
                 $image->getClientOriginalExtension();
         
             $image->storeAs("public/BlogImage", $blog_image);
         
             $data["image"] = $blog_image;
         }
        $data['user_id'] = $session['id'];
        $store = DB::table('blogs')->insert($data);
        if($store){
            return redirect('admin/blogs')->with('msg', 'New Blog Inserted Successfully');
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
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        return View::make('Admin.Blog.view')
        ->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        return View::make('Admin.Blog.edit')
        ->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $slug)
    {
      
       $img = DB::table('blogs')->where("slug", $slug)->select('image')->first();
      $data = $request->except('_token', '_method', 'image');
      if ($request->has("image")) {
       
        File::delete("storage/BlogImage/" . $img->image);
        
        $image = $request->file("image");
        $blog_img =
            time() .
            rand(0000, 9999) .
            "." .
            $image->getClientOriginalExtension();
        
        $image->storeAs("public/BlogImage", $blog_img);
   
        $data["image"] = $blog_img;
            }else {
                $data["image"] = $img->image;
            }

            $update = Blog::where('slug',$slug)->update($data);
            if ($update) {
                return redirect('admin/blogs')
                    ->with("msg", "Blog is Updated Successfully");
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
        $delete_blog = Blog::where('slug',$slug)->first();
        $comments = $delete_blog->comments()->get();
        foreach($comments as $comment) {
            $subComments = $comment->parentComments()->get();
            foreach($subComments as $subComment) {
                $subComment->delete();
            }
            $comment->delete();
        }
        $delete_blog->delete();
        return redirect()->back()->with('msg',$delete_blog->title .' Deleted Successfully');
    }

    public function comments() {
        $data['comments'] = Comment::get();
        return View::make('Admin.Blog.comment', $data);
    }

    public function deleteComments(Request $request) {
        $data = $request->all();
        dd($data);
        //$delete  =Comment::where('id',$request->id)->delete();
        //$delete->delete();
            return redirect()->back()->with('msg', 'This Comment Deleted SuccessFully with its Sub-Comment.');
        // if($delete){
        //     foreach($delete->parentComments as $subComment) {
        //         $subComment->delete();
        //     }
        //     $delete->delete();
        //     return redirect()->back()->with('msg', 'This Comment Deleted SuccessFully with its Sub-Comment.');
        // }else{
        //     return redirect()->back()->with('msg', 'Comment does not exist!');
        // }
    }
}
