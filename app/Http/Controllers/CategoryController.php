<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::All(); 
        //$categories = Category::latest()->get();
        $categories = Category::latest()->paginate(5);
       // $catDel = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required|unique:categories|max:255',
            'journal_image' => 'required|mimes: jpg,png,jpeg,gif',
            'description' => 'required',
        ]);
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->issn = $request->issn;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect()->back()->with('success', 'New Journal added successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // for Eloquent ORM Edit
        $categories=Category::findorFail($id);
       
        //for query Builder Edit
        //$categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('categories'));
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
        // Eloquent ORM Update
        //$categories=Category::findorFail($id);
        //$categories->update($request->all());
         


        // Query Builder Update
        $data = array();
        $data['cat_name'] = $request->cat_name;
        $data['issn'] = $request->issn;
        $data['description'] = $request->description;
        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('index.category')->with('success', 'Category updated successful');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::findorFail($id)->delete();

        return redirect()->back()->with('success', 'Category deleted  successful');
    }

   
}
