<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Update the driver's availability status.
     */
    public function updateStatus(Request $request, $id)
    {
        // 1. Find the driver by their ID, or throw an error if they don't exist
        $driver = Driver::findOrFail($id);

        // 2. Validate that the incoming status is either 'active' or 'inactive'
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        // 3. Update the database column with the new status
        $driver->update([
            'status' => $validated['status'],
        ]);

        // 4. Return a successful confirmation response back in JSON format
        return response()->json([
            'message' => 'Driver status updated successfully!',
            'driver' => $driver
        ], 200);
    }
}
