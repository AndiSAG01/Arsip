<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;


class OutgoingMailController extends Controller
{
    function index()
    {
        return view('OutgoingMail.index', [
            'category' => Category::get(),
            'type' => Type::get(),
            'documents' => Document::where('direction', 0)->get()
        ]);
    }

    function store(DocumentRequest $request)
    {
        // dd($request->all());
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        Document::create([
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'name' => now()->format('dmy').'/SK/'.$request->type_id.Carbon::now()->getTimestamp(),
            'code' => now()->format('dmy').'/SK/'.$request->type_id.Carbon::now()->getTimestamp(),
            'from' => $request->from,
            'direction' => 0,
            'description' => $request->description,
            'file' => $filePath,
            'slug' => Str::slug('002 SM '.$request->type_id.Carbon::now()->format('dmy'))
        ]);

        return back()->with('success', 'Data yang Anda tambahkan telah tersimpan di arsip digital dan dapat diakses kapan saja.
        ');
    }

    function edit($id)
    {

        return view('OutgoingMail.update', [
            'document' => document::find($id),
            'category' => Category::get(),
            'type' => Type::get(),
        ]);
    }

    function update($id, DocumentRequest $request)
    {
        $document = Document::find($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');

            Storage::disk('public')->delete($document->file);
            $document->file = $filePath;
        }
            $document->category_id = $request->category_id;
            $document->direction = 0;
            $document->type_id = $request->type_id;
            $document->name = now()->format('dmy').'/SK/'.$request->type_id.Carbon::now()->getTimestamp();
            $document->code = now()->format('dmy').'/SK/'.$request->type_id.Carbon::now()->getTimestamp();
            $document->from = $request->from;
            $document->description = $request->description;
            $document->slug = Str::slug(now()->format('dmy').'/SK/'.$request->type_id.Carbon::now()->getTimestamp());
            $document->save();

        return redirect()->route('surat-keluar.index')->with('success', 'Arsip '.$document->name.' telah terupdate dengan data yang baru.');
    }

    function destroy($id)
    {
        $file = Document::find($id)->file;
        Storage::disk('public')->delete($file);
        Document::find($id)->delete();

        return back()->with('success', 'Data telah dihapus dari arsip digital dan tidak bisa dikembalikan lagi..');
    }

    function download($id){
        $document = Document::find($id);

        if (!$document) {
            throw new FileNotFoundException("The file does not exist.");
        }

        $filePath = storage_path('app/public/' . $document->file);

        if (!file_exists($filePath)) {
            throw new FileNotFoundException("The file does not exist.");
        }

        return response()->download($filePath);
    }
}
