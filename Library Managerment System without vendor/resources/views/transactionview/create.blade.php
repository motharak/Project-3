<!-- resources/views/add_transaction.blade.php -->

@extends('layouts.app')
@section('pageTitle', 'Add Transaction')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Transaction</h2>

        <!-- Form for adding a new transaction -->
        <form method="POST" action="{{ route('tran.store') }}">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID:</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="book_id" class="form-label">Book ID:</label>
                <input type="text" name="book_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="transaction_type" class="form-label">Transaction Type:</label>
                <select name="transaction_type" class="form-control" required>
                    <option value="Borrow">Borrow</option>
                    <option value="Return">Return</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="transaction_date" class="form-label">Transaction Date:</label>
                <input type="date" name="transaction_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date:</label>
                <input type="date" name="due_date" class="form-control" required>
            </div>

            <!-- You can add more fields as needed -->

            <button type="submit" class="btn btn-primary">Add Transaction</button>
        </form>
    </div>
@endsection
