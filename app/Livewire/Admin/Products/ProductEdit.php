<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Family;
use Livewire\Attributes\Computed;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $product;
    public $productEdit;
    public $families;
    public $family_id = '';
    public $category_id = '';
    public $image;
    


    public function mount($product)
    {
        $this-> productEdit = $product->only('sku','name','description','image_path','price','subcategory_id','stock');
        $this->families = Family::all();
        $this->category_id = $product->subcategory->category->id;
        $this->family_id = $product->subcategory->category->family->id;

    }

    public function boot()
    {
        $this->withValidator(function ($validator) {
            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => 'Oops...',
                    'text' => 'Formulario tiene errores'
                ]);
            }
        });
    }


    public function updatedFamilyId()
    {
        $this->category_id = '';
        $this->productEdit['subcategory_id'] = '';
    }


    public function updatedcategoryId()
    {
        $this->productEdit['subcategory_id'] = '';
    }

    #[On('variant_generated')]
    public function updateProduct()
    {
        $this->product = $this->product->fresh();
    }


    #[Computed]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)->get();
    }

    #[Computed]
    public function subcategories()
    {
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    public function store()
    {
        //dd('product');
        $this->validate([
            'image' => 'nullable|image|max:1024',
            'productEdit.sku' => 'required|unique:products,sku,' .$this->product->id,
            'productEdit.name' => 'required|max:255',
            'productEdit.description' => 'nullable',
            'productEdit.price' => 'required|numeric|min:0',
            'productEdit.stock' => 'required|numeric|min:0',
            'productEdit.subcategory_id' => 'required|exists:subcategories,id'
        ]);

        if ($this->image) {
            Storage::delete($this->productEdit['image_path']);
            $this->productEdit['image_path'] = $this->image->store('products');
        }

        

        $this->product->update($this->productEdit);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '!Bien hecho!',
            'text' => 'Producto editado exitosamente'

        ]);

        return redirect()->route('admin.products.edit',$this->product);
    }

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
