@extends('layouts.app')

@section('title', 'Ikraar - Premium Indian Ethnic Wear | Kurtis, Suits & More')

@section('content')

  {{-- Hero --}}
  <section class="hero">
    <div class="hero-slider">
      <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=1600&q=80')"></div>
      <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1610030469983-98e550d6193c?w=1600&q=80')"></div>
      <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1594463750939-ebb28c3f7f75?w=1600&q=80')"></div>
    </div>
    <div class="hero-content">
      <p class="tagline">The Art of Indian Elegance</p>
      <h1>Where Tradition <br>Meets Grace</h1>
      <div class="hero-ornament">
        <span></span><i class="fas fa-diamond"></i><span></span>
      </div>
      <p>Discover our handcrafted collection of kurtis, suits, and ethnic wear — designed for the modern Indian woman who celebrates her roots.</p>
      <div class="hero-btns">
        <a href="{{ route('shop') }}" class="btn btn-white">Shop Collection</a>
        <a href="{{ route('collections') }}" class="btn btn-outline" style="color:#fff;border-color:rgba(255,255,255,0.6);">New Arrivals</a>
      </div>
    </div>
    <div class="hero-dots">
      <button class="hero-dot active" data-slide="0"></button>
      <button class="hero-dot" data-slide="1"></button>
      <button class="hero-dot" data-slide="2"></button>
    </div>
  </section>

  {{-- Categories --}}
  <section class="category-strip">
    <div class="container">
      <h2 class="section-title">Shop by Category</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Curated collections for every occasion and style</p>
      <div class="category-grid">
        @foreach([
          ['Kurtis', 'kurtis', 'photo-1614252369475-531eba835eb1'],
          ['Suit Sets', 'suits', 'photo-1610030469983-98e550d6193c'],
          ['Co-ord Sets', 'co-ords', 'photo-1583391733956-3750e0ff4e8b'],
          ['Dresses', 'dresses', 'photo-1594463750939-ebb28c3f7f75'],
          ['Dupattas', 'dupattas', 'photo-1617627143750-d86bc21e42bb'],
        ] as $cat)
          <a href="{{ route('shop') }}?cat={{ $cat[1] }}" class="category-card fade-in">
            <div class="cat-img">
              <img src="https://images.unsplash.com/{{ $cat[2] }}?w=500&q=80" alt="{{ $cat[0] }}">
            </div>
            <h3>{{ $cat[0] }}</h3>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Bestsellers --}}
  <section class="featured-products">
    <div class="container">
      <h2 class="section-title">Bestsellers</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Our most loved pieces, handpicked for you</p>
      <div class="products-grid">
        <x-product-card name="Chanderi Silk Straight Kurti" price="₹2,499" original-price="₹3,499" discount="(29% OFF)" image="https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=500&q=80" badge="Bestseller" badge-type="bestseller" :colors="[['hex'=>'#8B1A2B','name'=>'Maroon'],['hex'=>'#1B4D3E','name'=>'Emerald'],['hex'=>'#2C2C6C','name'=>'Navy']]" />
        <x-product-card name="Embroidered Anarkali Suit Set" price="₹4,299" image="https://images.unsplash.com/photo-1610030469983-98e550d6193c?w=500&q=80" badge="New" badge-type="new" :colors="[['hex'=>'#D4A574','name'=>'Peach'],['hex'=>'#F5F5DC','name'=>'Ivory']]" />
        <x-product-card name="Block Print Cotton Kurti" price="₹1,799" original-price="₹2,299" discount="(22% OFF)" image="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=500&q=80" :colors="[['hex'=>'#4682B4','name'=>'Blue'],['hex'=>'#CD5C5C','name'=>'Coral'],['hex'=>'#228B22','name'=>'Green']]" />
        <x-product-card name="Festive Sharara Set" price="₹3,599" original-price="₹5,499" discount="(35% OFF)" image="https://images.unsplash.com/photo-1594463750939-ebb28c3f7f75?w=500&q=80" badge="Sale" badge-type="sale" :colors="[['hex'=>'#C4985A','name'=>'Gold'],['hex'=>'#8B1A2B','name'=>'Wine']]" />
        <x-product-card name="Linen A-Line Kurti" price="₹1,999" image="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?w=500&q=80" :colors="[['hex'=>'#F5F5DC','name'=>'Natural'],['hex'=>'#D2B48C','name'=>'Tan']]" />
        <x-product-card name="Mirror Work Festive Kurti" price="₹2,899" image="https://images.unsplash.com/photo-1602810316693-3667c854239a?w=500&q=80" badge="New" badge-type="new" :colors="[['hex'=>'#FF6347','name'=>'Red'],['hex'=>'#DAA520','name'=>'Mustard']]" />
        <x-product-card name="Lucknowi Chikankari Kurti" price="₹3,299" original-price="₹4,299" discount="(23% OFF)" image="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=500&q=80" />
        <x-product-card name="Printed Cotton Co-ord Set" price="₹2,199" image="https://images.unsplash.com/photo-1585487000160-6ebcfceb0d44?w=500&q=80" badge="Bestseller" badge-type="bestseller" :colors="[['hex'=>'#E8D5B7','name'=>'Beige'],['hex'=>'#87CEEB','name'=>'Sky Blue']]" />
      </div>
      <div style="text-align:center; margin-top:48px;">
        <a href="{{ route('shop') }}" class="btn btn-outline">View All Products</a>
      </div>
    </div>
  </section>

  {{-- Banners --}}
  <section class="banner-section">
    <div class="banner-grid">
      <a href="{{ route('collections') }}" class="banner-card" style="background-image: url('https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=900&q=80')">
        <div class="banner-card-content">
          <h2>Summer Edit '26</h2>
          <p>Breezy cottons and light linens for the season</p>
          <span class="btn btn-white btn-sm">Explore Now</span>
        </div>
      </a>
      <a href="{{ route('collections') }}" class="banner-card" style="background-image: url('https://images.unsplash.com/photo-1594463750939-ebb28c3f7f75?w=900&q=80')">
        <div class="banner-card-content">
          <h2>Festive Collection</h2>
          <p>Handcrafted pieces for your most special moments</p>
          <span class="btn btn-white btn-sm">Shop Now</span>
        </div>
      </a>
    </div>
  </section>

  {{-- Occasions --}}
  <section class="shop-occasion">
    <div class="container">
      <h2 class="section-title">Shop by Occasion</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Find the perfect outfit for every moment</p>
      <div class="occasion-grid">
        @foreach([
          ['Wedding', 'Bridal & Celebration Wear', 'wedding', 'photo-1594463750939-ebb28c3f7f75'],
          ['Festive', 'Diwali, Eid & Celebrations', 'festive', 'photo-1610030469983-98e550d6193c'],
          ['Everyday', 'Effortless Daily Wear', 'casual', 'photo-1614252369475-531eba835eb1'],
          ['Office', 'Elegant Workwear', 'office', 'photo-1617627143750-d86bc21e42bb'],
        ] as $occ)
          <a href="{{ route('shop') }}?occasion={{ $occ[2] }}" class="occasion-card fade-in">
            <img src="https://images.unsplash.com/{{ $occ[3] }}?w=500&q=80" alt="{{ $occ[0] }}">
            <div class="occasion-overlay">
              <h3>{{ $occ[0] }}</h3>
              <p>{{ $occ[1] }}</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Reels Strip --}}
  <div class="reels-strip">
    <div class="reels-strip-header">
      <div class="reels-strip-label">
        <i class="fab fa-instagram"></i>
        <span>Trending on @ikraar</span>
      </div>
      <a href="#" class="reels-strip-link">View all <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="reels-scroll">
      @foreach([
        ['5 Ways to Style Your Chanderi Kurti', 'fa-fire', 'Trending', '24K', '1.2K', 'photo-1614252369475-531eba835eb1'],
        ['Festive GRWM: Sharara Edition', 'fa-star', 'New', '18K', '980', 'photo-1594463750939-ebb28c3f7f75'],
        ['Behind the Craft: Loom to You', 'fa-hands', 'BTS', '31K', '2.1K', 'photo-1610030469983-98e550d6193c'],
        ['Ethnic Office Wear That Slays', 'fa-wand-magic-sparkles', 'Style', '15K', '780', 'photo-1583391733956-3750e0ff4e8b'],
        ['Real Customers, Real Stories', 'fa-heart', 'Love', '22K', '1.5K', 'photo-1602810316693-3667c854239a'],
        ['Summer Cotton Picks You Need', 'fa-sun', 'Summer', '12K', '640', 'photo-1617627143750-d86bc21e42bb'],
      ] as $reel)
        <div class="reel-card">
          <img src="https://images.unsplash.com/{{ $reel[5] }}?w=400&h=700&q=80&fit=crop" alt="{{ $reel[0] }}">
          <div class="reel-overlay">
            <div class="reel-top"><span class="reel-tag"><i class="fas {{ $reel[1] }}"></i> {{ $reel[2] }}</span></div>
            <div class="reel-bottom">
              <p class="reel-title">{{ $reel[0] }}</p>
              <div class="reel-meta">
                <span class="reel-views"><i class="fas fa-play"></i> {{ $reel[3] }}</span>
                <span class="reel-views"><i class="far fa-heart"></i> {{ $reel[4] }}</span>
              </div>
            </div>
          </div>
          <div class="reel-play"><i class="fas fa-play"></i></div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Craft Story --}}
  <section class="craft-story">
    <div class="container">
      <div class="craft-grid fade-in">
        <div class="craft-image">
          <img src="https://images.unsplash.com/photo-1602810316693-3667c854239a?w=800&q=80" alt="Artisan at work">
        </div>
        <div class="craft-text">
          <p class="tagline">Our Heritage</p>
          <h2>Crafted with Love, Worn with Pride</h2>
          <p>At Ikraar, every piece tells a story. We work directly with skilled artisans across India — from the chikankari masters of Lucknow to the block printers of Jaipur — preserving traditional crafts while creating designs for the modern woman.</p>
          <p>Each kurti, each stitch, each embroidery pattern carries generations of artistry. When you wear Ikraar, you wear a promise — a promise of quality, authenticity, and timeless elegance.</p>
          <a href="{{ route('about') }}" class="btn btn-outline">Read Our Story</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Testimonials --}}
  <section class="testimonials">
    <div class="container">
      <h2 class="section-title">What Our Customers Say</h2>
      <div class="section-divider"></div>
      <div class="testimonial-slider">
        @foreach([
          ['The quality of the fabrics is absolutely amazing. I ordered a Chanderi kurti and it\'s now my favourite piece. The attention to detail is remarkable — you can tell these are truly handcrafted.', 'Priya Sharma', 'Mumbai, India'],
          ['Ikraar has become my go-to brand for ethnic wear. The fit is perfect, the designs are elegant yet modern, and the customer service is exceptional. I\'ve already recommended it to all my friends!', 'Aisha Khan', 'Delhi, India'],
          ['I wore the festive sharara set to my cousin\'s wedding and received so many compliments. The embroidery work is exquisite. Worth every rupee — will definitely be ordering more!', 'Meera Patel', 'Ahmedabad, India'],
        ] as $i => $t)
          <div class="testimonial-item {{ $i === 0 ? 'active' : '' }}">
            <div class="testimonial-quote-mark">"</div>
            <div class="testimonial-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
            <p class="testimonial-text">{{ $t[0] }}</p>
            <p class="testimonial-author">{{ $t[1] }}</p>
            <p class="testimonial-location">{{ $t[2] }}</p>
          </div>
        @endforeach
      </div>
      <div class="testimonial-nav">
        @for($i = 0; $i < 3; $i++)
          <button class="{{ $i === 0 ? 'active' : '' }}" data-testimonial="{{ $i }}"></button>
        @endfor
      </div>
    </div>
  </section>

  {{-- Instagram --}}
  <section class="instagram-section">
    <div class="container">
      <h2 class="section-title">Follow Us @ikraar</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Tag us in your Ikraar looks and get featured</p>
    </div>
    <div class="insta-grid">
      @foreach(['photo-1614252369475-531eba835eb1','photo-1610030469983-98e550d6193c','photo-1583391733956-3750e0ff4e8b','photo-1594463750939-ebb28c3f7f75','photo-1602810316693-3667c854239a','photo-1617627143750-d86bc21e42bb'] as $img)
        <a href="#" class="insta-item"><img src="https://images.unsplash.com/{{ $img }}?w=400&q=80" alt="Instagram"></a>
      @endforeach
    </div>
  </section>

  {{-- Newsletter --}}
  <section class="newsletter">
    <div class="container">
      <h2>Join the Ikraar Family</h2>
      <div class="section-divider"></div>
      <p>Subscribe for early access to new collections, exclusive offers & styling inspiration</p>
      <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
        <input type="email" placeholder="Enter your email address" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </section>

  {{-- Features --}}
  <section class="features-bar">
    <div class="container">
      <div class="features-grid">
        @foreach([
          ['fa-truck', 'Free Shipping', 'On orders above ₹1,999'],
          ['fa-undo', 'Easy Returns', '7-day hassle-free returns'],
          ['fa-gem', 'Authentic Craft', 'Handcrafted by skilled artisans'],
          ['fa-lock', 'Secure Payment', '100% secure checkout'],
        ] as $feat)
          <div class="feature-item fade-in">
            <i class="fas {{ $feat[0] }}"></i>
            <h4>{{ $feat[1] }}</h4>
            <p>{{ $feat[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
