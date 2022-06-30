<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\Issues;
 
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
        return view('admin.issue.index', compact('issues'));
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
        $issue->cat_id = Auth::user()->id;
        $issue->volume = $request->volume;
        $issue->number =$request->number;
        $issue->year =$request->year;
        $issue->status =$request->status;
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
