<?php

namespace App\Livewire\Admin\Subcategories;

use Livewire\Component;
use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;

class SubcategoryEdit extends Component
{
    public $subcategory;

    public $families;

    public $subcategoryEdit;

    public function mount($subcategory)
    {
        $this->families = Family::all();
        $this->subcategoryEdit = [
            'family_id' => $subcategory->category->family_id,
            'category_id' => $subcategory->category_id,
            'name' => $subcategory->name
        ];
    }

    public function updatedSubcategoryEditFamilyId()
    {
        //dd('here');
        $this->subcategoryEdit['category_id'] = '';
    }


    #[Computed]
    public function categories()
    {
        return Category::where('family_id', $this->subcategoryEdit['family_id'])->get();
    }


    public function save()
    {

        $this->validate([
            'subcategoryEdit.family_id' => 'required|exists:families,id',
            'subcategoryEdit.category_id' => 'required|exists:categories,id',
            'subcategoryEdit.name' => 'required'
        ], [], [
            'subcategoryEdit.family_id' => 'Familia',
            'subcategoryEdit.category_id' => 'Categoría',
            'subcategoryEdit.name' => 'Nombre'
        ]);

        $this->subcategory->update($this->subcategoryEdit);

        $this->dispatch('swal',[
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Subcategoría actualizada correctamente',
        ]);

        
    }

    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-edit');
    }
}
