@extends('layouts.admin.app')
@section('PageTitle','Edit')

@section('content')


<div class="bg-light rounded h-100 p-5">

<h2 class="text-center mb-5">Edit Users</h2>

<form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hiddenId" value="{{$user->ID}}" />
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value='{{$user->name}}' class="form-control @error('name') is-invalid @enderror" placeholder="Name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-select form-control @error('role') is-invalid @enderror" aria-label="Default select example">
                                <option selected="" value='{{$user->role}}'>{{$user->role}}</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                                <option value="3">Other</option>
                            </select>
        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="form-group">
        <label for="description">Address</label>
        <input type="text" name="address" id="address" value='{{$user->address}}' class="form-control  @error('address') is-invalid @enderror" placeholder="User address"></textarea>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value='{{$user->phone}}' class="form-control @error('phone') is-invalid @enderror" placeholder="User phone" >
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" id="email" {{$user->email}} class="form-control @error('email') is-invalid @enderror" placeholder="User email" >
        @if ($errors->has('addAlrady'))
                <div class="alert alert-danger my-2" role="alert">
                    {{ $errors->first('addAlrady') }}
                </div>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" {{$user->password}} class="form-control @error('password') is-invalid @enderror" placeholder="User Password" >
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="picture">Picture</label>
        <input class="form-control" type="file" name="file" />
        <img width="100" src="{{asset('uploads/'. $user->Picture)}}" />
        @error('picture')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br/>
    <button type="submit" name="btnSubmit" class="btn btn-primary">Update User</button>
</form>


</div>

    
@endsection