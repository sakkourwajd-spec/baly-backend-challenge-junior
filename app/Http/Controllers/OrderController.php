<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Action 1: Create a brand new order (Store).
     */
    public function store(Request $request)
    {
        // 1. Validate incoming data parameters
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'price'   => 'required|numeric|min:0',
        ]);

        // 2. Insert the new order into the database (status defaults to 'pending')
        $order = Order::create([
            'user_id' => $validated['user_id'],
            'price'   => $validated['price'],
            'status'  => 'pending',
        ]);

        // 3. Return the newly created order record back to the mobile client
        return response()->json([
            'message' => 'Order created successfully!',
            'order' => $order
        ], 201); // 201 stands for HTTP status "Created"
    }

    /**
     * Action 2: Update the status of an existing order.
     */
    public function updateStatus(Request $request, $id)
    {
        // 1. Locate the specific order by ID or throw a 404 error
        $order = Order::findOrFail($id);

        // 2. Validate that the new status is allowed
        $validated = $request->validate([
            'status'    => 'required|in:pending,accepted,completed,cancelled',
            'driver_id' => 'nullable|exists:drivers,id', // Optional field to assign a driver
        ]);

        // 3. Build the update dataset array
        $updateData = ['status' => $validated['status']];

        // If a driver accepts the order, link their driver_id to this order record
        if ($request->has('driver_id')) {
            $updateData['driver_id'] = $validated['driver_id'];
        }

        // 4. Update the database table
        $order->update($updateData);

        return response()->json([
            'message' => 'Order status updated successfully!',
            'order' => $order
        ], 200);
    }
}
