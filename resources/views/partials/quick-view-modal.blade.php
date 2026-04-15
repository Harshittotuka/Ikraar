<div class="pqv-overlay" id="pqvOverlay">
  <div class="pqv-modal">
    <button class="pqv-close" id="pqvClose"><i class="fas fa-times"></i></button>
    <div class="pqv-content-wrapper">
      <div class="pqv-gallery">
        <img class="pqv-main-img" id="pqvMainImg" src="" alt="Product">
        <div class="pqv-thumbs" id="pqvThumbs"></div>
      </div>
      <div class="pqv-info">
        <p class="pqv-brand" id="pqvBrand">IKRAAR</p>
        <h2 class="pqv-name" id="pqvName"></h2>
        <div class="pqv-rating">
          <span class="pqv-rating-stars">★★★★★</span>
          <span class="pqv-rating-text">4.8 (24 reviews)</span>
        </div>
        <div class="pqv-price">
          <span class="pqv-price-current" id="pqvCurrentPrice"></span>
          <span class="pqv-price-original" id="pqvOrigPrice"></span>
          <span class="pqv-price-off" id="pqvOff"></span>
        </div>
        <p class="pqv-desc" id="pqvDesc"></p>

        <p class="pqv-section-title">Size</p>
        <div class="pqv-sizes" id="pqvSizes"></div>

        <p class="pqv-section-title">Color</p>
        <div class="pqv-colors" id="pqvColors"></div>

        <div class="pqv-delivery">
          <i class="fas fa-truck"></i>
          <span><strong>Delivery:</strong> 5-7 business days &nbsp;|&nbsp; Free shipping above ₹1,999</span>
        </div>

        <div class="pqv-actions">
          <button class="pqv-add-btn" id="pqvAddToCart">Add to Bag</button>
          <button class="pqv-wish-btn"><i class="far fa-heart"></i></button>
        </div>
        <a href="{{ route('product') }}" class="pqv-viewfull" id="pqvViewFull">View Full Details →</a>

        <div class="pqv-tabs">
          <div class="pqv-tab-headers">
            <button class="pqv-tab-header active" data-pqv-tab-btn="desc">Details</button>
            <button class="pqv-tab-header" data-pqv-tab-btn="care">Care</button>
            <button class="pqv-tab-header" data-pqv-tab-btn="reviews">Reviews</button>
          </div>
          <div class="pqv-tab-body">
            <div class="pqv-tab-panel active" data-pqv-tab="desc">
              <ul style="list-style:disc;padding-left:18px;display:flex;flex-direction:column;gap:6px;">
                <li>Premium handcrafted fabric</li>
                <li>Intricate traditional detailing</li>
                <li>Comfortable regular fit</li>
                <li>Three-quarter sleeves</li>
                <li>Knee-length design with side slits</li>
              </ul>
            </div>
            <div class="pqv-tab-panel" data-pqv-tab="care">
              <ul style="list-style:disc;padding-left:18px;display:flex;flex-direction:column;gap:6px;">
                <li>Dry clean recommended</li>
                <li>Hand wash in cold water with mild detergent</li>
                <li>Do not bleach or wring</li>
                <li>Iron on low heat from reverse side</li>
                <li>Store in cool, dry place</li>
              </ul>
            </div>
            <div class="pqv-tab-panel" data-pqv-tab="reviews" id="pqvReviews"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
