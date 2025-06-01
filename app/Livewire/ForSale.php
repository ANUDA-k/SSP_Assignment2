<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;

class ForSale extends Component
{
    protected $listeners = ['propertyAdded' => '$refresh'];

    public function render()
    {
        $properties = Sale::latest()->get();
        return view('livewire.for-sale', compact('properties'));
    }
}
