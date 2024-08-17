<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate([
            'idea-content' => 'required|min:5|max:240'
        ]);
        $idea = Idea::create(
            [
                'content' => request()->get('idea-content', ''),
            ]
        );
        return redirect()->route('homepage')->with('success', 'Idea CREATED!');
        // $idea = new Idea([
        //     'content' => request()->get('idea', ''),
        // ]);
        // $idea->save();
    }

    public function destroy($id)
    {
        $idea = Idea::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('homepage')->with('delete', 'Idea DELETED!');
    }
}
