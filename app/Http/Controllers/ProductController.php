<?php

namespace CrudDev\Http\Controllers;

use CrudDev\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function load()
    {
          //$product = DB::select("SELECT c.id, c.name, c.url, c.category_id , s.name FROM product c INNER JOIN category s ON c.category_id  = s.id");

        $product = Product::all();

     //   var_dump($product);
        return view('product.index')->with('product', $product);

    }

//    public function teste($id)
//    {
//
//        $product = Product::find($id);
//        $tes = $product->testes()->get();
//
//        if($tes){
//            var_dump(tes);
//        }
//    }

    public function show($url)
    {
        $product = Product::where('url', $url)->get();
        if (!empty($product)) {
            return view('product.show')->with('product', $product);
        } else {
            return redirect()->action('ProductController@list');
        }
    }

    public function create()
    {

        return view('product.create');

    }

    public function store(Request $request)
    {
        $productSlug = $this->urlName($request->name);
        $product = [
            'name' => $request->name,
            'url' => $productSlug
        ];
        Product::create($product);

        return redirect()->action('ProductController@load');
    }

    public function edit($url)
    {
        $product = Product::where('url', $url)->get();
        if (!empty($product)) {
            return view('product.edit')->with('product', $product);
        } else {
            return redirect()->action('ProductController@load');
        }
    }

    public function update(Request $request, $id)
    {
        $productSlug = $this->urlName($request->name);
        $product = Product::find($id);
        $product->name = $request-> name;
        $product->url = $productSlug;

        $product->save();

        return redirect()->action('ProductController@load');

    }

    public function destroy($url)
    {

        $product = Product::where('url', $url)->get();
        if (!empty($product)) {
            DB::delete("DELETE FROM product WHERE url = ?", [$url]);
        }
        return redirect()->action('ProductController@load');

    }

    public function urlName($name)
    {
        $productSlug = str_slug($name);

        $product = Product::all();

        $t = 0;
        foreach ($product as $categ) {
            if (str_slug($categ->url) === $productSlug) {
                $t++;
            }
        }

        if ($t > 0) {
            $productSlug = $productSlug . '-' . $t;
        }

        return $productSlug;
    }
}
