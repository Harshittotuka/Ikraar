@extends('layouts.app')

@section('title', 'Contact Us - Ikraar')

@section('content')

  <x-page-header title="Get in Touch" :breadcrumbs="[['url' => route('home'), 'label' => 'Home'], ['label' => 'Contact']]" />

  <section class="contact-section">
    <div class="container">
      <div class="contact-grid">
        <div class="contact-form-wrapper">
          <h2>Send Us a Message</h2>
          <p>Have a question, feedback, or need styling advice? We'd love to hear from you.</p>
          <form class="contact-form" onsubmit="event.preventDefault(); alert('Thank you for your message! We will get back to you within 24 hours.');">
            <div class="form-row">
              <div class="form-group">
                <label for="firstName">First Name *</label>
                <input type="text" id="firstName" required placeholder="Your first name">
              </div>
              <div class="form-group">
                <label for="lastName">Last Name *</label>
                <input type="text" id="lastName" required placeholder="Your last name">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" required placeholder="your@email.com">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" placeholder="+91 98765 43210">
              </div>
            </div>
            <div class="form-group">
              <label for="subject">Subject *</label>
              <select id="subject" required>
                <option value="">Select a topic</option>
                @foreach(['Order Inquiry','Shipping & Delivery','Returns & Exchange','Product Information','Styling Advice','Wholesale / Bulk Orders','Collaboration / Press','Other'] as $opt)
                  <option>{{ $opt }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="message">Message *</label>
              <textarea id="message" rows="5" required placeholder="Tell us how we can help..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
          </form>
        </div>

        <div>
          <div class="contact-info-box">
            <h3>Contact Information</h3>
            @foreach([
              ['fas fa-map-marker-alt', 'Visit Us', "123 Fashion Street, Linking Road<br>Bandra West, Mumbai<br>Maharashtra 400050"],
              ['fas fa-phone', 'Call Us', "+91 98765 43210<br>Mon-Sat, 10am - 7pm IST"],
              ['fas fa-envelope', 'Email Us', "hello@ikraar.in<br>orders@ikraar.in"],
              ['fab fa-whatsapp', 'WhatsApp', "+91 98765 43210<br>Quick responses, styling help & more"],
            ] as $info)
              <div class="contact-detail">
                <i class="{{ $info[0] }}"></i>
                <div>
                  <h4>{{ $info[1] }}</h4>
                  <p>{!! $info[2] !!}</p>
                </div>
              </div>
            @endforeach
            <div style="margin-top:24px;">
              <h4 style="font-size:0.82rem;font-weight:600;letter-spacing:1px;text-transform:uppercase;margin-bottom:12px;">Follow Us</h4>
              <div class="footer-social">
                @foreach(['instagram','facebook-f','pinterest-p','youtube'] as $s)
                  <a href="#" style="border-color:var(--border);color:var(--text);"><i class="fab fa-{{ $s }}"></i></a>
                @endforeach
              </div>
            </div>
          </div>
          <div class="contact-map" style="margin-top:24px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.0526257080837!2d72.8311!3d19.0596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDAzJzM0LjYiTiA3MsKwNDknNTIuMCJF!5e0!3m2!1sen!2sin!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="padding:60px 0 80px;background:var(--cream);">
    <div class="container">
      <h2 class="section-title">Frequently Asked Questions</h2>
      <div class="section-divider"></div>
      <div style="max-width:800px;margin:36px auto 0;">
        @foreach([
          ['How long does shipping take?', 'Standard shipping takes 5-7 business days within India. Express delivery (2-3 business days) is available for ₹199. International orders typically take 10-15 business days.'],
          ['What is your return policy?', 'We offer a 7-day hassle-free return policy from the date of delivery. Products must be unused, unwashed, and with all tags intact.'],
          ['How do I find my right size?', 'Each product page has a detailed size guide. You can also reach out to us on WhatsApp for personalized sizing help.'],
          ['Do you offer customization?', 'Yes! For select pieces, we offer customization in terms of size, sleeve length, and sometimes color. Please reach out via email or WhatsApp.'],
          ['Do you ship internationally?', 'Yes, we ship to USA, UK, UAE, Canada, Singapore, Australia, and other select countries. Charges vary by location.'],
        ] as $i => $faq)
          <div style="{{ $i < 4 ? 'border-bottom:1px solid var(--border);' : '' }}padding:20px 0;">
            <h4 style="font-family:var(--font-body);font-size:0.95rem;cursor:pointer;display:flex;justify-content:space-between;align-items:center;" class="faq-toggle">
              {{ $faq[0] }}
              <i class="fas fa-plus" style="font-size:0.8rem;color:var(--text-muted);"></i>
            </h4>
            <div class="faq-answer" style="display:none;padding-top:12px;font-size:0.88rem;color:var(--text-light);line-height:1.7;">{{ $faq[1] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
