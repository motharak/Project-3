<!-- resources/views/edit_transaction.blade.php -->

@extends('layouts.app')
@section('pageTitle', 'Edit Transaction')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Transaction</h2>

        <form method="POST" action="{{ route('tran.update', $transaction->transaction_id) }}">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID:</label>
                <input type="text" name="user_id" class="form-control" value="{{ $transaction->user_id }}" required>
            </div>

            <div class="mb-3">
                <label for="book_id" class="form-label">Book ID:</label>
                <input type="text" name="book_id" class="form-control" value="{{ $transaction->book_id }}" required>
            </div>

            <div class="mb-3">
                <label for="transaction_type" class="form-label">Transaction Type:</label>
                <select name="transaction_type" class="form-control" required>
                    <option value="Borrow" {{ $transaction->transaction_type === 'Borrow' ? 'selected' : '' }}>Borrow</option>
                    <option value="Return" {{ $transaction->transaction_type === 'Return' ? 'selected' : '' }}>Return</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="transaction_date" class="form-label">Transaction Date:</label>
                <input type="date" name="transaction_date" class="form-control" value="{{ $transaction->transaction_date }}" required>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date:</label>
                <input type="date" name="due_date" class="form-control" value="{{ $transaction->due_date }}" required>
            </div>

            <!-- You can add more fields as needed -->

            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>
    </div>
@endsection
