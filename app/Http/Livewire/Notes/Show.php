<?php

namespace App\Http\Livewire\Notes;

use Illuminate\Session\SessionManager;
use Livewire\Component;
use App\Models\Note;

class Show extends Component
{
    public $body;

    protected function rules() {
        return [
            'body' => 'required'
        ];
    }

    public function mount(SessionManager $session)
    {
        //$session->put("post.{$post->id}.last_viewed", now());
    }


    public function pin(Note $note)
    {
        $note->pin();
        return redirect()->to('/');
    }

    public function restore($noteId) 
    {
        $note = Note::withTrashed()->find($noteId);
        $note->restore();
        return redirect()->to('/');
    }

    public function delete(Note $note)
    {
        $note->delete();
        return redirect()->to('/');
    }

    public function submit() 
    {
        $this->validate();
        Note::create(['body' => $this->body]);
        return redirect()->to('/');
    }

    public function render()
    {
        $savedNotes = Note::orderBy('pinned_flag', 'desc')
            ->orderBy('id')
            ->get();
        $deletedNotes = Note::withTrashed()
            ->whereNotNull('deleted_at')
            ->get();
        return view('livewire.notes.show', compact('savedNotes','deletedNotes'))
            ->slot('content');
    }
}
