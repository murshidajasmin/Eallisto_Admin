@extends('layouts.admin')

@section('content')
<style>
    h2 {
        margin-bottom: 25px;
        font-weight: 600;
        color: #343a40;
    }

    a.create-btn {
        display: inline-block;
        margin-bottom: 15px;
        padding: 8px 15px;
        background-color: #28a745; /* same green as customer add button */
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    a.create-btn:hover {
        background-color: #218838; /* darker green */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    thead tr {
        background-color: #343a40; /* same dark sidebar background */
        color: white;
        text-align: left;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #dee2e6;
    }

    tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    tbody tr:hover {
        background-color: #e9ecef;
    }

    a.edit-btn {
        display: inline-block;
        padding: 6px 12px;
        background-color: #ffc107;
        color: #212529;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    a.edit-btn:hover {
        background-color: #e0a800; 
        color: white;
    }
    form.delete-form {
        display: inline-block;
        margin-left: 5px;
    }
    
    button.btn-danger {
        display: inline-block;
        padding: 6px 12px;
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button.btn-danger:hover {
        background-color: #c82333;
    }


</style>

<h2>Invoice List</h2>

<a href="{{ route('admin.invoices.create') }}" class="create-btn">Create New Invoice</a>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $serial = 1; @endphp
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $serial++ }}</td>
                <td>{{ $invoice->customer->name }}</td>
                <td>{{ \Carbon\Carbon::parse($invoice->date)->format('Y-m-d') }}</td>
                <td>${{ number_format($invoice->amount, 2) }}</td>
                <td>{{ ucfirst($invoice->status) }}</td>
                <td>
                    <a href="{{ route('admin.invoices.edit', $invoice) }}" class="edit-btn">Edit</a>

                    <form action="{{ route('admin.invoices.destroy', $invoice) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this invoice?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
