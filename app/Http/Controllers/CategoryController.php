<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Multipic;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;
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
        $journal_image = $request->file('journal_image');
        
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($journal_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = 'assets/images/journals/';
        // $last_img = $up_location.$img_name;
        // $journal_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$journal_image->getClientOriginalExtension();
        Image::make($journal_image)->resize(300,300)->save('assets/images/journals/'.$name_gen);
        $last_img = 'assets/images/journals/'.$name_gen;

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->journal_image = $last_img;
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
        // $data = array();
        // $data['cat_name'] = $request->cat_name;
        // $data['issn'] = $request->issn;
        // $data['description'] = $request->description;
        // DB::table('categories')->where('id', $id)->update($data);
        // return redirect()->route('index.category')->with('success', 'Category updated successful');

        $validated = $request->validate([
            'cat_name' => 'required',
            'journal_image' => 'mimes: jpg,png,jpeg,gif',
            
        ]);
        
        $old_image = $request->old_image;
        $journal_image = $request->file('journal_image');
        if($journal_image){
            unlink($old_image);
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($journal_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'assets/images/journals/';
        $last_img = $up_location.$img_name;
        $journal_image->move($up_location,$img_name);
    
       
        $data = array();
        $data['cat_name'] = $request->cat_name;
        $data['journal_image'] = $last_img;
        $data['issn'] = $request->issn;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        DB::table('categories')->where('id', $id)->update($data);
       
        return redirect()->back()->with('success', 'Journal updated successful');
        }else{
            $data = array();
            $data['cat_name'] = $request->cat_name;
            
            $data['issn'] = $request->issn;
            $data['description'] = $request->description;
            $data['status'] = $request->status;
                return redirect()->back()->with('success', 'Journal updated successful'); 
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
        $image = Category::find($id);
        $old_image = $image->journal_image;
        unlink($old_image);
        Category::findorFail($id)->delete();

        return redirect()->back()->with('success', 'Category deleted  successful');
    }

    public function AddImage(Request $request){
        $images = $request->file('image');
        foreach($images as $multipic){
        $name_gen = hexdec(uniqid()).'.'.$multipic->getClientOriginalExtension();
        Image::make($multipic)->resize(300,300)->save('assets/images/gallery/'.$name_gen);
        $last_img = 'assets/images/gallery/'.$name_gen;

        $multipic = new Multipic();
        
        $multipic->image = $last_img;
       
        $multipic->save();
        } // end of multipic 
        return redirect()->back()->with('success', 'New Gallery added successful');
    }

    public function MultiImage(){
        $images = Multipic::All();
        
        return view('admin.image.index', compact('images'));
    }
   
}
