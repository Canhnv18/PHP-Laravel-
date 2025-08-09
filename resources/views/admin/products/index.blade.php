@extends('layouts.admin')
@section('content')
<div class="container my-4">
    <div class="text-center p-3 bg-secondary text-white rounded shadow-sm">
        <h1 class="fw-bold mb-0">
            <i class="bi bi-box-seam me-2"></i>Danh Sách Sản Phẩm
        </h1>
    </div>
</div>
    <div class="mb-3">
        <a href="{{route('products.create')}}" class="btn btn-success">Add Product</a>  
    </div>
    <table class="table table-success">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($products as $p)
             <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->brand->name}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->quantity}}</td>
                <td>
                                        <img src="{{ asset('storage/uploads/' . $p->image) }}" alt="" style="max-width:80px; max-height:60px; object-fit:cover;">

                </td>
                <td>{{$p->status}}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{route('products.show', $p->id)}}" class="btn btn-info">Detail</a>
                        <a href="{{route('products.edit', $p->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('products.destroy', $p->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Ban co chac muon xoa khong?')">Delete</button>
                        </form>
                    </div>
                </td>
                </tr>
           @endforeach
        </tbody>
    </table>
   <div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
@endsection