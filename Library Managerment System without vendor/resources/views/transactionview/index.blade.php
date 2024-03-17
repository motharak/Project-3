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
            <th colspan=3>Action</th>
        </tr>
        @dd($trans->isNotEmpty())
        @foreach ($trans as $tran)
        <tr>
            <td>{{ $tran->transaction_id}}</td>
            <td>{{ $tran->user_id }}</td>
            <td>{{ $tran->book_id }}</td>
            <td>{{ $tran->due_date }}</td>
            <td>{{ $tran->returned_date }}</td>
            <td>{{ $tran->transaction_type }}</td>
    
            <td><a href="{{ route('tran.show', [$tran->transaction_id]) }}" class="btn btn-primary btn-sm">View</a></td>
            <td><a href="{{ route('tran.edit', [$tran->transaction_id]) }}" class="btn btn-info btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('tran.destroy', [$tran->transaction_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    
    @if ($trans->isEmpty())
        <tr><td colspan="7" style="text-align:center">No data to show</td></tr>
    @endif
            
    </table>
    <br>
@endsection
