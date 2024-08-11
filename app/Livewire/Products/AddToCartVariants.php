<?php

namespace App\Livewire\Products;

use App\Models\Feature;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCartVariants extends Component
{
    public $product;
    public $qty = 1;
    public $selectedFeatures = [];

    public function mount()
    {
        foreach ($this->product->options as $option) {
            $features = collect($option->pivot->features);
            $this->selectedFeatures[$option->id] = $features->first()['id'];
        }
    }

    #[Computed]
    public function variant()
    {
        return $this->product->variants->filter(function ($variant) {
            return !array_diff($variant->features->pluck('id')->toArray(), $this->selectedFeatures);
        })->first();
    }

    public function add_to_cart()
    {
        Cart::instance('shopping');
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'options' => [
                'image' => $this->variant->image,
                'slug' => $this->variant->slug,
                'featured' => Feature::whereIn('id', $this->selectedFeatures)->pluck('description', 'id')->toArray()
            ]
        ]);

        if(auth()->check()){
            Cart::store(auth()->id());
        }
        $this->dispatch('cartUpdated', Cart::count());

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '!Bien hecho!',
            'text' => 'Se agregó al carrito',

        ]);
    }
    public function render()
    {
        return view('livewire.products.add-to-cart-variants');
    }
}
