<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function with(): array {
        return [
            'notes' => Auth::user()
                ->notes()
                ->orderBy('send_date', 'asc')
                ->get(),
        ];
    }

    public function delete($noteId) {
        $note = Note::where('id', $noteId)->first();
        $this->authorize('delete', $note);
        $note->delete();
    }
};
?>

<div>
    <x-button primary icon-right="plus" class="mb-12" href="{{ route('notes.create') }}" wire:navigate>
        Create note
    </x-button>
    <div class="space-y-2">
        @if($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font-bold">No notes yet</p>
                <p class="text-sm">Let's create your first note to send</p>
            </div>
        @else
            <div class="grid grid-cols-2 gap-4">
                @foreach($notes as $note)
                    <x-card wire:key='{{$note->id}}'>
                        <div class="flex justify-between">
                            <div>
                                @can('update', $note)
                                    <a href="{{route('notes.edit', $note)}}"
                                       class="text-xl font-bold hover:underline hover:text-blue-500">
                                        {{$note->title}}
                                    </a>
                                @else
                                    <p class="text-xl font-bold text-gray-500">{{$note->title}}</p>
                                @endcan
                                <p class="text-xs">{{Str::limit($note->body, 50)}}</p>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($note->send_date)->format('M-d-Y') }}
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-xs">Recipient: <span class="font-semibold">{{$note->recipient}}</span></p>
                            <div>
                                <x-button.circle href="{{route('notes.view', $note)}}" icon="eye"></x-button.circle>
                                <x-button.circle icon="trash" wire:click="delete('{{$note->id}}')"></x-button.circle>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
</div>
