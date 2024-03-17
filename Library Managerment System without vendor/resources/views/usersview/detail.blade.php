@extends('layouts.app')
@section('pageTitle','Detail User')
@section('content')
    <h1>User Details</h1>
<h3 class="text-right ml-auto"><a href="{{ route('user.index') }}" class='btn btn-success'>Back</a></h3>


    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>User ID</td>
            <th>UserName</th>
            <th>Password</th>
            <th>Role</th>
            <th>Create At</th>
            <th>Update at</th>
        </tr>
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>

            </tr>
    </table>

    
@endsection
