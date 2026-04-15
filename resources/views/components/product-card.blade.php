@props([
    'name',
    'price',
    'originalPrice' => null,
    'discount' => null,
    'image',
    'href' => null,
    'badge' => null,
    'badgeType' => 'new',
    'colors' => [],
])

<div class="product-card fade-in">
  <div class="product-img">
    @if($badge)
      <span class="product-badge badge-{{ $badgeType }}">{{ $badge }}</span>
    @endif
    <button class="product-wishlist" aria-label="Add to wishlist"><i class="far fa-heart"></i></button>
    <img src="{{ $image }}" alt="{{ $name }}">
    <div class="product-actions">
      <button class="add-cart">Add to Bag</button>
      <button class="quick-view">Quick View</button>
    </div>
  </div>
  <div class="product-info">
    <p class="product-brand">Ikraar</p>
    <h3 class="product-name"><a href="{{ $href ?? route('product') }}">{{ $name }}</a></h3>
    <div class="product-price">
      <span class="price-current">{{ $price }}</span>
      @if($originalPrice)
        <span class="price-original">{{ $originalPrice }}</span>
        @if($discount)
          <span class="price-discount">{{ $discount }}</span>
        @endif
      @endif
    </div>
    @if(count($colors))
      <div class="product-colors">
        @foreach($colors as $i => $color)
          <span class="color-dot {{ $i === 0 ? 'active' : '' }}" style="background:{{ $color['hex'] }}" title="{{ $color['name'] }}"></span>
        @endforeach
      </div>
    @endif
  </div>
</div>
