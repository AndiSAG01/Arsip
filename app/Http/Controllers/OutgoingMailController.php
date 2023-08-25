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
            'documents' => Document::where('category_id', 2)->get()
        ]);
    }

    function store(DocumentRequest $request)
    {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        Document::create([
            'category_id' => 2,
            'type_id' => $request->type_id,
            'name' => '002/SK/'.$request->type_id.Carbon::now()->format('dmy'),
            'code' => '002/SK/'.$request->type_id.Carbon::now()->format('dmy'),
            'from' => $request->from,
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

    function update($id, Request $request)
    {
        $request->validate([
            'type_id' => 'integer|required',
            'from' => 'string|required|min:6',
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
            $document->category_id = 2;
            $document->type_id = $request->type_id;
            $document->name = '002/SK/'.$request->type_id.Carbon::now()->format('dmy');
            $document->code = '002/SK/'.$request->type_id.Carbon::now()->format('dmy');
            $document->from = $request->from;
            $document->description = $request->description;
            $document->slug = Str::slug('002/SK/'.$request->type_id.Carbon::now()->format('dmy'));
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
