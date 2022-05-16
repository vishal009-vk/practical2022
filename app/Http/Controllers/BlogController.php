<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFormRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('user_id',Auth::id())->paginate(10);

        return view('blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogFormRequest $request)
    {
        $path = '';

        if($request->hasFile('image')){
            $path = request()->file('image')->store('blog_image');
        }


        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->start_date = $request->start_date;
        $blog->end_date = $request->end_date;
        $blog->image = $path;
        $blog->is_active = $request->is_active;
        $blog->save();

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogFormRequest $request, $id)
    {

        $blog = Blog::findOrFail($id);

        $path = $blog->image;

        if($request->hasFile('image')){
            $path = request()->file('image')->store('blog_image');
        }

        $blog->title = $request->title;
        $blog->user_id = Auth::user()->id;
        $blog->description = $request->description;
        $blog->start_date = $request->start_date;
        $blog->end_date = $request->end_date;
        $blog->image = $path;
        $blog->is_active = $request->is_active;
        $blog->save();

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect(route('blog.index'));

    }

    public function myBlog(){
        $user_id = Auth::user()->id;

        $blog = Blog::where('user_id',$user_id)->get();
        return view('blog.my_blog',compact('blog'));
    }
}
