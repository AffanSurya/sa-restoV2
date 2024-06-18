<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItem1Collection;
use App\Http\Resources\MenuItem1Resource;
use App\Models\MenuItem1;
use Illuminate\Http\Request;

class MenuItem1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MenuItem1Collection(MenuItem1::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required',
        ]);

        $menuItem1 = MenuItem1::create($validatedData);

        return response()->json([
            'message' => 'Item Berhasil Ditambahkan Di Dalam Menu Item 1',
            'data' => $menuItem1
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem1 $menuItem1)
    {
        return new MenuItem1Resource($menuItem1);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuItem1 $menuItem1)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required',
        ]);

        $menuItem1->update($validatedData);

        return response()->json([
            'message' => 'Item Berhasil Diubah Di Dalam Menu Item 1',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem1 $menuItem1)
    {
        try {
            $menuItem1->delete();

            return response()->json([
                'message' => 'Item Berhasil Dihapus',
            ], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal Menghapus Item'], 500);
        }
    }
}
