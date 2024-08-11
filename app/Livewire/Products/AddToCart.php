<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCart extends Component
{
    public $product;

    public $qty = 1;

    public function add_to_cart()
    {
        Cart::instance('shopping');
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'options' => [
                'image' => $this->product->image,
                'slug' => $this->product->slug,
                'featured' => []
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
        return view('livewire.products.add-to-cart');
    }
}
