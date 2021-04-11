<div class="h-screen xs:h-auto">
    <div class="grid grid-cols-2 xs:grid-cols-1 h-4/5">
        <div class="max-w py-4 px-8 bg-white shadow-lg rounded-lg mx-1 my-2 h-full xs:h-auto">
            <form wire:submit.prevent="submit">
                <div class="font-bold">New Note</div>
                <textarea class="border border-gray-100 rounded w-full p-1 mt-2" wire:model="body" placeholder="Type a new note..." rows="8"></textarea>
                <div class="flex flex-row justify-between mt-2">
                    <div class="text-red-500">    
                        @error('body') <span class="error">Note cannot be empty.</span> @enderror
                    </div>
                    <button class="rounded bg-blue-200 py-1 px-2" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div class="max-w py-4 px-8 bg-white shadow-lg rounded-lg mx-1 my-2 overflow-y-scroll h-full xs:h-auto">
            @foreach($savedNotes as $note)
                <div class="rounded border border-gray-200 px-2 pt-2 pb-10 my-4 relative">
                    <button wire:click="pin({{ $note->id }})" class="rounded-full {{ $note->pinned_flag ? 'bg-blue-200' : 'bg-white'}} p-1 absolute -right-3 -top-3">
                        <x-feathericon-paperclip/>
                    </button>
                        {{ $note->body }}
                    <button wire:click="delete({{ $note->id }})" class="absolute bottom-1 right-1">
                        <i data-feather="trash-2"></i>
                        <x-feathericon-trash-2/>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="grid grid-cols-1">
        <div class="max-w py-4 rounded mx-1 my-2 flex justify-end relative">
            @foreach($deletedNotes as $index => $note)
                <div class="w-48 bg-white rounded border border-gray-200 p-2 relative z-{{($deletedNotes->count() - $index)}} left-{{($deletedNotes->count() - $index - 1) * 16}}">
                    <button wire:click="restore({{ $note->id }})" class="rounded-full bg-blue-200 p-1 absolute -right-3 -top-3">
                        <x-feathericon-corner-right-up/>
                    </button>
                    {{ $note->body }}
                </div>
            @endforeach
        </div>
    </div>
</div>