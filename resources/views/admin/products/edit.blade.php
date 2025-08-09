@extends('layouts.admin')
@section('content')
<h1>Update san pham</h1>
<form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" value="{{$product->price}}">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3">{{$product->description}}</textarea>
    </div>sad
     <div class="mb-3">
        <label for="" class="form-label">Image</label> <br>
        <img src="{{ asset('storage/uploads/' . $product->image) }}" width="100px" alt="">
        <input type="file" class="form-control" name="image">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Brand</label>
        <select name="brand_id" class="form-select">
            <option value="">-- Chọn hãng --</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}"  @selected(old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection