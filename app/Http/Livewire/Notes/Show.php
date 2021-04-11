<?php

namespace App\Http\Livewire\Notes;

use Illuminate\Session\SessionManager;
use Livewire\Component;
use App\Models\Note;

class Show extends Component
{
    public $newNote;
    public $savedNotes;
    public $deletedNotes;

    public function mount(SessionManager $session)
    {
        //$session->put("post.{$post->id}.last_viewed", now());

        $this->newNote = new Note();
        $this->savedNotes = Note::all();
        $this->deletedNotes = Note::withTrashed()->whereNotNull('deleted_at')->get();
    }

    public function render()
    {
        return view('livewire.notes.show')
            ->slot('content');
    }
}
