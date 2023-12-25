<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with() {
        return [
            'notesSentCount' => Auth::user()
                ->notes()
                ->where('send_date', '<', now())
                ->where('is_published', true)
                ->count(),

            'notesLovedCount' => Auth::user()->notes->sum('heart_counter')
        ];
    }
}; ?>

<div>
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-2">
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <div class="flex items-center">
                <div>
                    <p class="text-lg font-medium leading-6 text-gray-900">Notes Sent</p>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-3xl font-bold leading-9 text-gray-900">{{$notesSentCount}}</p>
            </div>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <div class="flex items-center">
                <div>
                    <p class="text-lg font-medium leading-6 text-gray-900">Notes Loved</p>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-3xl font-bold leading-9 text-gray-900">{{$notesLovedCount}}</p>
            </div>
        </div>
    </div>
</div>
