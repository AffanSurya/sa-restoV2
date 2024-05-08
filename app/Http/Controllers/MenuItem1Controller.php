<?php

namespace App\Http\Controllers;


use App\Models\MenuItem1;
use Illuminate\Http\Request;

class MenuItem1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menuItem1.index', [
            'menuItems' => MenuItem1::all(),
            'user' => auth()->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menuItem1.create', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|url',
        ]);

        $menuItem1 = MenuItem1::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'image' => $request->input('image'),
            'status' => 'available',
        ]);

        session()->flash('success', 'Item Berhasil Ditambahkan');

        return redirect()->route('menuItem1');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('menuItem1.edit', [
            'menuItem' => MenuItem1::findOrFail($id),
            'user' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|url',
        ]);

        $menuItem1 = MenuItem1::findOrFail($id);

        $menuItem1->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'image' => $request->input('image'),
        ]);

        session()->flash('success', 'Item Berhasil Diedit');

        return redirect()->route('menuItem1');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menuItem1 = MenuItem1::findOrFail($id);
        $menuItem1->delete();

        session()->flash('success', 'Item Berhasil Dihapus');

        return redirect()->route('menuItem1');
    }
}
