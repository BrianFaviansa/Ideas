<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }
    public function store(CreateIdeaRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Idea created successfully !');
    }
    public function destroy(Idea $idea)
    {
        // if(auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        $this->authorize('destroy', $idea);

        $idea->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Idea deleted successfully !');
    }
    public function edit(Idea $idea)
    {
        // if(auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        $this->authorize('update', $idea);

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        // if(auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        $this->authorize('update', $idea);


        $validated = $request->vallidated();

        $idea->update($validated);

        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('success', 'Idea updated successfully');
    }
}
