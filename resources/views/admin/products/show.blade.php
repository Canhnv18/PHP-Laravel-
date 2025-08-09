@extends('layouts.client')

@section('content')
<div class="container py-4">
    <div class="row g-4 align-items-center">
        <div class="col-md-5 text-center">
            <img src="{{ $product->image ? asset('storage/uploads/' . $product->image) : 'https://via.placeholder.com/400x300?text=No+Image' }}" class="img-fluid rounded shadow-sm mb-3" style="max-height:350px; object-fit:contain; background:#f3f4f6;" alt="{{ $product->name }}">
        </div>
        <div class="col-md-7">
            <h2 class="fw-bold mb-2" style="color:#22223b;">{{ $product->name }}</h2>
            <p class="mb-2">
                <span class="badge bg-light text-dark border" style="font-size:1rem;">Thương hiệu: {{ $product->brand->name ?? 'Không rõ' }}</span>
            </p>
            <h4 class="text-danger fw-bold mb-3">{{ number_format($product->price, 0, ',', '.') }} đ</h4>
            <p class="mb-4 text-secondary" style="font-size:1.1rem; min-height:60px;">{{ $product->description}}</p>
            <p class="mb-4 text-secondary" style="font-size:1.1rem; min-height:60px;"><strong>Một biểu tượng kinh điển của PUMA, lấy cảm hứng từ tốc độ trên đường đua: Speedcat OG. Đôi giày nổi bật với dáng siêu mỏng, đường nét sắc sảo, mang tinh thần mạnh mẽ của những chiếc xe đua. Đưa phong cách motorsport xuống phố và làm chủ xu hướng low-profile với phiên bản huyền thoại này.</strong></p>
            
            <div class="mb-3">
                <span class="text-muted">Số lượng còn: </span><span class="fw-bold">{{ $product->quantity ?? 'N/A' }}</span>
            </div>
            <a href="#" class="btn btn-success btn-lg px-5 py-2">Mua ngay</a>
        </div>
    </div>
</div>

@if(isset($relatedProducts) && $relatedProducts->count())
<div class="container mt-5 mb-5">
    <h4 class="mb-4 fw-bold" style="color:#22223b;">Sản phẩm liên quan</h4>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">
        @foreach($relatedProducts as $item)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $item->image ? asset('storage/uploads/' . $item->image) : 'https://via.placeholder.com/200x140?text=No+Image' }}" class="card-img-top" alt="{{ $item->name }}" style="height:140px; object-fit:cover;">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-1" style="font-size:1rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $item->name }}</h6>
                        <p class="card-text text-danger fw-bold mb-1" style="font-size:1rem;">{{ number_format($item->price, 0, ',', '.') }} đ</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pt-0">
                        <a href="{{ url('/detail-product/' . $item->id) }}" class="btn btn-outline-success btn-sm px-3">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
        </div>
    </div>
</div>
@endsection