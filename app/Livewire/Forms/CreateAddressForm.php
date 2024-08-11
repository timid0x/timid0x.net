<?php

namespace App\Livewire\Forms;

use App\Models\Address;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateAddressForm extends Form
{
    public $type = '';
    public $description = '';
    public $district = '';
    public $reference = '';
    public $receiver = 1;
    public $receiver_info = [];
    public $default = false;

    public function rules()
    {
        return [

            'type' => 'required|in:1,2', // tipo dirección 1 = Home, 2 = Work
            'description' => 'required|string',
            'district' => 'required|string',
            'reference' => 'required|string',
            'receiver' => 'required|in:1,2', // tipo dirección 1 = yo, 2 = otro
            'receiver_info' => 'required|array', // extra de información del receptor
            'receiver_info.first_name' => 'required|string', // extra de nombre del receptor
            'receiver_info.last_name' => 'required|string', // extra de apellido del receptor
            'receiver_info.document_type' => 'required|in:1,2', // tipo documento 1 = cédula, 2 = passport
            'receiver_info.document_number' => 'required|string', // numero de documento
            'receiver_info.phone' => 'required|string', // telefono del receptor	
            
        ];
    }

    public function validationAttributes()
    {
        return [
            'type' => 'tipo',
            'receiver' => 'receptor',
            'description' => 'dirección',
            'district' => 'distrito - barrio - sector - provincia',
            'reference' => 'referencia',
            'receiver_info' => 'información del receptor',
            'receiver_info.first_name' => 'nombre del receptor',
            'receiver_info.last_name' => ' apellido del receptor',
            'receiver_info.document_type' => 'tipo de documento',
            'receiver_info.document_number' => 'número de documento',
            'receiver_info.phone' => 'teléfono del receptor',



        ];
    }
    

    public function save()
    {

        $this->validate();

        if (auth()->user()->addresses->count() === 0) {
            $this->default = true;
        }


        Address::create([
            'user_id' => auth()->user()->id,
            'type' => $this->type,
            'description' => $this->description,
            'district' => $this->district,
            'reference' => $this->reference,
            'receiver' => $this->receiver,
            'receiver_info' => $this->receiver_info,
            'default' => $this->default,

        ]);
        $this->reset();
        $this->receiver_info = [
            'first_name' => auth()->user()->first_name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone' => auth()->user()->phone,

        ];

    }



}
