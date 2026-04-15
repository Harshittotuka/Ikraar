<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="{{ route('home') }}" class="logo">Ikr<span>aa</span>r</a>
        <p>Celebrating the art of Indian craftsmanship. Handcrafted ethnic wear designed for the modern woman who embraces tradition with elegance.</p>
        <div class="footer-social">
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
          <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Shop</h4>
        <a href="{{ route('shop') }}?cat=kurtis">Kurtis</a>
        <a href="{{ route('shop') }}?cat=suits">Suit Sets</a>
        <a href="{{ route('shop') }}?cat=co-ords">Co-ord Sets</a>
        <a href="{{ route('shop') }}?cat=dresses">Dresses</a>
        <a href="{{ route('shop') }}?cat=bottoms">Bottoms</a>
        <a href="{{ route('shop') }}?cat=dupattas">Dupattas</a>
      </div>
      <div class="footer-col">
        <h4>Company</h4>
        <a href="{{ route('about') }}">Our Story</a>
        <a href="#">Artisan Partners</a>
        <a href="#">Sustainability</a>
        <a href="#">Careers</a>
        <a href="{{ route('contact') }}">Contact Us</a>
      </div>
      <div class="footer-col">
        <h4>Help</h4>
        <a href="#">Shipping Info</a>
        <a href="#">Returns & Exchange</a>
        <a href="#">Size Guide</a>
        <a href="#">Track Order</a>
        <a href="#">FAQs</a>
      </div>
      <div class="footer-col">
        <h4>Contact Us</h4>
        <div class="footer-contact-item">
          <i class="fas fa-map-marker-alt"></i>
          <span>123 Fashion Street, Mumbai, Maharashtra 400001</span>
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-phone"></i>
          <span>+91 98765 43210</span>
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-envelope"></i>
          <span>hello@ikraar.in</span>
        </div>
        <div class="footer-contact-item">
          <i class="fab fa-whatsapp"></i>
          <span>+91 98765 43210</span>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; {{ date('Y') }} Ikraar. All rights reserved.</p>
      <div class="footer-payments">
        <i class="fab fa-cc-visa"></i>
        <i class="fab fa-cc-mastercard"></i>
        <i class="fab fa-cc-amex"></i>
        <i class="fab fa-google-pay"></i>
        <i class="fab fa-cc-paypal"></i>
      </div>
    </div>
  </div>
</footer>
