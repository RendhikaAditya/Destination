<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\City;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function index()
    {
        if (Auth::guard('visitor')->check()) {
            $username = Auth::guard('visitor')->user()->name;
            $destinations = Destination::all();
            $cities = City::all();
            $data = [
                'title' => 'SIO WISATA',
                'destinations' => $destinations,
                'username' => $username,
                'cities' => $cities
            ];

            return view('publicvisitor', $data);
        } else {
            return redirect('/');
        }
    }

    public function showdestinasi($id)
    {
        $username = Auth::guard('visitor')->user()->name;

        $id = decrypt($id);
        $destinations = Destination::with(['destination_facilities.facility', 'pictures'])->findOrFail($id);
        $categories = Category::all();

        $embed_map = $destinations->embed_map;
        $data = [
            'title' => 'SIO WISATA',
            'destinations' => $destinations,
            'categories' => $categories,
            'embed_map' => $embed_map,
            'username' => $username
        ];

        return view('visitor.showDestination', $data);
    }
}
