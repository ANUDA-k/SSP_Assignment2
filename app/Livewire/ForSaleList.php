<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sale;
use Livewire\WithPagination;

class ForSaleList extends Component
{
    use WithPagination;

    protected $listeners = ['adPosted' => '$refresh'];

    
    public function render()
    {
        return view('livewire.for-sale-list', [
            'properties' => Sale::latest()->paginate(6),
        ]);
    }
}