<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\ParentComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function blog() {
        $data['blogs'] = DB::table('blogs')->paginate(6);
        return View::make('User.Blog.blog', $data);
    }

    public function view( $slug ) {
        $data['blog'] = Blog::where('slug', $slug)->first();
        
        return View::make('User.Blog.view', $data); 
    }

    public function comment(Request $request, $blog_id) {
        $request->validate([
            'comment' => 'required|string'
        ]);
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
        $data['blog_id'] = $blog_id;
        //dd($data);
        $store = DB::table('comments')->insert($data);
        if($store){
            return redirect()->back()->with('msg', 'Thanks for Your Comment');
        }else{
            return redirect()->back()->with('msg', 'Some Error Occour!');
        }

    }
     public function parentComment(Request $request, $c_id){
        //dd($c_id);
        $request->validate([
            'reply' => 'required|string',
        ]);
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
        $data['comment_id'] = $c_id;
        // dd($data);
        $store = DB::table('parent_comments')->insert($data);
        if($store){
            return redirect()->back()->with('msg', 'Thanks for you Reply Comment');
        }else{
            return redirect()->back()->with('msg', 'Some Error Occur!');

        }

     }
}
