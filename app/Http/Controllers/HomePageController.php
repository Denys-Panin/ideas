<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        return view('home_page', [
            'ideas' => Idea::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function createIdea()
    {
        $ideas = new Idea([
            'content' => 'Today is so cool day',
            'likes' => 111321112
        ]);
        $ideas->save();
        return redirect('/');
    }
}
