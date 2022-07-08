<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Issues;
use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showCount()
    {
          $pages = Category::latest()->paginate(3);
          $categories = Category::All(); 
          $issues = Issues::All(); 
          $submissions = Submission::All(); 
        return view('dashboard', compact('categories', 'issues', 'submissions', 'pages'));
    }
}
