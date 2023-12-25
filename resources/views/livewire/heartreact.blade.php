<?php

use Livewire\Volt\Component;
use App\Models\Note;


new class extends Component {
    public Note $note;
    public int $heartCount;

    public function mount(Note $note): void {
        $this->note = $note;
        $this->heartCount = $note->heart_counter;
    }

    public function increaseHeartCount(): void {
        $this->note->heart_counter++;
        $this->note->save();
        $this->heartCount = $this->note->heart_counter;
    }
}; ?>

<div>
    <x-button xs wire:click="" rose icon="heart" spinner>{{$heartCount}}</x-button>

</div>
