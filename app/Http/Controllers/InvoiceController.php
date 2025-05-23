<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->get();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('admin.invoices.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Unpaid,Paid,Cancelled',
        ]);

        Invoice::create($validated);
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice created!');
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        return view('admin.invoices.edit', compact('invoice', 'customers'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Unpaid,Paid,Cancelled',
        ]);

        $invoice->update($validated);
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice updated!');
    }
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice deleted!');
    }
}
