<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\Issues;
use App\Models\Category;
use Auth;
class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issues::latest()->paginate(5);
        $categories = Category::all();
        return view('admin.issue.index', compact('issues', 'categories'));
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
            'title' => 'required|unique:issues|max:255',
            'volume' => 'required',
            'year' => 'required',
            'number' => 'required',
        ]);
        $issue = new Issues();
        $issue->title = $request->title;
        $issue->cat_id = $request->journal;
        $issue->volume = $request->volume;
        $issue->number =$request->number;
        $issue->year =$request->year;
        $issue->status =$request->status;
        $issue->startDate =$request->startDate;
        $issue->uploaded_by = Auth::user()->id;
        $issue->save();
        return redirect()->back()->with('success', 'New Issue added successful');
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
        $issues=Issues::find($id);
        return view('admin.issue.edit', compact('issues'));

        //$roles=Role::lists('name','id')->all();
       
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
        $issues=Issues::findorFail($id);
        $issues->update($request->all());
         


        // Query Builder Update
       // $data = array();
      //  $data['cat_name'] = $request->cat_name;
      //  $data['issn'] = $request->issn;
       // $data['description'] = $request->description;
       // DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('index.issue')->with('success', 'Issue updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Issues::findorFail($id)->delete();

        return redirect()->back()->with('success', 'Issue deleted  successful');
    }
}
