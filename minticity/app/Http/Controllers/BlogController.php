<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = uniqid() . '-' . slugify($request->post('caption')) . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $image);
        $request->merge(['img' => $image]);

        Blog::create($request->post());
        return redirect()->route('blog.create')->withSuccess('Blog başarıyla eklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $category = Category::find($blog->category_id);
        return view('pages.blog.show', compact(['blog', 'category']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('pages/blog/edit', compact('blog'));
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
        if ($request->hasFile('img')) {
            $image = uniqid() . '-' . slugify($request->post('caption')) . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $image);
            $request->merge(['img' => $image]);
        }

        Blog::where('id', $id)
            ->update($request->except('_method', '_token'));
        return redirect()->route('blog.index')->withSuccess('Başarıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != null && is_numeric($id)) {
            $category = Category::find($id) ?? abort(404, 'Bulunamadı');
            $category->delete();
            return redirect()->route('category.index')->withSuccess('Başarıyla silindi');
        }
        return false;
    }
}
