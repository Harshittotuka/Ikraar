<nav class="bottom-nav">
  <div class="bottom-nav-grid">
    <a href="{{ route('home') }}" class="bottom-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
      <i class="fas fa-home"></i>
      <span>Home</span>
    </a>
    <a href="{{ route('shop') }}" class="bottom-nav-item {{ request()->routeIs('shop') ? 'active' : '' }}">
      <i class="fas fa-th-large"></i>
      <span>Shop</span>
    </a>
    <a href="#" class="bottom-nav-item" data-open-search>
      <i class="fas fa-search"></i>
      <span>Search</span>
    </a>
    <a href="#" class="bottom-nav-item">
      <i class="far fa-heart"></i>
      <span>Wishlist</span>
    </a>
    <a href="#" class="bottom-nav-item" data-open-cart>
      <i class="fas fa-shopping-bag"></i>
      <span class="bottom-nav-badge bottom-nav-cart-count" style="display:none;">0</span>
      <span>Bag</span>
    </a>
  </div>
</nav>
