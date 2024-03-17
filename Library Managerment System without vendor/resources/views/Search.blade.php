@extends('layouts.app')
@section('pageTitle', 'Search')
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Search Transaction</h2>

    <form method="GET" action="{{ route('search.transaction') }}">
        @csrf

        <div class="mb-3">
            <label for="transaction_id" class="form-label">Enter Transaction ID:</label>
            <input type="text" name="transaction_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Display search results here -->
    @if(isset($transaction))
        <div class="mt-4">
            <h3>Transaction Details</h3>
            <p>Transaction ID: {{ $transaction->transaction_id }}</p>
            <p>User ID: {{ $transaction->user_id }}</p>
            <p>Book ID: {{ $transaction->book_id }}</p>
            <!-- Add more details as needed -->
        </div>
    @endif

</div>

@endsection
