<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use DB;

class HomeController extends Controller
{
    function index(Request $request)
    {
    if($request->has('q')){
        $q=$request->q;
        $posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->simplepaginate(9);
    } else {
        $posts = Post::orderBy('id','desc')->simplepaginate(9);
    }
        return view('home',['posts'=>$posts]);
    }

    function detail(Request $request,$postId){
        // To count the views
        // $d = DB::select('select * from posts where id = ?', [$postId])->increment('views');

        // dd($d);
        Post::find($postId)->increment('views');
        $detail=Post::find($postId);
        return view('detail',['detail'=>$detail]);
    }

    function save_comment(Request $request,$id){
         $request->validate([
            'comment'=> 'required'
         ]);

         $data = new Comment();
        //  dd($data);
         $data->user_id=$request->user()->id;
         $data->post_id=$id;
         $data->comment=$request->comment;
         $data->save();
         return redirect()->back()->with('success','This is a success message');
    }
}
