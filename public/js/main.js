// ===== IKRAAR - Main JavaScript =====
// ===== With Cart Drawer, Product Quick View, Bottom Nav =====

document.addEventListener('DOMContentLoaded', () => {

  // ===== HEADER SCROLL EFFECT =====
  const header = document.getElementById('header');
  if (header) {
    window.addEventListener('scroll', () => {
      header.classList.toggle('scrolled', window.scrollY > 50);
    });
  }

  // ===== MOBILE NAV =====
  const menuToggle = document.getElementById('menuToggle');
  const mobileNav = document.getElementById('mobileNav');
  const mobileOverlay = document.getElementById('mobileOverlay');
  const mobileClose = document.getElementById('mobileClose');

  function openMobileNav() {
    mobileNav?.classList.add('open');
    mobileOverlay?.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileNav() {
    mobileNav?.classList.remove('open');
    mobileOverlay?.classList.remove('open');
    document.body.style.overflow = '';
  }

  menuToggle?.addEventListener('click', openMobileNav);
  mobileClose?.addEventListener('click', closeMobileNav);
  mobileOverlay?.addEventListener('click', closeMobileNav);

  // ===== CART STATE =====
  let cart = JSON.parse(localStorage.getItem('ikraar_cart') || '[]');

  function saveCart() {
    localStorage.setItem('ikraar_cart', JSON.stringify(cart));
    updateCartCounts();
    renderCartDrawer();
  }

  function updateCartCounts() {
    const total = cart.reduce((sum, item) => sum + item.qty, 0);
    document.querySelectorAll('.cart-count, .bottom-nav-cart-count').forEach(el => {
      el.textContent = total;
      el.style.display = total > 0 ? 'flex' : 'none';
    });
  }

  function addToCart(product) {
    const existing = cart.find(i => i.id === product.id && i.size === product.size && i.color === product.color);
    if (existing) {
      existing.qty = Math.min(existing.qty + 1, 10);
    } else {
      cart.push({ ...product, qty: 1 });
    }
    saveCart();
    openCartDrawer();
  }

  function removeFromCart(index) {
    cart.splice(index, 1);
    saveCart();
  }

  function updateCartQty(index, delta) {
    cart[index].qty = Math.max(1, Math.min(10, cart[index].qty + delta));
    saveCart();
  }

  function getCartSubtotal() {
    return cart.reduce((sum, item) => sum + item.price * item.qty, 0);
  }

  // ===== CART DRAWER =====
  const cartDrawer = document.getElementById('cartDrawer');
  const cartDrawerOverlay = document.getElementById('cartDrawerOverlay');

  function openCartDrawer() {
    cartDrawer?.classList.add('open');
    cartDrawerOverlay?.classList.add('open');
    document.body.style.overflow = 'hidden';
    renderCartDrawer();
  }

  function closeCartDrawer() {
    cartDrawer?.classList.remove('open');
    cartDrawerOverlay?.classList.remove('open');
    document.body.style.overflow = '';
  }

  cartDrawerOverlay?.addEventListener('click', closeCartDrawer);
  document.getElementById('cartDrawerClose')?.addEventListener('click', closeCartDrawer);

  // Desktop header cart icon → open drawer
  document.querySelectorAll('.cart-icon, [data-open-cart]').forEach(el => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
      openCartDrawer();
    });
  });

  function renderCartDrawer() {
    const body = document.getElementById('cartDrawerBody');
    const footer = document.getElementById('cartDrawerFooter');
    const countBadge = document.getElementById('cartDrawerCount');
    if (!body) return;

    const total = cart.reduce((sum, i) => sum + i.qty, 0);
    if (countBadge) countBadge.textContent = total;

    if (cart.length === 0) {
      body.innerHTML = `
        <div class="cart-drawer-empty">
          <i class="fas fa-shopping-bag"></i>
          <h4>Your bag is empty</h4>
          <p>Looks like you haven't added anything yet</p>
          <a href="shop.html" class="btn btn-primary btn-sm" onclick="closeCartDrawer()">Start Shopping</a>
        </div>`;
      if (footer) footer.style.display = 'none';
      return;
    }

    if (footer) footer.style.display = 'block';

    body.innerHTML = cart.map((item, i) => `
      <div class="cd-item">
        <div class="cd-item-img"><img src="${item.image}" alt="${item.name}"></div>
        <div class="cd-item-info">
          <div class="cd-item-name">${item.name}</div>
          <div class="cd-item-variant">${item.color || ''} ${item.size ? '| ' + item.size : ''}</div>
          <div class="cd-item-bottom">
            <div class="cd-item-price">\u20B9${(item.price * item.qty).toLocaleString('en-IN')}</div>
            <div class="cd-item-qty">
              <button data-cart-qty="${i}" data-delta="-1">\u2212</button>
              <span>${item.qty}</span>
              <button data-cart-qty="${i}" data-delta="1">+</button>
            </div>
          </div>
        </div>
        <button class="cd-item-remove" data-cart-remove="${i}" title="Remove"><i class="fas fa-times"></i></button>
      </div>
    `).join('');

    // Subtotal
    const subtotalEl = document.getElementById('cdSubtotal');
    if (subtotalEl) subtotalEl.textContent = `\u20B9${getCartSubtotal().toLocaleString('en-IN')}`;

    // Bind qty buttons
    body.querySelectorAll('[data-cart-qty]').forEach(btn => {
      btn.addEventListener('click', () => {
        updateCartQty(parseInt(btn.dataset.cartQty), parseInt(btn.dataset.delta));
      });
    });

    // Bind remove buttons
    body.querySelectorAll('[data-cart-remove]').forEach(btn => {
      btn.addEventListener('click', () => {
        removeFromCart(parseInt(btn.dataset.cartRemove));
      });
    });
  }

  // Init cart counts on load
  updateCartCounts();

  // ===== PRODUCT QUICK VIEW MODAL =====
  const pqvOverlay = document.getElementById('pqvOverlay');

  function openProductQuickView(productData) {
    if (!pqvOverlay) return;

    // Fill modal content
    document.getElementById('pqvMainImg').src = productData.images[0];
    document.getElementById('pqvBrand').textContent = 'IKRAAR';
    document.getElementById('pqvName').textContent = productData.name;
    document.getElementById('pqvCurrentPrice').textContent = `\u20B9${productData.price.toLocaleString('en-IN')}`;

    const origEl = document.getElementById('pqvOrigPrice');
    const offEl = document.getElementById('pqvOff');
    if (productData.originalPrice) {
      origEl.textContent = `\u20B9${productData.originalPrice.toLocaleString('en-IN')}`;
      origEl.style.display = '';
      const pct = Math.round((1 - productData.price / productData.originalPrice) * 100);
      offEl.textContent = `${pct}% OFF`;
      offEl.style.display = '';
    } else {
      origEl.style.display = 'none';
      offEl.style.display = 'none';
    }

    document.getElementById('pqvDesc').textContent = productData.desc || 'Handcrafted with care by skilled Indian artisans. Premium quality fabric with exquisite detailing.';
    document.getElementById('pqvViewFull').href = productData.href || 'product.html';

    // Thumbs
    const thumbsContainer = document.getElementById('pqvThumbs');
    thumbsContainer.innerHTML = productData.images.map((img, i) =>
      `<div class="pqv-thumb ${i === 0 ? 'active' : ''}" data-pqv-img="${img}"><img src="${img}" alt="Thumb ${i + 1}"></div>`
    ).join('');

    // Sizes
    const sizesContainer = document.getElementById('pqvSizes');
    const sizes = productData.sizes || ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
    sizesContainer.innerHTML = sizes.map((s, i) =>
      `<button class="pqv-size-btn ${i === 2 ? 'active' : ''} ${s === 'XXL' ? 'out' : ''}">${s}</button>`
    ).join('');

    // Colors
    const colorsContainer = document.getElementById('pqvColors');
    const colors = productData.colors || ['#7B2D42', '#1B4D3E', '#2C2C6C'];
    colorsContainer.innerHTML = colors.map((c, i) =>
      `<button class="pqv-color-btn ${i === 0 ? 'active' : ''}" style="background:${c}" title="${c}"></button>`
    ).join('');

    // Reviews
    const reviewsContainer = document.getElementById('pqvReviews');
    const reviews = productData.reviews || [
      { author: 'Priya M.', stars: 5, text: 'Absolutely gorgeous! The fabric quality is amazing and fits perfectly.', date: 'March 2026' },
      { author: 'Sneha R.', stars: 5, text: 'Got so many compliments wearing this. The detailing is exquisite!', date: 'February 2026' },
      { author: 'Amira K.', stars: 4, text: 'Beautiful piece. Recommend sizing up for a looser fit.', date: 'January 2026' }
    ];
    reviewsContainer.innerHTML = reviews.map(r => `
      <div class="pqv-review">
        <div class="pqv-review-head">
          <span class="pqv-review-author">${r.author}</span>
          <span class="pqv-review-stars">${'★'.repeat(r.stars)}${'☆'.repeat(5 - r.stars)}</span>
        </div>
        <p class="pqv-review-text">${r.text}</p>
        <p class="pqv-review-date">Verified Purchase — ${r.date}</p>
      </div>
    `).join('');

    // Store product data for add-to-cart
    pqvOverlay.dataset.product = JSON.stringify(productData);

    // Reset tabs
    pqvOverlay.querySelectorAll('.pqv-tab-header').forEach((t, i) => t.classList.toggle('active', i === 0));
    pqvOverlay.querySelectorAll('.pqv-tab-panel').forEach((p, i) => p.classList.toggle('active', i === 0));

    // Open
    pqvOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';

    // Bind thumb clicks
    thumbsContainer.querySelectorAll('.pqv-thumb').forEach(thumb => {
      thumb.addEventListener('click', () => {
        thumbsContainer.querySelectorAll('.pqv-thumb').forEach(t => t.classList.remove('active'));
        thumb.classList.add('active');
        document.getElementById('pqvMainImg').src = thumb.dataset.pqvImg;
      });
    });

    // Bind size clicks
    sizesContainer.querySelectorAll('.pqv-size-btn:not(.out)').forEach(btn => {
      btn.addEventListener('click', () => {
        sizesContainer.querySelectorAll('.pqv-size-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });

    // Bind color clicks
    colorsContainer.querySelectorAll('.pqv-color-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        colorsContainer.querySelectorAll('.pqv-color-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });
  }

  function closeProductQuickView() {
    pqvOverlay?.classList.remove('open');
    document.body.style.overflow = '';
  }

  document.getElementById('pqvClose')?.addEventListener('click', closeProductQuickView);
  pqvOverlay?.addEventListener('click', (e) => {
    if (e.target === pqvOverlay) closeProductQuickView();
  });

  // PQV tabs
  document.querySelectorAll('.pqv-tab-header').forEach(tab => {
    tab.addEventListener('click', () => {
      const parent = tab.closest('.pqv-tabs');
      parent.querySelectorAll('.pqv-tab-header').forEach(t => t.classList.remove('active'));
      parent.querySelectorAll('.pqv-tab-panel').forEach(p => p.classList.remove('active'));
      tab.classList.add('active');
      parent.querySelector(`[data-pqv-tab="${tab.dataset.pqvTabBtn}"]`)?.classList.add('active');
    });
  });

  // PQV Add to cart
  document.getElementById('pqvAddToCart')?.addEventListener('click', () => {
    const data = JSON.parse(pqvOverlay?.dataset.product || '{}');
    const selectedSize = pqvOverlay?.querySelector('.pqv-size-btn.active')?.textContent || 'M';
    addToCart({
      id: data.id || Date.now(),
      name: data.name,
      price: data.price,
      image: data.images?.[0],
      size: selectedSize,
      color: data.colorName || '',
      href: data.href || 'product.html'
    });
    closeProductQuickView();
  });

  // ===== BIND PRODUCT CARDS =====
  function extractProductData(card) {
    const name = card.querySelector('.product-name a')?.textContent?.trim() || card.querySelector('.product-name')?.textContent?.trim() || 'Ikraar Product';
    const priceText = card.querySelector('.price-current')?.textContent?.replace(/[^\d]/g, '') || '0';
    const origText = card.querySelector('.price-original')?.textContent?.replace(/[^\d]/g, '') || '';
    const img = card.querySelector('.product-img img')?.src || '';
    const href = card.querySelector('.product-name a')?.href || 'product.html';
    const colorDots = card.querySelectorAll('.color-dot');
    const colors = colorDots.length > 0
      ? Array.from(colorDots).map(d => d.style.background || d.style.backgroundColor)
      : ['#7B2D42', '#1B4D3E'];

    return {
      id: name.replace(/\s+/g, '-').toLowerCase(),
      name,
      price: parseInt(priceText) || 2499,
      originalPrice: origText ? parseInt(origText) : null,
      images: [img, img, img, img], // repeat for demo
      href,
      colors,
      desc: `Beautifully handcrafted ${name.toLowerCase()}. Made with premium fabrics by skilled Indian artisans. Features elegant detailing that blends traditional craft with modern design.`
    };
  }

  // Quick view buttons
  document.querySelectorAll('.quick-view').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      const card = btn.closest('.product-card');
      if (card) openProductQuickView(extractProductData(card));
    });
  });

  // Clicking on product image (not buttons) opens quick view
  document.querySelectorAll('.product-card .product-img').forEach(imgWrap => {
    imgWrap.addEventListener('click', (e) => {
      if (e.target.closest('.product-wishlist') || e.target.closest('.product-actions')) return;
      const card = imgWrap.closest('.product-card');
      if (card) openProductQuickView(extractProductData(card));
    });
  });

  // Product name click opens quick view
  document.querySelectorAll('.product-name a').forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const card = link.closest('.product-card');
      if (card) openProductQuickView(extractProductData(card));
    });
  });

  // ===== ADD TO CART BUTTONS =====
  document.querySelectorAll('.add-cart').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      const card = btn.closest('.product-card');
      if (!card) return;
      const data = extractProductData(card);
      addToCart({
        id: data.id,
        name: data.name,
        price: data.price,
        image: data.images[0],
        size: 'M',
        color: '',
        href: data.href
      });
      // Button feedback
      const originalText = btn.textContent;
      btn.textContent = 'Added!';
      btn.style.background = '#25D366';
      setTimeout(() => { btn.textContent = originalText; btn.style.background = ''; }, 1500);
    });
  });

  // Product detail page add-to-cart
  const addToCartBtn = document.getElementById('addToCartBtn');
  if (addToCartBtn) {
    addToCartBtn.addEventListener('click', () => {
      const name = document.querySelector('.product-detail-info h1')?.textContent || 'Ikraar Product';
      const priceText = document.querySelector('.product-detail-info .price-current')?.textContent?.replace(/[^\d]/g, '') || '0';
      const img = document.getElementById('mainImage')?.src || '';
      const size = document.querySelector('.size-btn.active')?.textContent || 'M';
      addToCart({
        id: name.replace(/\s+/g, '-').toLowerCase(),
        name,
        price: parseInt(priceText),
        image: img,
        size,
        color: '',
        href: window.location.href
      });
      addToCartBtn.textContent = 'Added to Bag!';
      addToCartBtn.style.background = '#25D366';
      setTimeout(() => { addToCartBtn.textContent = 'Add to Bag'; addToCartBtn.style.background = ''; }, 2000);
    });
  }

  // ===== HERO SLIDER =====
  const heroSlides = document.querySelectorAll('.hero-slide');
  const heroDots = document.querySelectorAll('.hero-dot');
  let currentSlide = 0;
  let heroInterval;

  function goToSlide(index) {
    heroSlides.forEach(s => s.classList.remove('active'));
    heroDots.forEach(d => d.classList.remove('active'));
    currentSlide = index;
    heroSlides[currentSlide]?.classList.add('active');
    heroDots[currentSlide]?.classList.add('active');
  }

  if (heroSlides.length > 1) {
    heroInterval = setInterval(() => goToSlide((currentSlide + 1) % heroSlides.length), 5000);
    heroDots.forEach(dot => {
      dot.addEventListener('click', () => {
        clearInterval(heroInterval);
        goToSlide(parseInt(dot.dataset.slide));
        heroInterval = setInterval(() => goToSlide((currentSlide + 1) % heroSlides.length), 5000);
      });
    });
  }

  // ===== TESTIMONIAL SLIDER =====
  const testimonials = document.querySelectorAll('.testimonial-item');
  const testimonialBtns = document.querySelectorAll('.testimonial-nav button');
  let currentTestimonial = 0;
  let testimonialInterval;

  function goToTestimonial(index) {
    testimonials.forEach(t => t.classList.remove('active'));
    testimonialBtns.forEach(b => b.classList.remove('active'));
    currentTestimonial = index;
    testimonials[currentTestimonial]?.classList.add('active');
    testimonialBtns[currentTestimonial]?.classList.add('active');
  }

  if (testimonials.length > 1) {
    testimonialInterval = setInterval(() => goToTestimonial((currentTestimonial + 1) % testimonials.length), 6000);
    testimonialBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        clearInterval(testimonialInterval);
        goToTestimonial(parseInt(btn.dataset.testimonial));
        testimonialInterval = setInterval(() => goToTestimonial((currentTestimonial + 1) % testimonials.length), 6000);
      });
    });
  }

  // ===== PRODUCT GALLERY (Product Detail Page) =====
  document.querySelectorAll('.gallery-thumb').forEach(thumb => {
    thumb.addEventListener('click', () => {
      document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
      const mainImage = document.getElementById('mainImage');
      if (mainImage && thumb.dataset.img) mainImage.src = thumb.dataset.img;
    });
  });

  // ===== PRODUCT TABS =====
  document.querySelectorAll('.tab-header').forEach(header => {
    header.addEventListener('click', () => {
      document.querySelectorAll('.tab-header').forEach(h => h.classList.remove('active'));
      document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
      header.classList.add('active');
      document.getElementById('tab-' + header.dataset.tab)?.classList.add('active');
    });
  });

  // ===== QUANTITY SELECTOR (Product Detail Page) =====
  document.querySelector('.qty-minus')?.addEventListener('click', () => {
    const input = document.getElementById('qty');
    if (input && parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
  });
  document.querySelector('.qty-plus')?.addEventListener('click', () => {
    const input = document.getElementById('qty');
    if (input && parseInt(input.value) < 10) input.value = parseInt(input.value) + 1;
  });

  // ===== CART PAGE QTY BUTTONS =====
  document.querySelectorAll('.cart-qty').forEach(qtyGroup => {
    const btns = qtyGroup.querySelectorAll('button');
    const input = qtyGroup.querySelector('input');
    btns[0]?.addEventListener('click', () => { if (parseInt(input.value) > 1) input.value = parseInt(input.value) - 1; });
    btns[1]?.addEventListener('click', () => { if (parseInt(input.value) < 10) input.value = parseInt(input.value) + 1; });
  });

  // ===== SIZE / COLOR SELECTORS (Product Detail Page) =====
  document.querySelectorAll('.size-btn:not(.disabled)').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.closest('.size-options')?.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  document.querySelectorAll('.color-opt').forEach(opt => {
    opt.addEventListener('click', () => {
      opt.closest('.color-options')?.querySelectorAll('.color-opt').forEach(o => o.classList.remove('active'));
      opt.classList.add('active');
    });
  });

  // ===== WISHLIST TOGGLE =====
  document.querySelectorAll('.product-wishlist, .wishlist-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      const icon = btn.querySelector('i');
      if (icon) { icon.classList.toggle('far'); icon.classList.toggle('fas'); btn.classList.toggle('active'); }
    });
  });

  // ===== FILTER TOGGLES =====
  document.querySelectorAll('.filter-color').forEach(c => c.addEventListener('click', () => c.classList.toggle('active')));

  document.querySelectorAll('.filter-group h4').forEach(h => {
    h.addEventListener('click', () => {
      const opts = h.nextElementSibling;
      const icon = h.querySelector('i');
      if (opts) {
        const hidden = opts.style.display === 'none';
        opts.style.display = hidden ? '' : 'none';
        if (icon) icon.style.transform = hidden ? '' : 'rotate(-90deg)';
      }
    });
  });

  // ===== FAQ TOGGLES =====
  document.querySelectorAll('.faq-toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
      const answer = toggle.nextElementSibling;
      const icon = toggle.querySelector('i');
      if (answer) {
        const isOpen = answer.style.display === 'block';
        answer.style.display = isOpen ? 'none' : 'block';
        if (icon) icon.className = isOpen ? 'fas fa-plus' : 'fas fa-minus';
      }
    });
  });

  // ===== BACK TO TOP =====
  const backToTop = document.getElementById('backToTop');
  if (backToTop) {
    window.addEventListener('scroll', () => backToTop.classList.toggle('visible', window.scrollY > 400));
    backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }

  // ===== SCROLL FADE-IN ANIMATIONS =====
  const fadeElements = document.querySelectorAll('.fade-in');
  if (fadeElements.length > 0) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) { entry.target.classList.add('visible'); observer.unobserve(entry.target); }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    fadeElements.forEach(el => observer.observe(el));
  }

  // ===== CART PAGE REMOVE =====
  document.querySelectorAll('.cart-remove').forEach(btn => {
    btn.addEventListener('click', () => {
      const row = btn.closest('tr');
      if (row) { row.style.opacity = '0'; row.style.transition = 'opacity 0.3s ease'; setTimeout(() => row.remove(), 300); }
    });
  });

  // ===== SEARCH OVERLAY =====
  const searchOverlay = document.getElementById('searchOverlay');

  document.querySelectorAll('[data-open-search]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      searchOverlay?.classList.add('open');
      document.body.style.overflow = 'hidden';
      setTimeout(() => searchOverlay?.querySelector('input')?.focus(), 300);
    });
  });

  document.getElementById('searchOverlayClose')?.addEventListener('click', () => {
    searchOverlay?.classList.remove('open');
    document.body.style.overflow = '';
  });

  // Search form
  document.getElementById('searchOverlayForm')?.addEventListener('submit', (e) => {
    e.preventDefault();
    const val = searchOverlay?.querySelector('input')?.value?.trim();
    if (val) window.location.href = 'shop.html?search=' + encodeURIComponent(val);
  });

  // Desktop search (header)
  const searchToggle = document.getElementById('searchToggle');
  if (searchToggle) {
    searchToggle.addEventListener('click', () => {
      if (searchOverlay) {
        searchOverlay.classList.add('open');
        document.body.style.overflow = 'hidden';
        setTimeout(() => searchOverlay.querySelector('input')?.focus(), 300);
      } else {
        const query = prompt('Search Ikraar:');
        if (query) window.location.href = 'shop.html?search=' + encodeURIComponent(query);
      }
    });
  }

  // ===== BOTTOM NAV ACTIVE STATE =====
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.bottom-nav-item').forEach(item => {
    const href = item.getAttribute('href');
    if (href && (href === currentPage || (currentPage === '' && href === 'index.html'))) {
      item.classList.add('active');
    }
  });

});
