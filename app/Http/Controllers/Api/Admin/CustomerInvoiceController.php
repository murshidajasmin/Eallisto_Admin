<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class CustomerInvoiceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
		    'customer_id' => 'nullable|exists:customers,id',
		    'customer.name' => 'required_without:customer_id|string|max:255',
		    'customer.email' => 'required_without:customer_id|email|unique:customers,email',
		    'invoice.date' => 'required|date',
		    'invoice.amount' => 'required|numeric|min:0',
		    'invoice.status' => 'required|in:Paid,Unpaid,Cancelled',
		]);


        try {
            DB::beginTransaction();

            // Use existing customer if ID is provided
		    if ($request->filled('customer_id')) {
		        $customer = Customer::findOrFail($request->customer_id);
		    } else {
		        // Create a new customer
		        $customer = Customer::create([
		            'name' => $request->input('customer.name'),
		            'email' => $request->input('customer.email'),
		        ]);
		    }
             // Create invoice for the customer
			    $invoice = Invoice::create([
			        'customer_id' => $customer->id,
			        'date' => $request->input('invoice.date'),
			        'amount' => $request->input('invoice.amount'),
			        'status' => $request->input('invoice.status'),
			    ]);

            DB::commit();

            return response()->json([
                'message' => 'Customer and Invoice created successfully.',
                'customer' => $customer,
                'invoice' => $invoice,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create customer and invoice.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
