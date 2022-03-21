<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

trait ImportToDatabaseTrait
{
    public function createArrayFromCsv(Request $request)
    {
        $validatedData = $request->validate([
            'file' => ['required', 'mimes:csv,txt'],
        ]);

        $file = file($validatedData['file']->getRealPath());

        $data = array_slice($file, 1);
        $parts = (array_chunk($data, 500));

        if(File::exists(resource_path('pending-files/'))) {
            File::deleteDirectory(resource_path('pending-files/'));
        }
        File::makeDirectory(resource_path('pending-files/'));

        array_map( 'unlink', array_filter((array) glob(resource_path('pending-files/*.csv')) ) );

        foreach ($parts as $index=>$part) {

            $fileName = resource_path('pending-files/'.date('y-m-d-H-i-s').$index.'.csv');
            file_put_contents($fileName, $part);
        }
    }
}
