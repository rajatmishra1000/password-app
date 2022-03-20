<?php

namespace App\Http\Livewire;

use App\Models\Password as ModelsPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class AddPassword extends Component
{
    public string $name = '', $description = '', $password = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'password' => 'required|string|max:50',
        'description' => 'nullable|max:1500'
    ];

    public function store()
    {
        $this->validate();

        ModelsPassword::create([
            'user_id' => Auth::user()->id,
            'name' => $this->name,
            'password' => Crypt::encryptString($this->password),
            'description' => $this->description ?? null
        ]);

        $this->reset();

        session()->flash('success', 'Data added successfully');
    }

    public function render()
    {
        return view('livewire.add-password');
    }
}
