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
        background-color: #28a745; /* green */
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
        background-color: #343a40; /* dark sidebar color */
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
        background-color: #ffc107; /* yellow */
        color: #212529;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    a.edit-btn:hover {
        background-color: #e0a800; /* darker yellow */
        color: white;
    }

    form.delete-form {
        display: inline-block;
        margin-left: 5px;
    }

    button.delete-btn {
        background-color: #dc3545; /* bootstrap red */
        border: none;
        padding: 6px 12px;
        color: white;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button.delete-btn:hover {
        background-color: #c82333; /* darker red */
    }
</style>

<h2>Customer List</h2>

<a href="{{ route('admin.customers.create') }}" class="create-btn">Add New Customer</a>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $serial = 1; @endphp
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $serial++ }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    <a href="{{ route('admin.customers.edit', $customer) }}" class="edit-btn">Edit</a>

                    <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
