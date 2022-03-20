<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\Password;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PasswordController extends Controller
{
    public function index() :View
    {
        return view('password.index', [
            'passwords' => Password::latest()->paginate(20)
        ]);
    }

    public function create() :View
    {
        return view('password.create');
    }

    public function store(PasswordRequest $request)
    {
        $passwordArray = $request->validated();

        Password::create([
            'name' => $passwordArray['name'],
            'password' => Crypt::encryptString($passwordArray['password']),
            'description' => $passwordArray['description'] ?? null
        ]);

        return redirect()->route('password.index')->with('success', 'Data added successfully');
    }

    public function show(Password $password)
    {
        try {
            $password = Crypt::decryptString($password->password);
        } catch (DecryptException $e) {
            return back()->with('error', $e);
        }

        return view('password.show', [
            'password' => $password
        ]);
    }

    public function destroy(Password $password)
    {
        $password->delete();

        return back()->with('success', 'Data deleted successfully');
    }
}
