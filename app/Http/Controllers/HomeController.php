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

    public function lokasi()
    {
        $cities = City::all();

        $data = [
            'title' => 'SIO WISATA',
            'cities' => $cities
        ];
        return view('lokasi', $data);
    }

    public function showdestinasi($id)
    {
        $id = decrypt($id);
        $destinations = Destination::with(['destination_facilities.facility', 'pictures'])->findOrFail($id);
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

    public function showlokasi($id)
    {
        $id = decrypt($id);
        $city = City::findOrFail($id);
        $destinations = Destination::where('city_id', $id)->get();
        $data = [
            'title'        => 'SIO WISATA',
            'destinations' => $destinations,
            'city'         => $city
        ];

        return view('detail.showLocation', $data);
    }
}
