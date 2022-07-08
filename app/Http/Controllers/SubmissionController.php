<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Issues;
use App\Models\Submission;
use Auth;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $categories = Category::All(); 
          $issues = Issues::All(); 
        //$categories = Category::latest()->get();
        $submissions = Submission::latest()->paginate(5);
       // $catDel = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.submission.index', compact('categories', 'issues', 'submissions'));
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
            'title' => 'required|unique:submissions|max:255',
            'pages' => 'required',
            'abstract' => 'required',
            'author' => 'required',
        ]);
        $submissions = new Submission();
        $submissions->title = $request->title;
        $submissions->cat_id = $request->journal;
        $submissions->issue_id = $request->issue;
        $submissions->pages = $request->pages;
        $submissions->author =$request->author;
        $submissions->abstract =$request->abstract;
        $submissions->keywords =$request->keywords;
        $submissions->pdf_link ='https://www.kalzumeus.com/2011/10/28/dont-call-yourself-a-programmer/';
        $submissions->startDate =$request->startDate;
        $submissions->status =$request->status;
        $submissions->uploaded_by = Auth::user()->id;
        $submissions->save();
        return redirect()->back()->with('success', 'New submissions added successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submissions=Submission::find($id);
        return view('admin.submission.edit', compact('submissions'));
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
        $submissions=Submission::findorFail($id);
        $submissions->update($request->all());
         


        // Query Builder Update
       // $data = array();
      //  $data['cat_name'] = $request->cat_name;
      //  $data['issn'] = $request->issn;
       // $data['description'] = $request->description;
       // DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('index.submission')->with('success', 'Submission updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Submission::findorFail($id)->delete();

        return redirect()->back()->with('success', 'Submission  deleted  successful');
    }
}
