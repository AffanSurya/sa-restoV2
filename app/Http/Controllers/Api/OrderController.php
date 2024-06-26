<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrderCollection(Order::with('user', 'orderItems')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'table_number' => 'required|numeric',
        ]);

        $order = Order::create($validatedData);

        return response()->json([
            'message' => 'Order berhasil dibuat',
            'id' => $order->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return new OrderResource($order->load('user', 'orderItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        Log::debug('Updating order with data:', $request->all());

        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'table_number' => 'nullable|numeric',
            'total_price' => 'nullable|numeric',
            'status' => 'nullable|in:pending,processing,success,cancelled',
        ]);

        $order->update($validatedData);

        Log::debug('Updated order:', $order->toArray());
        $order->refresh();
        Log::debug('Updated order:', $order->toArray());

        return response()->json([
            'message' => 'Order berhasil diupdate',
            'data' => $order
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();

            return response()->json([
                'message' => 'Pesanan Berhasil Dihapus',
            ], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal Menghapus Pesanan'], 500);
        }
    }
}
