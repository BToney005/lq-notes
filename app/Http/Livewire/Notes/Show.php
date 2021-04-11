<?php

namespace App\Http\Livewire\Notes;

use Illuminate\Session\SessionManager;
use Livewire\Component;
use App\Models\Note;

class Show extends Component
{
    public $body;
    public $savedNotes;
    public $deletedNotes;

    protected function rules() {
        return [
            'body' => 'required'
        ];
    }

    public function mount(SessionManager $session)
    {
        //$session->put("post.{$post->id}.last_viewed", now());
        $this->savedNotes = Note::orderBy('pinned_flag', 'desc')
            ->orderBy('id')
            ->get();
        $this->deletedNotes = Note::withTrashed()
            ->whereNotNull('deleted_at')
            ->get();
    }


    public function submit() 
    {
        $this->validate();
        Note::create(['body' => $this->body]);
    }

    public function render()
    {
        return view('livewire.notes.show')
            ->slot('content');
    }
}
