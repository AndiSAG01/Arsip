<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DocumentController extends Controller
{


    function backup()
    {
        $storagePath = storage_path('app');
        $zipFileName = 'backup-' . date('Y-m-d') . '.zip';
        $zipFilePath = storage_path($zipFileName);

        // Create new zip archive
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE) !== true) {
            return response()->json(['message' => 'Failed to create backup zip file.']);
        }

        // Get all files in storage directory
        $files = Storage::allFiles();

        // Add all files to zip archive
        foreach ($files as $file) {
            $filePath = $storagePath . '/' . $file;
            if (file_exists($filePath)) {
                $zip->addFile($filePath, $file);
            }
        }

        // Close the zip file
        $zip->close();

        // Download the zip file
        return response()->download($zipFilePath, $zipFileName);
    }
}
