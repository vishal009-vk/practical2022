<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $today = now()->format('Y-m-d');
        $blog = Blog::where('end_date','>',$today)->paginate(10);
        return view('welcome',compact('blog'));
    }

}
