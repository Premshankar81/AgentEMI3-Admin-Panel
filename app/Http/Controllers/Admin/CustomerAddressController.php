<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Validator;

class CustomerAddressController extends Controller
{
    public function store(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'member_id' => 'required|uuid',
            'residense_type' => 'required|string',
            'stability' => 'nullable|string',
            'present_residence_type' => 'required|string',
            'present_address1' => 'required|string|max:100',
            'present_address2' => 'nullable|string|max:100',
            'present_ward' => 'nullable|string|max:100',
            'present_area' => 'nullable|string|max:100',
            'present_state' => 'required|string|max:100',
            'present_city' => 'required|string|max:100',
            'present_pin_code' => 'required|string|max:6',

            'permanent_residence_type' => 'required|string',
            'permanent_address1' => 'required|string|max:100',
            'permanent_address2' => 'nullable|string|max:100',
            'permanent_ward' => 'nullable|string|max:100',
            'permanent_area' => 'nullable|string|max:100',
            'permanent_state' => 'required|string|max:100',
            'permanent_city' => 'required|string|max:100',
            'permanent_pin_code' => 'required|string|max:6',
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error', 
        //         'errors' => $validator->errors()
        //     ], 400);
        // }

        // Store data
        $customerAddress = CustomerAddress::create($request->all());
        return view('admin.templates.customer.customer', compact('memberId'));
    }

    public function index()
    {
        $addresses = CustomerAddress::all();
        return response()->json($addresses);
    }

    public function show($id)
    {
        $address = CustomerAddress::find($id);
        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }
        return response()->json($address);
    }

    public function update(Request $request, $id)
    {
        $address = CustomerAddress::find($id);
        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        $address->update($request->all());
        return response()->json(['message' => 'Address updated successfully', 'data' => $address]);
    }

    public function destroy($id)
    {
        $address = CustomerAddress::find($id);
        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        $address->delete();
        return response()->json(['message' => 'Address deleted successfully']);
    }
}

