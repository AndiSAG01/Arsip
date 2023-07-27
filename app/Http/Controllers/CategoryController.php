<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index', [
            'categories' => category::latest()->get()
        ]);
    }

    function store(Request $request){
        $request->validate([
            'name' => 'string|required|min:5'
        ]);
        Category::insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return back()->with('success', 'Data telah ditambah.');
    }

    function edit($slug){
        return view('category.update',[
            'category' => category::whereSlug($slug)->first()
        ]);
    }

    function update(Request $request, $slug){
        Category::whereSlug($slug)->update([
            'name' => $request->name,
            'slug' => str::slug($request->name),
        ]);

        return redirect('category')->with('success', 'Data telah diubah.');
    }

    function destroy($slug){
        Category::whereSlug($slug)->delete();
        return back()->with('success', 'Data telah dihapus.');
    }
}
