<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Option;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Filter extends Component
{
    use WithPagination;

    public $family_id;
    public $category_id;
    public $subcategory_id;

    public $options;
    public $selected_features = [];
    public $orderBy = 1;
    public $search;

    public function mount()
    {
        $this->options = Option::VerifyFamily($this->family_id)
            ->VerifyCategory($this->category_id)
            ->VerifySubcategory($this->subcategory_id)
            ->get()
            ->toArray();
    }
    #[On('search')]
    public function search($search)
    {
        dd($search);
        $this->search = $search;
    }

    public function render()
    {
        $products = Product::VerifyFamily($this->family_id)
            ->VerifyCategory($this->category_id)
            ->VerifySubcategory($this->subcategory_id)
            ->customOrder($this->orderBy)
            ->VerifySelectFeatures($this->selected_features)

            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%');
            })

            ->paginate(12);

        return view('livewire.filter', compact('products'));
    }
}
