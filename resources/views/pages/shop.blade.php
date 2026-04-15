@extends('layouts.app')

@section('title', 'Shop - Ikraar | Kurtis, Suits & Ethnic Wear')
@section('meta_description', 'Shop Ikraar\'s collection of handcrafted kurtis, suit sets, co-ord sets and ethnic wear.')

@section('content')

  <x-page-header title="Shop All" :breadcrumbs="[['url' => route('home'), 'label' => 'Home'], ['label' => 'Shop']]" />

  <section class="shop-section">
    <div class="container">
      <div class="shop-layout">

        {{-- Filters --}}
        <aside class="filters-sidebar">
          <div class="filter-group">
            <h4>Category <i class="fas fa-chevron-down"></i></h4>
            <div class="filter-options">
              @foreach(['Kurtis' => 42, 'Suit Sets' => 28, 'Co-ord Sets' => 18, 'Dresses' => 15, 'Bottoms' => 22, 'Dupattas' => 12] as $cat => $count)
                <label><input type="checkbox"> {{ $cat }} <span style="color:var(--text-muted);margin-left:auto;">({{ $count }})</span></label>
              @endforeach
            </div>
          </div>
          <div class="filter-group">
            <h4>Size <i class="fas fa-chevron-down"></i></h4>
            <div class="filter-options">
              @foreach(['XS','S','M','L','XL','XXL'] as $size)
                <label><input type="checkbox"> {{ $size }}</label>
              @endforeach
            </div>
          </div>
          <div class="filter-group">
            <h4>Color <i class="fas fa-chevron-down"></i></h4>
            <div class="filter-colors">
              @foreach(['#8B1A2B'=>'Maroon','#1B4D3E'=>'Green','#2C2C6C'=>'Navy','#C4985A'=>'Gold','#F5F5DC'=>'Ivory','#FF6347'=>'Red','#FFC0CB'=>'Pink','#87CEEB'=>'Blue','#DAA520'=>'Mustard','#000'=>'Black'] as $hex => $name)
                <span class="filter-color" style="background:{{ $hex }}" title="{{ $name }}"></span>
              @endforeach
              <span class="filter-color" style="background:#fff;border:1px solid #ddd" title="White"></span>
            </div>
          </div>
          <div class="filter-group">
            <h4>Price <i class="fas fa-chevron-down"></i></h4>
            <div class="filter-options">
              @foreach(['Under ₹1,000','₹1,000 - ₹2,000','₹2,000 - ₹3,500','₹3,500 - ₹5,000','Above ₹5,000'] as $range)
                <label><input type="checkbox"> {{ $range }}</label>
              @endforeach
            </div>
          </div>
          <div class="filter-group">
            <h4>Fabric <i class="fas fa-chevron-down"></i></h4>
            <div class="filter-options">
              @foreach(['Cotton','Silk','Chanderi','Linen','Rayon','Georgette'] as $fab)
                <label><input type="checkbox"> {{ $fab }}</label>
              @endforeach
            </div>
          </div>
          <div class="filter-group">
            <h4>Occasion <i class="fas fa-chevron-down"></i></h4>
            <div class="filter-options">
              @foreach(['Casual','Festive','Wedding','Office','Party'] as $occ)
                <label><input type="checkbox"> {{ $occ }}</label>
              @endforeach
            </div>
          </div>
        </aside>

        {{-- Products --}}
        <div class="shop-products">
          <div class="shop-toolbar">
            <span class="shop-count">Showing 1-12 of 137 products</span>
            <div style="display:flex;align-items:center;gap:20px;">
              <div class="shop-sort">
                <label>Sort by:</label>
                <select>
                  <option>Recommended</option>
                  <option>New Arrivals</option>
                  <option>Price: Low to High</option>
                  <option>Price: High to Low</option>
                  <option>Bestselling</option>
                </select>
              </div>
              <div class="shop-view">
                <button class="active"><i class="fas fa-th"></i></button>
                <button><i class="fas fa-list"></i></button>
              </div>
            </div>
          </div>

          <div class="products-grid">
            <x-product-card name="Chanderi Silk Straight Kurti" price="₹2,499" original-price="₹3,499" discount="(29% OFF)" image="https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=500&q=80" badge="Bestseller" badge-type="bestseller" />
            <x-product-card name="Embroidered Anarkali Suit Set" price="₹4,299" image="https://images.unsplash.com/photo-1610030469983-98e550d6193c?w=500&q=80" badge="New" badge-type="new" />
            <x-product-card name="Block Print Cotton Kurti" price="₹1,799" original-price="₹2,299" discount="(22% OFF)" image="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=500&q=80" />
            <x-product-card name="Festive Sharara Set" price="₹3,599" original-price="₹5,499" discount="(35% OFF)" image="https://images.unsplash.com/photo-1594463750939-ebb28c3f7f75?w=500&q=80" badge="Sale" badge-type="sale" />
            <x-product-card name="Linen A-Line Kurti" price="₹1,999" image="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?w=500&q=80" />
            <x-product-card name="Mirror Work Festive Kurti" price="₹2,899" image="https://images.unsplash.com/photo-1602810316693-3667c854239a?w=500&q=80" badge="New" badge-type="new" />
            <x-product-card name="Lucknowi Chikankari Kurti" price="₹3,299" original-price="₹4,299" discount="(23% OFF)" image="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=500&q=80" />
            <x-product-card name="Printed Cotton Co-ord Set" price="₹2,199" image="https://images.unsplash.com/photo-1585487000160-6ebcfceb0d44?w=500&q=80" badge="Bestseller" badge-type="bestseller" />
            <x-product-card name="Palazzo Suit Set with Dupatta" price="₹3,899" image="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=500&q=80" />
            <x-product-card name="Kalamkari Print A-Line Kurti" price="₹1,499" original-price="₹2,199" discount="(32% OFF)" image="https://images.unsplash.com/photo-1610030469983-98e550d6193c?w=500&q=80" badge="Sale" badge-type="sale" />
            <x-product-card name="Embroidered Maxi Dress" price="₹4,599" image="https://images.unsplash.com/photo-1594463750939-ebb28c3f7f75?w=500&q=80" />
            <x-product-card name="Handloom Cotton Kurti" price="₹1,699" image="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?w=500&q=80" />
          </div>

          <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">12</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
