<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\City;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();

        $data = [
            'title' => 'SIO WISATA',
            'destinations' => $destinations
        ];
        return view('public', $data);
    }

    public function index2()
    {
        $cities = City::all();

        $data = [
            'title' => 'SIO WISATA',
            'cities' => $cities
        ];
        return view('lokasi', $data);
    }

    // method menampilkan detail data objek wisata
    /**
     * show
     * 
     * @param mixed $id
     * @return void
     */
    public function show($id)
    {
        //get data by ID
        $destinations = Destination::findOrFail($id);
        $categories = Category::all();

        $embed_map = $destinations->embed_map;
        $data = [
            'title' => 'SIO WISATA',
            'destinations' => $destinations,
            'categories' => $categories,
            'embed_map' => $embed_map
        ];

        return view('detail.showDestination', $data);
    }

    // method menampilkan detail lokasi data objek wisata
    /**
     * show
     * 
     * @param mixed $id
     * @return void
     */
    public function show1($id)
    {
        //get data by ID
        $city = City::findOrFail($id);
        $destinations = Destination::whereCity_id($id)->first();

        // $destinations = Destination::all();

        // $destinations = DB::table('destinations')
        //     ->join('pictures', 'id', '=', 'pictures.destination_id')
        //     ->join('cities', 'city_id', '=', 'cities.id')
        //     ->join('categories', 'category_id', '=', 'categories.id')
        //     ->select('destinations.*')
        //     ->whereColumn('city_id', '=', $id)
        //     ->get();

        $data = [
            'title' => 'SIO WISATA',
            'destinations' => $destinations,
            'city' => $city
        ];

        return view('detail.showLocation', $data);
    }
}
