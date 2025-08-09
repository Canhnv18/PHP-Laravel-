@extends('layouts.admin')
@section('content')
<h1>Them moi san pham</h1>
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input type="number" class="form-control" name="price">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Brand</label>
        <select name="brand_id" class="form-select">
            <option value="">-- Chọn hãng --</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
     <div class="mb-3">
        <label for="" class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection