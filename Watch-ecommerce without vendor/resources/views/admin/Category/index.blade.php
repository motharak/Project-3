@extends('layouts.admin.app')
@section('PageTitle','Categroy')

@section('content')


<div class="bg-light rounded h-100 p-5">
                            @if(session('demo'))
                                <div class="alert alert-danger">
                                    {{ session('demo') }}
                                </div>
                            @endif
                            <button onclick="window.location.href = '{{ route('add.category') }}';" class='btn btn-outline-info m-2  float-end'>Add</button>
                            <h2 class="mb-4 ">Category Table</h2>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CategoryName</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th  scope="row" class="align-middle">{{$category->categoryNo}}</th>
                                            <td class="align-middle">{{$category->categoryName}}</td>
                                            <td class="align-middle">{{$category->Desription}}</td>
                                            <td class="align-middle"><img src='{{ asset('uploads/' . $category->Picture) }}' width='100' height='100'></td>
                                            <td class="align-middle">
                                            <button class='btn btn-outline-info m-2'><a href="{{route('edit.category',['id'=>$category->categoryNo])}}">Edit</a></button>
                                            <button class='btn btn-outline-danger m-2'><a href="{{route('delete.category',['id'=>$category->categoryNo,'img'=>$category->Picture])}}">Delete</a></button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

@endsection