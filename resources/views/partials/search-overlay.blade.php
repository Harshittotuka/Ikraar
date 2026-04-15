<div class="search-overlay" id="searchOverlay">
  <div class="search-overlay-header">
    <form id="searchOverlayForm" style="display:flex;flex:1;">
      <input type="text" placeholder="Search for kurtis, suits, collections..." aria-label="Search">
    </form>
    <button class="search-overlay-close" id="searchOverlayClose">Cancel</button>
  </div>
  <div class="search-trending">
    <h4>Trending Searches</h4>
    <div class="search-trending-tags">
      <a href="{{ route('shop') }}?search=chanderi">Chanderi Silk</a>
      <a href="{{ route('shop') }}?search=festive">Festive Wear</a>
      <a href="{{ route('shop') }}?search=cotton">Cotton Kurtis</a>
      <a href="{{ route('shop') }}?search=co-ord">Co-ord Sets</a>
      <a href="{{ route('shop') }}?search=chikankari">Chikankari</a>
      <a href="{{ route('shop') }}?search=block-print">Block Print</a>
      <a href="{{ route('shop') }}?search=wedding">Wedding Edit</a>
    </div>
  </div>
</div>
