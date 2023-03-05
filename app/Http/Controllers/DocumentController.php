<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        return view('dicument.update', [
            'document' => document::whereSlug($slug)->first()
        ]);
    }

    function update($slug, Request $request)
    {
        $document = Document::whereSlug($slug);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');
    
            Storage::disk('public')->delete($document->file);
            $document->file = $filePath;
        }
            $document->category_id = $request->category_i;
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

        // return Storage::download($file);
    }
}
