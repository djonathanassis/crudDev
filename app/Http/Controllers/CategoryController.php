<?php

namespace CrudDev\Http\Controllers;

use CrudDev\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function load()
    {
        $category = Category::all();
        return view('category.index')->with('category', $category);
    }

    public function show($url)
    {
        $category = Category::where('url', $url)->get();
        if (!empty($category)) {
            return view('property.show')->with('category', $category);
        } else {
            return redirect()->action('PropertyController@load');
        }
    }

    public function create()
    {

        return view('category.create');

    }

    public function store(Request $request)
    {
        $categorySlug = $this->urlName($request->name);
        $category = [
            'name' => $request->name,
            'url' => $categorySlug
        ];
        Category::create($category);

        return redirect()->action('CategoryController@load');
    }

    public function edit($url)
    {
        $category = Category::where('url', $url)->get();
        if (!empty($category)) {
            return view('category.edit')->with('category', $category);
        } else {
            return redirect()->action('CategoryController@load');
        }
    }

    public function update(Request $request, $id)
    {
        $categorySlug = $this->urlName($request->name);
        $category = Category::find($id);
        $category->name = $request-> name;
        $category->url = $categorySlug;


        $category->save();

        return redirect()->action('CategoryController@load');

    }

    public function destroy($url)
    {

        $category = Category::where('url', $url)->get();
        if (!empty($category)) {
            DB::delete("DELETE FROM category WHERE url = ?", [$url]);
        }
        return redirect()->action('CategoryController@load');

    }

    public function urlName($name)
    {
        $categorySlug = str_slug($name);

        $category = Category::all();

        $t = 0;
        foreach ($category as $categ) {
            if (str_slug($categ->url) === $categorySlug) {
                $t++;
            }
        }

        if ($t > 0) {
            $categorySlug = $categorySlug . '-' . $t;
        }

        return $categorySlug;
    }
}
