<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Sale;
use App\Models\Rent;

class PostAd extends Component
{
    use WithFileUploads;

    public $topic, $rooms, $bathrooms, $price, $description, $contact, $email, $property_type, $ad_type;
    public $images = [];

    protected $rules = [
        'topic' => 'required|string',
        'rooms' => 'required|numeric',
        'bathrooms' => 'required|numeric',
        'price' => 'required|string',
        'description' => 'required|string',
        'contact' => 'required|string',
        'email' => 'required|email',
        'property_type' => 'required|string',
        'ad_type' => 'required|in:sale,rent',
        'images.*' => 'image|max:2048', // Each image max 2MB
    ];

    /**
     * Live validation when fields update
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Handle ad submission
     */
    public function submit()
    {
        $this->validate();

        $paths = [];
        foreach ($this->images as $image) {
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('img', $filename, 'public');
            $paths[] = 'img/' . $filename;
        }

        $data = [
            'topic' => $this->topic,
            'rooms' => $this->rooms,
            'bathrooms' => $this->bathrooms,
            'price' => $this->price,
            'description' => $this->description,
            'contact' => $this->contact,
            'email' => $this->email,
            'property_type' => $this->property_type,
            'images' => implode(',', $paths),
        ];

        if ($this->ad_type === 'sale') {
            Sale::create($data);
            $this->dispatch('adPosted');
        } elseif ($this->ad_type === 'rent') {
            Rent::create($data);
            $this->dispatch('rentAdPosted');
        }

        $this->reset();
        session()->flash('message', 'Ad posted successfully!');
    }

    /**
     * Render the Livewire view
     */
    public function render()
    {
        return view('livewire.post-ad');
    }
}
