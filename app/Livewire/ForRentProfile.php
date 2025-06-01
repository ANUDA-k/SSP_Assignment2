<?php

namespace App\Livewire;

use App\Models\Rent;
use Livewire\Component;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ForRentProfile extends Component
{
    public Rent $property;

    public array $images = [];
    public int $currentImageIndex = 0;
    public string $activeTab = 'details';

    public $name = '';
    public $email = '';
    public $message = '';
    public $formSubmitted = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    /**
     * Mount property by ID with error handling.
     */
    

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitContact()
    {
        $this->validate();

        // Here, in a real app, you might send an email or store the message in the DB.
        $this->formSubmitted = true;

        $this->reset(['name', 'email', 'message']);
    }

    public function nextImage()
    {
        $count = count($this->images);
        $this->currentImageIndex = ($this->currentImageIndex + 1) % $count;
    }

    public function prevImage()
    {
        $count = count($this->images);
        $this->currentImageIndex = ($this->currentImageIndex - 1 + $count) % $count;
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.for-rent-profile')
            ->layout('layouts.livewire');
    }
}
