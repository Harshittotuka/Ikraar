@extends('layouts.app')

@section('title', 'Shopping Bag - Ikraar')

@section('content')

  <x-page-header title="Shopping Bag" :breadcrumbs="[['url' => route('home'), 'label' => 'Home'], ['label' => 'Cart']]" />

  <section class="cart-section">
    <div class="container">
      <div class="cart-layout">
        <div>
          <table class="cart-table">
            <thead>
              <tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th></th></tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="cart-product">
                    <div class="cart-product-img"><img src="https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=200&q=80" alt="Chanderi Silk Kurti"></div>
                    <div class="cart-product-info"><h4><a href="{{ route('product') }}">Chanderi Silk Straight Kurti</a></h4><p>Color: Maroon | Size: M</p></div>
                  </div>
                </td>
                <td><span class="price-current">₹2,499</span></td>
                <td><div class="cart-qty"><button>-</button><input type="number" value="1" min="1"><button>+</button></div></td>
                <td><strong>₹2,499</strong></td>
                <td><button class="cart-remove" title="Remove"><i class="fas fa-times"></i></button></td>
              </tr>
              <tr>
                <td>
                  <div class="cart-product">
                    <div class="cart-product-img"><img src="https://images.unsplash.com/photo-1594463750939-ebb28c3f7f75?w=200&q=80" alt="Festive Sharara"></div>
                    <div class="cart-product-info"><h4><a href="{{ route('product') }}">Festive Sharara Set</a></h4><p>Color: Gold | Size: S</p></div>
                  </div>
                </td>
                <td><span class="price-current">₹3,599</span><span class="price-original" style="display:block;">₹5,499</span></td>
                <td><div class="cart-qty"><button>-</button><input type="number" value="1" min="1"><button>+</button></div></td>
                <td><strong>₹3,599</strong></td>
                <td><button class="cart-remove" title="Remove"><i class="fas fa-times"></i></button></td>
              </tr>
            </tbody>
          </table>
          <div style="display:flex;justify-content:space-between;margin-top:24px;flex-wrap:wrap;gap:12px;">
            <a href="{{ route('shop') }}" class="btn btn-outline btn-sm"><i class="fas fa-arrow-left" style="margin-right:8px;"></i> Continue Shopping</a>
          </div>
        </div>

        <div class="cart-summary">
          <h3>Order Summary</h3>
          <div class="summary-row"><span>Subtotal (2 items)</span><span>₹6,098</span></div>
          <div class="summary-row"><span>Shipping</span><span style="color:var(--primary);font-weight:500;">FREE</span></div>
          <div class="summary-row"><span>Tax (GST)</span><span>₹305</span></div>
          <div class="summary-row total"><span>Total</span><span>₹6,403</span></div>
          <button class="btn btn-primary" onclick="alert('Redirecting to checkout...')">Proceed to Checkout</button>
          <div class="cart-coupon"><input type="text" placeholder="Coupon code"><button>Apply</button></div>
          <div style="margin-top:24px;padding-top:20px;border-top:1px solid var(--border);">
            @foreach([['fa-truck','Free shipping on orders above ₹1,999'],['fa-undo','7-day easy returns'],['fa-lock','100% secure checkout']] as $perk)
              <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;font-size:0.82rem;color:var(--text-light);">
                <i class="fas {{ $perk[0] }}" style="color:var(--primary);"></i> {{ $perk[1] }}
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div style="margin-top:80px;">
        <h2 class="section-title">Complete Your Look</h2>
        <div class="section-divider"></div>
        <div class="products-grid" style="margin-top:36px;">
          <x-product-card name="Linen A-Line Kurti" price="₹1,999" image="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?w=500&q=80" />
          <x-product-card name="Printed Cotton Co-ord Set" price="₹2,199" image="https://images.unsplash.com/photo-1585487000160-6ebcfceb0d44?w=500&q=80" />
          <x-product-card name="Mirror Work Festive Kurti" price="₹2,899" image="https://images.unsplash.com/photo-1602810316693-3667c854239a?w=500&q=80" />
          <x-product-card name="Lucknowi Chikankari Kurti" price="₹3,299" original-price="₹4,299" image="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=500&q=80" />
        </div>
      </div>
    </div>
  </section>

@endsection
