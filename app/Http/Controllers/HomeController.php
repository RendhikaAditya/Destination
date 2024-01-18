<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

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

    public function viewDestination($id)
    {
        $id = decrypt($id);
        $destination = Destination::findOrFail($id);
        $name = $destination->name;
        // echo '<pre>';
        // print_r($destination->name);
        // echo '</pre>';
        // die();

        $data = [
            'title' => $name,
            'destination' => $destination
        ];
        return view('destination.view', $data);

        // return view('destination.view', compact('destination'));
    }
}
