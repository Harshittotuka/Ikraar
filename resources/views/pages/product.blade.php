@extends('layouts.app')

@section('title', 'Chanderi Silk Straight Kurti - Ikraar')

@section('content')

  <section class="product-detail">
    <div class="container">
      <div class="product-detail-grid">

        {{-- Gallery --}}
        <div class="product-gallery">
          <div class="gallery-thumbs">
            @foreach(['photo-1614252369475-531eba835eb1','photo-1610030469983-98e550d6193c','photo-1583391733956-3750e0ff4e8b','photo-1594463750939-ebb28c3f7f75'] as $i => $img)
              <div class="gallery-thumb {{ $i === 0 ? 'active' : '' }}" data-img="https://images.unsplash.com/{{ $img }}?w=800&q=80">
                <img src="https://images.unsplash.com/{{ $img }}?w=100&q=80" alt="Thumb {{ $i + 1 }}">
              </div>
            @endforeach
          </div>
          <div class="gallery-main">
            <img src="https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=800&q=80" alt="Chanderi Silk Straight Kurti" id="mainImage">
          </div>
        </div>

        {{-- Info --}}
        <div class="product-detail-info">
          <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> <span>/</span>
            <a href="{{ route('shop') }}">Shop</a> <span>/</span>
            <a href="{{ route('shop') }}?cat=kurtis">Kurtis</a> <span>/</span>
            Chanderi Silk Straight Kurti
          </p>

          <p class="product-brand">IKRAAR</p>
          <h1>Chanderi Silk Straight Kurti</h1>

          <div class="product-price" style="margin-top:16px;">
            <span class="price-current">₹2,499</span>
            <span class="price-original">₹3,499</span>
            <span class="price-discount">(29% OFF)</span>
          </div>
          <p style="font-size:0.8rem;color:var(--text-muted);margin-top:4px;">Inclusive of all taxes</p>

          <p class="product-description-short" style="margin-top:20px;">
            Elevate your ethnic wardrobe with this stunning Chanderi silk straight kurti. Featuring delicate zari work on the neckline and sleeves, this piece combines the timeless beauty of Chanderi weaving with a modern silhouette. Perfect for festive occasions and elegant gatherings.
          </p>

          <div class="option-group">
            <span class="option-label">Color: <strong>Maroon</strong></span>
            <div class="color-options">
              <button class="color-opt active" style="background:#8B1A2B" title="Maroon"></button>
              <button class="color-opt" style="background:#1B4D3E" title="Emerald"></button>
              <button class="color-opt" style="background:#2C2C6C" title="Navy"></button>
            </div>
          </div>

          <div class="option-group">
            <span class="option-label">Size: <a href="#" style="font-weight:400;color:var(--primary);text-decoration:underline;text-transform:none;letter-spacing:0;">Size Guide</a></span>
            <div class="size-options">
              @foreach(['XS','S','M','L','XL','XXL'] as $size)
                <button class="size-btn {{ $size === 'M' ? 'active' : '' }} {{ $size === 'XXL' ? 'disabled' : '' }}">{{ $size }}</button>
              @endforeach
            </div>
          </div>

          <div class="add-to-cart-row">
            <div class="qty-selector">
              <button class="qty-minus">-</button>
              <input type="number" value="1" min="1" max="10" id="qty">
              <button class="qty-plus">+</button>
            </div>
            <button class="btn btn-primary btn-lg" id="addToCartBtn">Add to Bag</button>
            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
          </div>

          <div style="display:flex;gap:16px;margin-bottom:24px;">
            <button class="btn btn-gold btn-sm" style="flex:1;">Buy Now</button>
          </div>

          <div style="display:flex;gap:10px;align-items:center;padding:16px;background:var(--cream);border-radius:4px;margin-bottom:20px;">
            <i class="fas fa-truck" style="color:var(--primary);"></i>
            <input type="text" placeholder="Enter pincode for delivery info" style="flex:1;border:none;background:transparent;outline:none;font-size:0.85rem;">
            <button style="color:var(--primary);font-weight:600;font-size:0.82rem;text-transform:uppercase;letter-spacing:1px;">Check</button>
          </div>

          <div class="product-meta">
            <p class="meta-item"><span>SKU:</span> IKR-KUR-CS-001</p>
            <p class="meta-item"><span>Category:</span> Kurtis</p>
            <p class="meta-item"><span>Fabric:</span> Chanderi Silk</p>
            <p class="meta-item"><span>Tags:</span> Festive, Silk, Handcrafted, Zari Work</p>
          </div>

          <div style="display:flex;align-items:center;gap:16px;margin-top:20px;">
            <span style="font-size:0.82rem;font-weight:600;letter-spacing:1px;text-transform:uppercase;">Share:</span>
            @foreach(['facebook-f','twitter','pinterest-p','whatsapp'] as $social)
              <a href="#" style="color:var(--text-light);font-size:1.1rem;"><i class="fab fa-{{ $social }}"></i></a>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Tabs --}}
      <div class="product-tabs">
        <div class="tab-headers">
          <button class="tab-header active" data-tab="description">Description</button>
          <button class="tab-header" data-tab="details">Details & Care</button>
          <button class="tab-header" data-tab="shipping">Shipping & Returns</button>
          <button class="tab-header" data-tab="reviews">Reviews (24)</button>
        </div>

        <div class="tab-content active" id="tab-description">
          <p>The Chanderi Silk Straight Kurti is a testament to the rich weaving tradition of Chanderi, Madhya Pradesh. Made from authentic Chanderi silk, this kurti features intricate zari work along the neckline and sleeve hems, giving it a regal yet understated appeal.</p>
          <br>
          <p>The straight-cut silhouette offers a flattering fit that works beautifully for festive gatherings, pujas, and elegant dinners. Pair it with palazzo pants or churidar and statement jhumkas for a complete look.</p>
          <br>
          <p><strong>Key Features:</strong></p>
          <ul style="list-style:disc;padding-left:20px;margin-top:10px;">
            <li>Authentic Chanderi silk fabric with natural sheen</li>
            <li>Handcrafted zari work on neckline and sleeves</li>
            <li>Straight-cut silhouette with side slits</li>
            <li>Three-quarter sleeves</li>
            <li>Round neckline with button placket</li>
            <li>Knee-length design</li>
          </ul>
        </div>

        <div class="tab-content" id="tab-details">
          <table>
            @foreach(['Fabric'=>'Chanderi Silk','Work'=>'Zari Embroidery','Sleeve Length'=>'Three-Quarter','Neckline'=>'Round Neck','Length'=>'Knee Length (42 inches)','Fit'=>'Regular Fit','Occasion'=>'Festive, Party, Celebration','Wash Care'=>'Dry Clean Recommended'] as $label => $val)
              <tr><td>{{ $label }}</td><td>{{ $val }}</td></tr>
            @endforeach
          </table>
          <br>
          <p><strong>Care Instructions:</strong></p>
          <ul style="list-style:disc;padding-left:20px;margin-top:8px;">
            <li>Dry clean for best results</li>
            <li>If hand washing, use mild detergent in cold water</li>
            <li>Do not bleach or wring</li>
            <li>Iron on low heat from the reverse side</li>
            <li>Store in a cool, dry place away from direct sunlight</li>
          </ul>
        </div>

        <div class="tab-content" id="tab-shipping">
          <p><strong>Shipping:</strong></p>
          <ul style="list-style:disc;padding-left:20px;margin-top:8px;">
            <li>Free shipping on orders above ₹1,999</li>
            <li>Standard delivery: 5-7 business days</li>
            <li>Express delivery: 2-3 business days (₹199 extra)</li>
            <li>We ship across India and to select international locations</li>
          </ul>
          <br>
          <p><strong>Returns & Exchange:</strong></p>
          <ul style="list-style:disc;padding-left:20px;margin-top:8px;">
            <li>7-day easy returns from the date of delivery</li>
            <li>Product must be unused, unwashed with all tags intact</li>
            <li>Exchange available for size changes (subject to availability)</li>
            <li>Refund processed within 7-10 business days</li>
          </ul>
        </div>

        <div class="tab-content" id="tab-reviews">
          <div style="margin-bottom:32px;">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
              <div style="font-size:2rem;font-weight:700;color:var(--charcoal);">4.8</div>
              <div>
                <div style="color:var(--gold);font-size:1rem;">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
                <p style="font-size:0.82rem;color:var(--text-muted);">Based on 24 reviews</p>
              </div>
            </div>
          </div>
          @foreach([
            ['Priya M.', 5, 'Absolutely gorgeous kurti! The Chanderi silk has such a beautiful sheen and the zari work is impeccable. Fits perfectly true to size.', 'March 2026'],
            ['Sneha R.', 5, 'Wore this for Diwali celebrations and got so many compliments! The quality is premium, and the packaging was beautiful too.', 'February 2026'],
            ['Amira K.', 4, 'Beautiful piece, though I\'d recommend sizing up if you prefer a looser fit. The color is exactly as shown in the photos.', 'January 2026'],
          ] as $review)
            <div style="border-bottom:1px solid var(--border-light);padding-bottom:20px;margin-bottom:20px;">
              <div style="display:flex;justify-content:space-between;align-items:center;">
                <strong style="font-size:0.9rem;">{{ $review[0] }}</strong>
                <span style="color:var(--gold);">{!! str_repeat('&#9733;', $review[1]) . str_repeat('&#9734;', 5 - $review[1]) !!}</span>
              </div>
              <p style="font-size:0.85rem;color:var(--text-light);margin-top:8px;">{{ $review[2] }}</p>
              <span style="font-size:0.78rem;color:var(--text-muted);margin-top:6px;display:block;">Verified Purchase - {{ $review[3] }}</span>
            </div>
          @endforeach
        </div>
      </div>

      {{-- Related Products --}}
      <div style="margin-top:80px;">
        <h2 class="section-title">You May Also Like</h2>
        <div class="section-divider"></div>
        <div class="products-grid" style="margin-top:36px;">
          <x-product-card name="Embroidered Anarkali Suit Set" price="₹4,299" image="https://images.unsplash.com/photo-1610030469983-98e550d6193c?w=500&q=80" />
          <x-product-card name="Lucknowi Chikankari Kurti" price="₹3,299" original-price="₹4,299" discount="(23% OFF)" image="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=500&q=80" />
          <x-product-card name="Mirror Work Festive Kurti" price="₹2,899" image="https://images.unsplash.com/photo-1602810316693-3667c854239a?w=500&q=80" />
          <x-product-card name="Festive Sharara Set" price="₹3,599" original-price="₹5,499" discount="(35% OFF)" image="https://images.unsplash.com/photo-1594463750939-ebb28c3f7f75?w=500&q=80" />
        </div>
      </div>
    </div>
  </section>

@endsection
