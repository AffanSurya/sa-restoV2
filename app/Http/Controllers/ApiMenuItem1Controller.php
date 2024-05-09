<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuItem1Collection;
use App\Http\Resources\MenuItem1Resource;
use App\Models\MenuItem1;
use Illuminate\Http\Request;

class ApiMenuItem1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MenuItem1Collection(MenuItem1::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menuItem1 = MenuItem1::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'image' => $request->input('image'),
        ]);

        return response()->json([
            'message' => 'Item Berhasil Ditambahkan Di Dalam Menu Item 1',
            'data' => $menuItem1
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new MenuItem1Resource(MenuItem1::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menuItem1 = MenuItem1::findOrFail($id);

        $menuItem1->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'image' => $request->input('image'),
        ]);

        return response()->json([
            'message' => 'Item Berhasil Diubah Di Dalam Menu Item 1',
            'data' => $menuItem1
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menuItem1 = MenuItem1::findOrFail($id);
        $menuItem1->delete();

        return response()->json([
            'message' => 'Item Berhasil Dihapus Di Dalam Menu Item 1',
            'deleted_id' => $id,
        ], 200);
    }
}
