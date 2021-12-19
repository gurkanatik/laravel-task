<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('pages/category/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        Category::create($request->post());
        return redirect()->route('category.create')->withSuccess('Kategori başarıyla eklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs = Blog::orderBy('id', 'DESC')->where('category_id', $id)->get();
        $category = Category::find($id);

        return view('pages.category.show', compact(['blogs', 'category']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages/category/edit', compact('category'));
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
        $this->validation($request);

        Category::where('id', $id)
            ->update($request->except('_method', '_token'));
        return redirect()->route('category.index')->withSuccess('Başarıyla güncellendi!');
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

    private function validation($request)
    {
        return  $validated = $request->validate(
            [
                'caption' => 'required|max:255',
            ]
        );
    }
}
