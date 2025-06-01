<?php



namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ForSaleProfile extends Component
{
    public Sale $property;

    // Carousel
    public int $currentImageIndex = 0;

    // Tabs: 'details' or 'contact'
    public string $activeTab = 'details';

    // Contact form fields
    public $name = '';
    public $email = '';
    public $message = '';
    public $formSubmitted = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function mount(Sale $property)
    {
        $this->property = $property;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitContact()
    {
        $validated = $this->validate();

        
        $this->formSubmitted = true;

       
        $this->reset(['name', 'email', 'message']);
    }

    public function nextImage()
    {
        $imageCount = count(explode(',', $this->property->images));
        $this->currentImageIndex = ($this->currentImageIndex + 1) % $imageCount;
    }

    public function prevImage()
    {
        $imageCount = count(explode(',', $this->property->images));
        $this->currentImageIndex = ($this->currentImageIndex - 1 + $imageCount) % $imageCount;
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.for-sale-profile')
            ->layout('layouts.livewire');
    }
}

