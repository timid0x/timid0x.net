<?php

namespace App\Livewire\Admin\Options;

use App\Livewire\Forms\Admin\Options\NewOptionForm;
use Livewire\Component;
use App\Models\Option;
use App\Models\Feature;
use Livewire\Attributes\On;

class ManageOptions extends Component
{

    public $options;
    public NewOptionForm $newOption;
    

    public function mount()
    {
        $this->options = Option::orderBy('name')->with(['features' => function ($q) {
            $q->orderBy('order');
        }])->get();
    }

    #[On('featureAdded')]
    public function updateOptionList()
    {
        $this->options = Option::orderBy('name')->with('features')->with(['features' => function ($q) {
            $q->orderBy('order');
        }])->get();
    }


    public function addFeature()
    {
        $this->newOption->addFeature();
    }

    public function deleteFeature(Feature $feature)
    {
        $feature->delete();
        $this->options = Option::orderBy('name')->with(['features' => function ($q) {
            $q->orderBy('order');
        }])->get();
    }

    public function removeFeature($index)
    {
        $this->newOption->removeFeature($index);
    }

    public function deleteOption(Option $option){
        $option->delete();
        $this->options = Option::orderBy('name')->with(['features' => function ($q) {
            $q->orderBy('order');
        }])->get();
    }

    public function addOption()
    {
 
        $this->newOption->save();


        $this->options = Option::orderBy('name')->with(['features' => function ($q) {
            $q->orderBy('order');
        }])->get();
        
           
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Opción agregada',
            'text' => 'Opción agregada correctamente',
        ]);

    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
