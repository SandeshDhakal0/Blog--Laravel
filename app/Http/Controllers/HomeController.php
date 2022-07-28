<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    function index(Request $request)
    {
    if($request->has('q')){
        $q=$request->q;
        $posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(3);
    } else {
        $posts = Post::orderBy('id','desc')->paginate(3);
    }
        return view('home',['posts'=>$posts]);
    }

    function detail(Request $request,$postId){
        $detail=Post::find($postId);
        return view('detail',['detail'=>$detail]);
    }

    function save_comment(Request $request,$id){
         $request->validate([
            'comment'=> 'required'
         ]);
         $data = new Comment;
         $data->$user_id=$request->user()->id;
         $data->$post_id=$id;
         $data->comment=$request->comment;
         $data->save();

         return redirect('detail/$id')->with('success','This is a success message');
    }
}
