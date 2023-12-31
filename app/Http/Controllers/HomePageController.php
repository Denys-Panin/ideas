<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        return view('home_page', [
            'ideas' => Idea::orderBy('created_at', 'DESC')->paginate(5)
        ]);
    }
}
