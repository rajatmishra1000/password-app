<?php

namespace App\Http\Livewire;

use App\Models\Password as ModelsPassword;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class UpdatePassword extends Component
{
    public string $name, $description, $password;
    public $data;

    public function mount(ModelsPassword $password)
    {
        $this->data = $password;
        $this->name = $password->name;
        $this->description = $password->description;
        $this->password = Crypt::decryptString($password->password);
    }

    public function update(ModelsPassword $password)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:50',
            'description' => 'nullable|max:1500'
        ]);

        $password->update([
            'name' => $this->name,
            'password' => Crypt::encryptString($this->password),
            'description' => $this->description
        ]);

        session()->flash('success', 'Data updated successfully');

        return redirect()->route('password.index');
    }

    public function render()
    {
        return view('livewire.update-password');
    }
}
