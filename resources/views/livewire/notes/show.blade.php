<div>
    <div class="grid grid-cols-2 xs:grid-cols-1">
        <div class="max-w py-4 px-8 bg-white shadow-lg rounded-lg mx-1 my-2">
            <div class="font-bold">New Note</div>
            <textarea class="border border-gray-100 rounded w-full p-1 mt-2" name="body" placeholder="Type a new note..." rows="8"></textarea>
            <div class="flex flex-row justify-between mt-2">
                <div class="text-red-500">Errors go here.</div>
                <button class="rounded bg-blue-200 py-1 px-2">Save</button>
            </div>
        </div>
        <div class="max-w py-4 px-8 bg-white shadow-lg rounded-lg mx-1 my-2">
            @foreach($savedNotes as $note)
                <div class="rounded border border-gray-200 px-2 pt-2 pb-10 my-4 relative">
                    <button class="rounded-full bg-blue-200 p-1 absolute -right-3 -top-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                    </button>
                        {{ $note->body }}
                    <button class="absolute bottom-1 right-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="grid grid-cols-2 xs:grid-cols-1">
        <div class="col-start-2 max-w py-4 rounded mx-1 my-2 flex justify-end relative">
            @foreach($deletedNotes as $index => $note)
                <div class="w-48 bg-white rounded border border-gray-200 p-2 relative z-{{(5 - $index) * 10}} left-{{($deletedNotes->count() - $index - 1) * 16}}">
                    <button class="rounded-full bg-blue-200 p-1 absolute -right-3 -top-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    {{ $note->body }}
                </div>
            @endforeach
        </div>
    </div>
</div>