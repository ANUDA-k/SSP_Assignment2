<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rent;
use Livewire\WithPagination;

class ForRentList extends Component
{
    use WithPagination;

    protected $listeners = ['rentAdPosted' => '$refresh'];

    public function render()
    {
        return view('livewire.for-rent-list', [
            'properties' => Rent::latest()->paginate(6),
        ]);
    }
}
