@extends('layouts.app')
@section('pageTitle','User')
@section('content')
    <h1>This User view page</h1>
    
    

    @if(Session::has('msg'))
    <div class="alert alert-primary d-inline-block px-3 py-1 my-1">
        {{ Session::get('msg') }}
    </div>
    


@endif
    <h3 class="text-right ml-auto"><a href="{{route('user.create')}}" class='btn btn-success'>Add</a></h3>
    <table border="1" style='border: 1px 1px solid; border-collapse: collapse; width: 100%;' class='table table-striped table-sm'>
        <tr class='trow'>
            <th>User Id</td>
            <th>User Name</th>
            <th>Role</th>


            <th colspan=3>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->role}}</td>

                <td><a href="{{route('user.show', [$user->user_id])}}" class="btn btn-primary btn-sm">view</a></td>
                <td><a href="{{route('user.edit', [$user->user_id])}}" class="btn btn-info btn-sm">edit</a></td>
                <td><a href="{{route('user.destroy', [$user->user_id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">delete</a></td>
            </tr>
        @endforeach
    </table>
    <br>
    
@endsection
