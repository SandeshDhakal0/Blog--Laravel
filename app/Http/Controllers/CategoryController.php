<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Https\getClientOriginalExtention;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Call the model to extract all the data from the database
        $data = Category::all();
        return view('backend.category.index', ['data' => $data, 'title' => 'All Categories']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.category.add');
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
        ]);

        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/imgs');
            $image->move($destination, $reImage);
            //$newimage->imagePath = $destination.$imageName;
        }
        $category = new Category();
        $category->title = $request->title;
        $category->detail = $request->detail;
        $category->image = $reImage;
        $category->save();

        return redirect('admin/category/create')->with('success', 'The data has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('backend.category.update', ['data' => $data]);
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
        $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/imgs');
            $image->move($destination, $reImage);
        } else {
            $reImage = $request->cat_image;
        }
        $category = Category::find($id);
        $category->title = $request->title;
        $category->detail = $request->detail;
        $category->image = $reImage;
        $category->save();

        return redirect('admin/category/' . $id . '/edit')->with('success', 'The data has been submitted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect('admin/category');
    }
}
