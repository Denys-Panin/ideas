<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        // return view('ideas.show', [
        //     'idea' => $idea
        // ]);
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = True;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea UPDATE successfuly!');
    }

    public function store()
    {
        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        $idea = Idea::create(
            [
                'content' => request()->get('content', ''),
            ]
        );
        return redirect()->route('homepage')->with('success', 'Idea CREATED!');
        // $idea = new Idea([
        //     'content' => request()->get('idea', ''),
        // ]);
        // $idea->save();
    }

    // public function destroy($id)
    // {
    //     $idea = Idea::where('id', $id)->firstOrFail()->delete();
    //     return redirect()->route('homepage')->with('delete', 'Idea DELETED!');
    // }
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('homepage')->with('delete', 'Idea DELETED!');
    }
}
