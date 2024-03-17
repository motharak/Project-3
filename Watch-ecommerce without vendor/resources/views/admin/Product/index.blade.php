@extends('layouts.admin.app')
@section('PageTitle','Product')

@section('content')

    

    <div class="row">
    @if(session('demo'))
        <div class="alert alert-danger mx-4 mr-4">
            {{ session('demo') }}
        </div>
    @endif
        <div class="col-lg-12">
        
            <div class="card">
            
                <div class="card-header">
                    <h4>Product Management</h4>
                </div>
                <div class="card-body">
                
                    <div class="table-responsive">
                    <button onclick="window.location.href = '{{ route('add.product') }}';" class='btn btn-outline-info m-2  float-end'>Add</button>
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>QTY</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th  scope="row" class="align-middle">{{$product->proId}}</th>
                                        <td>{{ $product->proName }}</td>
                                        <td>{{ $product->proPrice }}</td>
                                        <td>{{ $product->CategoryNo }}</td>
                                        <td>{{ $product->Description }}</td>
                                        <td>{{ $product->QTY }}</td>
                                        <td><img src='{{ asset('uploads/' . $product->Picture) }}' height="100" width="100"></td>
                                        <td>
                                            <a href="{{route('edit.product',['id'=>$product->proId])}}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{route('delete.product',['id'=>$product->proId,'img'=>$product->Picture])}}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
