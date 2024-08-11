<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Navigation extends Component
{
    public $families;
    public $family_id;
    public function mount()
    {
        $this->families = \App\Models\Family::all();
        $this->family_id = $this->families->first()->id;
    }

    #[Computed()]
    public function categories()
    {
        return \App\Models\Category::where('family_id', $this->family_id)
        ->with('subcategories')
        ->get();
    }

    #[Computed()]
    public function familyName()
    {
        return \App\Models\Family::find($this->family_id)->name;
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
