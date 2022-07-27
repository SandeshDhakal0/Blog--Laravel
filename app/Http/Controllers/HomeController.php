<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    function home(){
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('home',['posts'=>$posts]);
    }
}
