<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class JournalController extends Controller
{
    public function AddJournal(Request $request)
    {
        $category = new Category();
        $category->cat_name = $request->journalName;
        $category->issn = $request->issn;
        $category->description = $request->description;
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect()->back()->with('success', 'New Journal added successful');
    }
}
