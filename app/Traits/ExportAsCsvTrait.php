<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

trait ExportAsCsvTrait
{
    public function export(array $data)
    {
        $fileName = time() . date('y-m-d-H-i-s') . '.csv';

        if(!File::exists(public_path('pending-files/'))) {
            File::makeDirectory(public_path('pending-files/'));
        }
        $filePath = public_path('pending-files/' . $fileName);

        $file = fopen($filePath, 'w');

        foreach ($data as $item) {
            fputcsv($file, $item);
        }
        fclose($file);

        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return Response::download($filePath, $fileName, $headers)->deleteFileAfterSend(true);
    }
}
