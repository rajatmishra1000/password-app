<?php

namespace App\Http\Livewire;

use App\Models\Password as ModelsPassword;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Livewire\Component;

class Password extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public string $passwordValue = '';
    public int $uniqueId = 0;
    public bool $showPassword = false;

    public function destroy(ModelsPassword $password)
    {
        $password->delete();

        session()->flash('success', 'Data deleted successfully');
    }

    public function decryptPassword(ModelsPassword $password)
    {
        try {
            $this->passwordValue = Crypt::decryptString($password->password);

            $this->uniqueId = $password->id;
        } catch (DecryptException $e) {
            return back()->with('error', $e);
        }

        $this->showPassword = true;
    }

    public function encryptPassword()
    {
        $this->showPassword = false;
    }

    public function render()
    {
        return view('livewire.password', [
            'passwords' => ModelsPassword::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(100),
        ]);
    }
}
