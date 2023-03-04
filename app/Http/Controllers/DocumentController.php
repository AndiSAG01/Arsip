<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    // 'category_id', 'name', 'code', 'description', 'file', 'slug'
    function index()
    {
        return view('document.index', [
            'documents' => Document::latest()->get()
        ]);
    }

    function store(DocumentRequest $request)
    {
        $file = $request->file('file');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/file-document/', $filename);

        Document::insert([
            'category_id' => $request->category_id,
            'name' => $request->name, 
            'code' => $request->code, 
            'description' => $request->description, 
            'file' => $filename, 
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
        if($request->hasfile('file'))
        {

            $destination = 'uploads/file-document/'.$document->file;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/file-document/', $filename);
            $document->file = $filename;
        }
            $document->category_id = $request->category_i;
            $document->name = $request->name;
            $document->code = $request->code;
            $document->description = $request->description;
            $document->slug = Str::slug($request->name);
            $document->save();

        return redirect('dicument')->with('success', 'Dokumen telah diubah 👍');
    }

    function destroy($slug)
    {
        Document::whereSlug($slug)->delete();

        return back()->with('success', 'Dokumen telah dihapus');
    }
}
