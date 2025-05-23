@extends('layouts.admin')

@section('content')
<style>
    h2 {
        margin-bottom: 25px;
        font-weight: 600;
        color: #343a40;
    }

.form-control {
    width: 33%;
    box-sizing: border-box; 
    border-radius: 0;
    border: 1px solid #ced4da;
    padding: 8px 12px;
    font-size: 1rem;
    margin-top: 5px; 
    margin-bottom: 1rem; 
    display: block;
}

.form-group label {
    font-weight: 500;
    display: block;
}

.btn-success {
    background: linear-gradient(to right, #28a745, #218838);
    border: none;
    font-weight: 600;
    margin-top: 10px;
    padding: 10px 20px;
    cursor: pointer;
}

.btn-success:hover {
    background: linear-gradient(to right, #218838, #1e7e34);
}

.btn-secondary {
    margin-left: 10px;
    padding: 10px 20px;
    cursor: pointer;
}
</style>

<h2>Create New Customer</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.customers.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" name="phone" id="phone" class="form-control" pattern="[0-9\s\-+]{7,15}"
              title="Enter a valid phone number (7-15 digits). Allowed characters: numbers, plus (+), spaces, and dashes (-).">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Create Customer</button>
    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
