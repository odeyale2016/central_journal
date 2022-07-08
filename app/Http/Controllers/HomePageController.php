<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Issues;
use App\Models\Submission;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function create()
    {
          
          $categories = Category::latest()->paginate(3);
          $issues = Issues::latest()->paginate(3); 
          $submissions = Submission::latest()->paginate(5); 
        return view('welcome', compact('categories', 'issues', 'submissions'));
    }
}
