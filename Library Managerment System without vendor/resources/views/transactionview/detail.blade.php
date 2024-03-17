@extends('layouts.app')
@section('pageTitle', 'Books')
@section('content')
    <h1>This Transaction view page</h1>

    @if(Session::has('msg'))
        <div class="alert alert-primary d-inline-block px-3 py-1 my-1">
            {{ Session::get('msg') }}
        </div>
    @endif

    <h3 class="text-right ml-auto"><a href="{{ route('tran.create') }}" class='btn btn-success'>Add</a></h3>
    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>Transactions Id</th>
            <th>User Id</th>
            <th>Book_id	</th>
            <th>Due Date</th>
            <th>Returned Date</th>
            <th>Transaction Type</th>
            <th>Transaction Date </th>
            <th>Created At</th>
            <th>Update At</th>

        </tr>
        {{-- @dd($trans->isNotEmpty()) --}}

        <tr>
            <td>{{ $tran->transaction_id}}</td>
            <td>{{ $tran->user_id }}</td>
            <td>{{ $tran->book_id }}</td>
            <td>{{ $tran->due_date }}</td>
            <td>{{ $tran->returned_date }}</td>
            <td>{{ $tran->transaction_type }}</td>
            <td>{{ $tran->transaction_date }}</td>
            <td>{{ $tran->created_at }}</td>
            <td>{{ $tran->updated_at }}</td>
    

        </tr>

    
            
    </table>
    <br>
@endsection
