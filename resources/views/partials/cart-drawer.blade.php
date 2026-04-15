<div class="cart-drawer-overlay" id="cartDrawerOverlay"></div>
<div class="cart-drawer" id="cartDrawer">
  <div class="cart-drawer-header">
    <h3>Shopping Bag <span id="cartDrawerCount">0</span></h3>
    <button class="cart-drawer-close" id="cartDrawerClose"><i class="fas fa-times"></i></button>
  </div>
  <div class="cart-drawer-body" id="cartDrawerBody">
    <div class="cart-drawer-empty">
      <i class="fas fa-shopping-bag"></i>
      <h4>Your bag is empty</h4>
      <p>Looks like you haven't added anything yet</p>
      <a href="{{ route('shop') }}" class="btn btn-primary btn-sm">Start Shopping</a>
    </div>
  </div>
  <div class="cart-drawer-footer" id="cartDrawerFooter" style="display:none;">
    <div class="cd-subtotal">
      <span>Subtotal</span>
      <span class="cd-subtotal-amount" id="cdSubtotal">₹0</span>
    </div>
    <p class="cd-shipping-note">Shipping & taxes calculated at checkout</p>
    <a href="#" class="cd-checkout-btn">Checkout</a>
    <a href="{{ route('cart') }}" class="cd-viewcart-btn">View Full Cart</a>
  </div>
</div>
