<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Password extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'description',
        'user_id',
        'password',
    ];

    /**
     * Get the user that owns this password.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Import CSV File to Database.
     *
     */
    public function importToDatabase()
    {
        $path = resource_path('pending-files/*.csv');

        $files = glob($path);

        foreach ($files as $file) {

            $data = array_map('str_getcsv', file($file));

            foreach ($data as $row) {
                Self::create([
                    'user_id' => Auth::user()->id,
                    'name' => $row[0],
                    'password' => $row[1],
                    'description' => $row[2],
                ]);
            }

            unlink($file);
        }
    }
}
