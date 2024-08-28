<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $validate = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        $comment->content = request()->get('content');
        $comment->save();
        return redirect()->route('ideas.show', $idea->id)->with('success', "Comment POSTED successfully");
    }
}
