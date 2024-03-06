<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Idea $idea) {
        $validated = $request->validated;

        $validated['user_id'] = auth()->id();
        $validated['idea_id'] = $idea->id;

        Comment::create($validated);

        // $comment = new Comment();
        // $comment->idea_id = $idea->id;
        // $comment->user_id = auth()->id();
        // $comment->content = request('content');
        // $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success','Comment posted successfully!');
    }
}
