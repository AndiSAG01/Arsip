<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class DocumentController extends Controller
{
    // 'category_id', 'name', 'code', 'description', 'file', 'slug'
    function index()
    {
        return view('document.index', [
            'category' => Category::get(),
            'documents' => Document::latest()->get()
        ]);
    }

    function store(DocumentRequest $request)
    {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        Document::insert([
            'category_id' => $request->category_id,
            'name' => $request->name, 
            'code' => $request->code, 
            'description' => $request->description, 
            'file' => $filePath, 
            'slug' => Str::slug($request->name)
        ]);

        return back()->with('success', 'Dokemen baru telah ditambah 👍');
    }

    function edit($slug)
    {
        return view('document.update', [
            'document' => document::whereSlug($slug)->first(),
            'category' => Category::get(),
        ]);
    }

    function update($id, Request $request)
    {
        $request->validate([
            'category_id' => 'integer|required', 
            'name' => 'string|required|min:5', 
            'code' => 'string|required|min:6', 
            'description' => 'string|min:5|required', 
        ]);
        $document = Document::find($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');
    
            Storage::disk('public')->delete($document->file);
            $document->file = $filePath;
        }
            $document->category_id = $request->category_id;
            $document->name = $request->name;
            $document->code = $request->code;
            $document->description = $request->description;
            $document->slug = Str::slug($request->name);
            $document->save();

        return redirect('document')->with('success', 'Dokumen telah diubah 👍');
    }

    function destroy($slug)
    {
        $file = Document::whereSlug($slug)->first()->file;
        Storage::disk('public')->delete($file);
        Document::whereSlug($slug)->delete();

        return back()->with('success', 'Dokumen telah dihapus');
    }

    function download($slug){
        $file = Document::whereSlug($slug)->first()->file;
        return response()->download($file);
    }

    function backup()
    {
        $storagePath = storage_path('app/public');
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
