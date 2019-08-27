<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

        $blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.index', compact('blogs', 'users'));

    }

}
