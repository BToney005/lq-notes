<?php

use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // true: deleted, false: not deleted
        $notes = [
            "This is a test note." => true,
            "It was his hat Mr. Krabs, he was number one!" => false,
            "Oh, these aren't pies, they're bombs. They were made in a bomb factory." => false,
            "The best time to wear a striped sweater, is all the time." => false,
            "I'd normally use faker for this." => true,
            "I think I'll eat it now." => false,
            "I need, I need, a tailor. Because I ripped my pants" => false,
            "Gonna write an essay, that's what I say" => false,
            "I should really watch SpongeBob right now" => true,
            "Is mayonnaise an instrument?" => false
        ];

        foreach ($notes as $body => $delete_flag) {
            $note = Note::create(['body' => $body]);
            if ($delete_flag)
                $note->delete();
        }
    }
}
