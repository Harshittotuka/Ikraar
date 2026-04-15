<div class="mobile-nav-overlay" id="mobileOverlay"></div>
<div class="mobile-nav" id="mobileNav">
  <div class="mobile-nav-header">
    <a href="{{ route('home') }}" class="logo">Ikr<span>aa</span>r</a>
    <button class="mobile-nav-close" id="mobileClose"><i class="fas fa-times"></i></button>
  </div>
  <div class="mobile-nav-links">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('shop') }}">Shop All</a>
    <a href="{{ route('shop') }}?cat=kurtis">Kurtis</a>
    <a href="{{ route('shop') }}?cat=suits">Suit Sets</a>
    <a href="{{ route('shop') }}?cat=co-ords">Co-ord Sets</a>
    <a href="{{ route('shop') }}?cat=dresses">Dresses</a>
    <a href="{{ route('collections') }}">Collections</a>
    <a href="{{ route('about') }}">Our Story</a>
    <a href="{{ route('contact') }}">Contact</a>
  </div>
</div>
