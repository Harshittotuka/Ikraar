<header class="header" id="header">
  <div class="header-main">
    <div class="menu-toggle" id="menuToggle" aria-label="Open menu">
      <span></span><span></span><span></span>
    </div>

    <a href="{{ route('home') }}" class="logo">Ikr<span>aa</span>r</a>

    <nav class="nav-main">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
      <div class="nav-item">
        <a href="{{ route('shop') }}" class="{{ request()->routeIs('shop', 'product') ? 'active' : '' }}">Shop</a>
        <div class="dropdown">
          <a href="{{ route('shop') }}?cat=kurtis">Kurtis</a>
          <a href="{{ route('shop') }}?cat=suits">Suit Sets</a>
          <a href="{{ route('shop') }}?cat=co-ords">Co-ord Sets</a>
          <a href="{{ route('shop') }}?cat=dresses">Dresses</a>
          <a href="{{ route('shop') }}?cat=bottoms">Bottoms</a>
          <a href="{{ route('shop') }}?cat=dupattas">Dupattas</a>
        </div>
      </div>
      <a href="{{ route('collections') }}" class="{{ request()->routeIs('collections') ? 'active' : '' }}">Collections</a>
      <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Our Story</a>
      <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
    </nav>

    <div class="header-actions">
      <button aria-label="Search" id="searchToggle"><i class="fas fa-search"></i></button>
      <a href="#" aria-label="Wishlist"><i class="far fa-heart"></i></a>
      <a href="#" aria-label="Cart" class="cart-icon" data-open-cart>
        <i class="fas fa-shopping-bag"></i>
        <span class="cart-count" id="cartCount">0</span>
      </a>
    </div>
  </div>
</header>
