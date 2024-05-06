<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu1Request;
use App\Http\Requests\UpdateMenu1Request;
use App\Models\Menu1;

class Menu1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu1', [
            'menu1' => Menu1::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenu1Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu1 $menu1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu1 $menu1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenu1Request $request, Menu1 $menu1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu1 $menu1)
    {
        //
    }
}
