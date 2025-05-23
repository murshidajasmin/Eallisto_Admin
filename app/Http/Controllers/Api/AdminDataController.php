<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class AdminDataController extends Controller
{
    public function handle(Request $request)
    {
        if ($request->isMethod('get')) {
            return response()->json([
                'customers' => Customer::all(),
                'invoices' => Invoice::with('customer')->get(),
            ]);
        }

        return response()->json(['error' => 'Method not allowed'], 405);
    }
}
