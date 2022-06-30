<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //
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
            'title' => 'required|unique:submissionss|max:255',
            'volume' => 'required',
            'year' => 'required',
            'number' => 'required',
        ]);
        $submissions = new Submission();
        $submissions->title = $request->title;
        $submissions->cat_id = Auth::user()->id;
        $submissions->issue_id = Auth::user()->id;
        $submissions->pages = $request->pages;
        $submissions->author =$request->author;
        $submissions->abstract =$request->abstract;
        $submissions->keywords =$request->keywords;
        $submissions->pdf_link =$request->pdf_links;
        $submissions->startDate =$request->startDate;
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
        $submissions = Submission::latest()->paginate(5);
        return view('admin.submission.index', compact('submissions'));
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
