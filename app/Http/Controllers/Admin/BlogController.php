<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    protected $redirectTo = 'admin/blogs';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs = Blog::all();

        return view('admin.blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog;

        return view('admin.blogs.add', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'required'
        ]);

        $blog = Blog::create($request->all());

        if ($request->hasFile('blog_img') && $request->file('blog_img')->isValid()) {
            $fileName = $blog->id . '.jpg'; // renaming image

            Storage::disk('public')->put(
                'blogs/'. $fileName,
                file_get_contents($request->file('blog_img')->getRealPath())
            );
        }

        return redirect()->to($this->redirectTo);
    }

    /**
     * Display the specified resource.
     *
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return redirect()->route('admin.blogs.edit', ['id' => $blog->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'required'
        ]);

        $blog->update($request->all());

        if ($request->hasFile('blog_img') && $request->file('blog_img')->isValid()) {
            $fileName = $blog->id . '.jpg'; // renaming image

            Storage::disk('public')->put(
                'blogs/'. $fileName,
                file_get_contents($request->file('blog_img')->getRealPath())
            );
        }

        return back()->with('notice', 'Information was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->delete()) {
            Storage::disk('public')->delete("blogs/{$blog->id}.jpg");
        }

        return redirect()->to($this->redirectTo);
    }
}
