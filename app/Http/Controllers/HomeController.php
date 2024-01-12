<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        // echo '<pre>';
        // print_r($destinations);
        // echo '</pre>';
        // die();
        $data = [
            'title' => 'SIO WISATA',
            'destinations' => $destinations
        ];
        return view('public', $data);
    }
}
