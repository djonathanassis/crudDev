<?php

namespace CrudDev\Http\Controllers;

use CrudDev\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function list()
    {
        //  $properties = DB::select("SELECT * FROM property");
        $properties = Property::all();
        return view('property.index')->with('properties', $properties);
    }

    public function show($name)
    {
        // $property = DB::select("SELECT * FROM property WHERE name = ?", [$name]);
        $property = Property::where('name', $name)->get();
        if (!empty($property)) {
            return view('property.show')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@list');
        }
    }

    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
        $propertySlug = $this->setName($request->title);
//        $property = [
//            $request->title,
//            $propertySlug,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price
//        ];
//
//        DB::insert("INSERT INTO property (title, name, description, rental_price, sale_price) VALUE
//                            (?, ?, ?, ?, ?)", $property);
        $property = [
            'title' => $request->title,
            'name' => $propertySlug,
            'description' => $request->description,
            'rental_price' => $request->rental_price,
            'sale_price' => $request->sale_price
        ];

        Property::create($property);

        return redirect()->action('PropertyController@list');
    }

    public function edit($name)
    {
        // $property = DB::select("SELECT * FROM property WHERE name = ?", [$name]);
        $property = Property::where('name', $name)->get();
        if (!empty($property)) {
            return view('property.edit')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@list');
        }
    }

    public function update(Request $request, $id)
    {
        $propertySlug = $this->setName($request->title);
//        $property = [
//            $request->title,
//            $propertySlug,
//            $request->description,
//            $request->rental_price,
//            $request->sale_price,
//            $id
//        ];
//
//        DB::update("UPDATE property SET title = ?, name = ?, description = ?, rental_price = ?, sale_price = ? WHERE id = ?", $property);

        $property = Property::find($id);
        $property->title = $request-> title;
        $property->name = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price =$request->sale_price;

        $property->save();

        return redirect()->action('PropertyController@list');
    }

    public function destroy($name)
    {
        // $property = DB::select("SELECT * FROM property WHERE name = ?", [$name]);
        $property = Property::where('name', $name)->get();
        if (!empty($property)) {
            DB::delete("DELETE FROM property WHERE name = ?", [$name]);
        }
        return redirect()->action('PropertyController@list');
    }

    public function setName($title)
    {
        $propertySlug = str_slug($title);

        // $properties = DB::select('SELECT * FROM property');
        $properties = Property::all();

        $t = 0;
        foreach ($properties as $property) {
            if (str_slug($property->title) === $propertySlug) {
                $t++;
            }
        }

        if ($t > 0) {
            $propertySlug = $propertySlug . '-' . $t;
        }

        return $propertySlug;
    }
}
