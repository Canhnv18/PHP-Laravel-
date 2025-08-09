@extends('layouts.client')

@section('content')
<!-- Banner -->
<div class="mb-4">
    <img src="/storage/uploads/banner4.webp" alt="Banner" class="img-fluid rounded shadow-sm w-100" style="max-height:320px; object-fit:cover;">
</div>

<!-- Danh sách sản phẩm -->
<div class="my-4">
  <h2 class="text-center fw-bold arrival-title mb-4">
    <span style="vertical-align:middle;">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#16a34a" class="bi bi-lightning-fill me-2" viewBox="0 0 16 16">
        <path d="M11.251 0a.5.5 0 0 1 .471.669L9.6 5H13a.5.5 0 0 1 .39.812l-8 10A.5.5 0 0 1 4 15.5V10H1.5a.5.5 0 0 1-.39-.812l8-9.5A.5.5 0 0 1 9.5 0h1.751z"/>
      </svg>
      <span>Welcome to Puma Shop</span>
    </span>
  </h2>

  <!-- Bộ lọc -->
  <form method="GET" action="{{ url('/') }}" class="row g-3 align-items-end justify-content-center mb-4">
    <div class="col-md-4">
      <label for="brand_id" class="form-label mb-1">Hãng</label>
      <select name="brand_id" id="brand_id" class="form-select">
        <option value="">Tất cả</option>
        @foreach($brands as $brand)
          <option value="{{ $brand->id }}" {{ (isset($brandId) && $brandId == $brand->id) ? 'selected' : '' }}>{{ $brand->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3">
      <label for="price_min" class="form-label mb-1">Giá từ</label>
      <input type="number" name="price_min" id="price_min" class="form-control" placeholder="0" value="{{ $priceMin ?? '' }}">
    </div>
    <div class="col-md-3">
      <label for="price_max" class="form-label mb-1">Đến</label>
      <input type="number" name="price_max" id="price_max" class="form-control" placeholder="" value="{{ $priceMax ?? '' }}">
    </div>
    <div class="col-md-2 d-grid">
      <button type="submit" class="btn btn-success">Lọc sản phẩm</button>
    </div>
  </form>
</div>
<style>
  .arrival-title {
    background: linear-gradient(90deg, #16a34a 0%, #22d3ee 100%);
    color: #fff;
    border-radius: 32px;
    padding: 0.5rem 2.5rem 0.5rem 2rem;
    display: inline-block;
    box-shadow: 0 4px 24px rgba(34,211,238,0.10);
    letter-spacing: 3px;
    text-shadow: 0 2px 8px rgba(22,163,74,0.10);
    border: 2px solid #16a34a;
    margin: 0 auto 1.5rem auto;
    font-size: 2rem;
    font-family: 'Segoe UI', Arial, sans-serif;
    font-weight: 700;
    transition: box-shadow 0.2s;
  }
  .arrival-title:hover {
    box-shadow: 0 8px 32px rgba(34,211,238,0.18);
    background: linear-gradient(90deg, #22d3ee 0%, #16a34a 100%);
    color: #fff;
  }

  .card {
    border-radius: 16px;
    border: 1px solid #e5e7eb;
    transition: box-shadow 0.2s, border-color 0.2s, transform 0.2s;
    box-shadow: 0 2px 8px rgba(30,41,59,0.06);
    overflow: hidden;
    background: #fff;
  }
  .card:hover {
    border-color: #a3a3a3;
    box-shadow: 0 6px 24px rgba(30,41,59,0.10);
    transform: translateY(-4px) scale(1.01);
    background: #f9fafb;
  }
  .card-img-top {
    border-radius: 16px 16px 0 0;
    box-shadow: none;
    background: #f3f4f6;
  }
  .card-title {
    color: #22223b;
    font-weight: 600;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
  }
  .card-text {
    font-size: 1rem;
    color: #444;
  }
  .card-footer {
    background: transparent;
    border: none;
  }
  .btn-success {
    background: #2563eb;
    border: none;
    font-weight: 500;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 8px rgba(37,99,235,0.08);
    transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
    padding: 0.5rem 1.2rem;
    border-radius: 12px;
    color: #fff;
  }
  .btn-success:hover {
    background: #1d4ed8;
    box-shadow: 0 4px 16px rgba(37,99,235,0.13);
    transform: scale(1.04);
    color: #fff;
  }
  .card-body {
    padding-bottom: 0.5rem;
  }
  @media (max-width: 767.98px) {
    .card {
      border-radius: 14px;
    }
    .card-img-top {
      border-radius: 14px 14px 0 0;
    }
    .btn-success {
      border-radius: 10px;
    }
  }
</style>
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    @foreach ($products as $p)
        <div class="col">
            <div class="card h-100 shadow-sm position-relative">
                <img src="{{ $p->image ? asset('storage/uploads/' . $p->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}" class="card-img-top" alt="{{ $p->name }}" style="height:200px; object-fit:cover;">
                <div class="card-body pb-2">
                    <h5 class="card-title mb-1">{{ $p->name }}</h5>
                    <p class="card-text mb-1 text-secondary" style="min-height:38px;">{{ $p->description ?? 'Sản phẩm Puma chính hãng, chất lượng cao, mẫu mã mới nhất.' }}</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-light text-dark border" style="font-size:0.95rem;">{{ $p->brand->name ?? 'Không rõ' }}</span>
                        <span class="text-muted small">SL: {{ $p->quantity ?? 'N/A' }}</span>
                    </div>
                    <p class="card-text text-danger fw-bold fs-5 mb-2">{{ number_format($p->price, 0, ',', '.') }} đ</p>
                </div>
                <div class="card-footer bg-white border-0 text-center pt-0">
<a href="{{ url('/detail-product/' . $p->id) }}" class="btn btn-success px-4 py-2">Xem chi tiết</a>                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
@endsection