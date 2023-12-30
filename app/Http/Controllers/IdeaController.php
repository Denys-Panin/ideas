<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        return view('idea.show_idea', [
            'idea' => $idea
        ]);
    }

    public function store()
    {
        request()->validate([
            'idea' => 'required|min:3|max:240'
        ]);

        $ideas = new Idea([
            'content' => request()->get('idea', ''),
            'likes' => 999
        ]);
        $ideas->save();
        return redirect()->route('home_page.index')->with('succes', 'Idea created Successfully!');
    }

    // public function destroy($id)
    // {
    //     $idea = Idea::where('id', $id)->firstOrFail();
    //     $idea->delete();
    //     return redirect()->route('home_page.index')->with('succes', 'Idea ' . $idea->id . ' deleted Successfully!');
    // }
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('home_page.index')->with('succes', 'Idea ' . $idea->id . ' deleted Sucessfully!');
    }
}
