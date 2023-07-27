<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        return view('type.index', [
            'types' => Type::latest()->get()
        ]);
    }

    function store(Request $request){
        $request->validate([
            'name' => 'string|required|min:5'
        ]);
        Type::insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return back()->with('success', 'Data telah ditambah.');
    }

    function edit($slug){
        return view('type.update',[
            'type' => Type::whereSlug($slug)->first()
        ]);
    }

    function update(Request $request, $slug){
        Type::whereSlug($slug)->update([
            'name' => $request->name,
            'slug' => str::slug($request->name),
        ]);

        return redirect('type')->with('success', 'Data telah diubah.');
    }

    function destroy($slug){
        Type::whereSlug($slug)->delete();
        return back()->with('success', 'Data telah dihapus.');
    }
}
