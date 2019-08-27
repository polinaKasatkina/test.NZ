<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{

    /**
     * Return all blogs collection
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return response()->json(compact('blogs'));

    }

    /**
     * Display the specified blog.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        return view('blog', compact('blog'));
    }


    /**
     * Search blogs by title
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function searchByTitle(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        if ($data['search']) {
            $blogs = Blog::where('title', 'like', "%" . filter_var($data['search'], FILTER_SANITIZE_STRING) . "%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $blogs = Blog::orderBy('created_at', 'desc')->get();
        }

        return response()->json(compact('blogs'));
    }


    /**
     * Order blogs by date creation
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function orderByDate(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $blogs = Blog::orderBy('created_at', $data['order'])->get();

        return response()->json(compact('blogs'));
    }

}
