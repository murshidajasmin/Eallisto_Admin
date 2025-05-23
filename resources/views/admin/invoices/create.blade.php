@extends('layouts.admin')

@section('content')
<style>
    h2 {
        margin-bottom: 25px;
        font-weight: 600;
        color: #343a40;
    }

    form {
        max-width: 600px;
    }

    label {
        display: block;
        font-weight: 500;
        margin-bottom: 6px;
        margin-top: 15px;
        color: #495057;
    }

    select, input[type="date"], input[type="number"] {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    select:focus, input[type="date"]:focus, input[type="number"]:focus {
        border-color: #28a745;
        outline: none;
        box-shadow: 0 0 3px #28a745;
    }

    button {
        margin-top: 20px;
        background: linear-gradient(to right, #28a745, #218838);
        border: none;
        color: white;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    button:hover {
        background: linear-gradient(to right, #218838, #1e7e34);
    }
</style>

<h2>Create Invoice</h2>

<form method="POST" action="{{ route('admin.invoices.store') }}">
    @csrf

    <label for="customer_id">Customer <span class="text-danger">*</span></label>
    <select name="customer_id" id="customer_id" required>
        <option value="" disabled selected>Select a customer</option>
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>

    <label for="date">Date <span class="text-danger">*</span></label>
    <input type="date" name="date" id="date" required>

    <label for="amount">Amount <span class="text-danger">*</span></label>
    <input type="number" name="amount" id="amount" step="0.01" min="0" required>

    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="Unpaid">Unpaid</option>
        <option value="Paid">Paid</option>
        <option value="Cancelled">Cancelled</option>
    </select>

    <button type="submit">Save Invoice</button>
</form>
@endsection
