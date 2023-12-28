<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function createIdea()
    {
        request()->validate([
            'idea' => 'required|min:3|max:240'
        ]);

        $ideas = new Idea([
            'content' => request()->get('idea', ''),
            'likes' => 999
        ]);
        $ideas->save();
        return redirect()->route('home_page')->with('succes', 'Idea created Successfully!');
    }
}
