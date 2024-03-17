@extends('layouts.admin.app')
@section('PageTitle','Categroy')

@section('content')


<div class="bg-light rounded h-100 p-5">
                            @if(session('demo'))
                                <div class="alert alert-danger">
                                    {{ session('demo') }}
                                </div>
                            @endif
                            <button onclick="window.location.href = '{{ route('add.user') }}';" class='btn btn-outline-info m-2  float-end'>Add</button>
                            <h2 class="mb-4 ">User Table</h2>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Roles</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Picture</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user as $person)
                                        
                                    
                                        <tr>
                                            <th  scope="row" class="align-middle">{{$person->ID}}</th>
                                            <td class="align-middle">{{$person->name}}</td>
                                            <td class="align-middle">{{$person->role}}</td>
                                            <td class="align-middle">{{$person->address}}</td>
                                            <td class="align-middle">{{$person->phone}}</td>
                                            <td class="align-middle">{{$person->email}}</td>
                                            {{-- <td class="align-middle">{{$person->password}}</td> --}}
                                            <td class="align-middle"><img src='{{ asset('uploads/' . $person->Picture) }}' width='100' height='100'></td>
                                            <td class="align-middle"><button  class='btn btn-outline-info m-2'><a href='{{route('edit.user',["id"=>$person->ID])}}'>Edit</a></button> <button class='btn btn-outline-danger m-2'><a href='{{route('deleteUser',["id"=>$person->ID,"img"=>$person->Picture])}}'>Delete</a></button></td>
                                        </tr>
                                        {{-- onclick="window.location.href = '{{ route('edit.user') }}';'/{{ $person->ID}}'" --}}
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

@endsection