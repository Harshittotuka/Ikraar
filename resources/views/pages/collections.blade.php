@extends('layouts.app')

@section('title', 'Collections - Ikraar | Curated Ethnic Wear Collections')

@section('content')

  <x-page-header title="Our Collections" :breadcrumbs="[['url' => route('home'), 'label' => 'Home'], ['label' => 'Collections']]" />

  {{-- Featured Banner --}}
  <section class="banner-section">
    <div class="banner-grid" style="grid-template-columns:1fr;">
      <a href="{{ route('shop') }}" class="banner-card" style="background-image: url('https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=1600&q=80'); min-height:450px;">
        <div class="banner-card-content">
          <p style="font-size:0.8rem;letter-spacing:3px;text-transform:uppercase;margin-bottom:12px;color:var(--gold-light);">New Season</p>
          <h2 style="font-size:2.6rem;">Summer Edit 2026</h2>
          <p>Light fabrics, breezy silhouettes, and vibrant prints for the warm days ahead</p>
          <span class="btn btn-white">Explore Collection</span>
        </div>
      </a>
    </div>
  </section>

  {{-- Collections Grid --}}
  <section style="padding:60px 0 80px;">
    <div class="container">
      <h2 class="section-title">Explore Collections</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">Each collection tells a unique story of Indian craftsmanship</p>
      <div class="collections-grid">
        @foreach([
          ['Chanderi Dreams', 'Sheer elegance in handwoven Chanderi silk', 'chanderi', 'photo-1614252369475-531eba835eb1'],
          ['Festive Luxe', 'Opulent pieces for celebrations & ceremonies', 'festive', 'photo-1594463750939-ebb28c3f7f75'],
          ['Everyday Elegance', 'Comfortable yet chic looks for daily wear', 'everyday', 'photo-1617627143750-d86bc21e42bb'],
          ['Block Print Stories', 'Hand-stamped artistry from Rajasthan\'s finest', 'block-print', 'photo-1583391733956-3750e0ff4e8b'],
          ['Lucknowi Heritage', 'Exquisite chikankari embroidery from Lucknow', 'chikankari', 'photo-1599643478518-a784e5dc4c8f'],
          ['Bridal Edit', 'For your most special day and the days around it', 'bridal', 'photo-1610030469983-98e550d6193c'],
        ] as $col)
          <a href="{{ route('shop') }}?collection={{ $col[2] }}" class="collection-card fade-in">
            <img src="https://images.unsplash.com/{{ $col[3] }}?w=600&q=80" alt="{{ $col[0] }}">
            <div class="collection-overlay">
              <h3>{{ $col[0] }}</h3>
              <p>{{ $col[1] }}</p>
              <span class="btn btn-white btn-sm">Shop Now</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Craft Banner --}}
  <section class="craft-story">
    <div class="container">
      <div class="craft-grid fade-in">
        <div class="craft-image">
          <img src="https://images.unsplash.com/photo-1602810316693-3667c854239a?w=800&q=80" alt="Artisan crafting">
        </div>
        <div class="craft-text">
          <p class="tagline">Behind the Craft</p>
          <h2>From Loom to You</h2>
          <p>Every Ikraar collection begins with a journey — to the looms of Chanderi, the workshops of Lucknow, the printing blocks of Jaipur. We work hand-in-hand with artisan communities to bring you pieces that honor centuries of tradition.</p>
          <p>When you choose Ikraar, you're not just wearing a garment — you're supporting a livelihood, preserving a craft, and carrying forward a legacy.</p>
          <a href="{{ route('about') }}" class="btn btn-outline">Our Artisan Story</a>
        </div>
      </div>
    </div>
  </section>

  <section class="newsletter">
    <div class="container">
      <h2>Be the First to Know</h2>
      <div class="section-divider"></div>
      <p>Get early access to new collections and exclusive offers</p>
      <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
        <input type="email" placeholder="Enter your email address" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </section>

@endsection
