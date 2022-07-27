<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return view('backend.post.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('backend.post.add',['cats'=>$cats]);
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
            'title' => 'required',
            'category'=> 'required',
            'detail'=> 'required',
        ]);
        // dd($request->all());
        // Post thumbnail
        if ($request->hasFile('post_thumb')) {
            $image = $request->file('post_thumb');
            $reThumbImage = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/imgs');
            $image->move($destination, $reThumbImage);
        } else {
            $reThumbImage = 'no image';
        }
        // dd($request);
        // Post full IMage
        if ($request->hasFile('post_image')) {
            $image = $request->file('post_image');
            $reFullImage = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/imgs');
            $image->move($destination, $reFullImage);
        } else {
            $reFullImage = 'no image';
        }

        $post = new Post();
        $post->user_id = 0;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $reThumbImage;
        $post->full_img = $reFullImage;
        $post->detail = $request->detail;
        $post->tags = $request->tags;
        $post->save();

        return redirect('admin/post/create')->with('success', 'Data has been submitted');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = Category::all();
        return view('backend.post.add')
         ->with('cats',$cats);
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
