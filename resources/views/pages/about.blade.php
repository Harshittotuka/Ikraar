@extends('layouts.app')

@section('title', 'Our Story - Ikraar | Handcrafted Indian Ethnic Wear')

@section('content')

  <section class="about-hero">
    <div>
      <p style="font-size:0.8rem;letter-spacing:3px;text-transform:uppercase;margin-bottom:12px;color:var(--gold-light);">Our Story</p>
      <h1>Ikraar — A Promise of Elegance</h1>
      <p>Born from a love for Indian craft and a desire to make artisanal fashion accessible, Ikraar is more than a clothing brand — it's a promise. A promise of quality, authenticity, and timeless beauty.</p>
    </div>
  </section>

  <section class="about-section">
    <div class="container">
      <div class="about-grid fade-in">
        <div class="about-image"><img src="https://images.unsplash.com/photo-1602810316693-3667c854239a?w=800&q=80" alt="Artisan weaving"></div>
        <div class="about-text">
          <h2>Where It All Began</h2>
          <p>Ikraar was born from a simple observation: the incredible artisans of India — weavers, embroiderers, block printers — were creating masterpieces, but their work rarely reached the women who would truly appreciate them.</p>
          <p>We set out to bridge that gap. To bring the magic of Chanderi looms, the delicacy of Lucknowi chikankari, and the vibrancy of Jaipuri block prints directly to the modern Indian woman.</p>
          <p>The name "Ikraar" means promise — and that's exactly what we are. A promise that every piece you wear carries the soul of an artisan, the warmth of tradition, and the confidence of contemporary design.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="about-section" style="background:var(--cream);">
    <div class="container">
      <div class="about-grid reverse fade-in">
        <div class="about-image"><img src="https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=800&q=80" alt="Ikraar garments"></div>
        <div class="about-text">
          <h2>Our Mission</h2>
          <p>We believe that fashion should tell stories. Every Ikraar garment is a canvas for India's textile heritage — from hand-spun fabrics to intricate hand-embroidery, each piece takes days (sometimes weeks) to craft.</p>
          <p>We work directly with artisan clusters across India, ensuring fair wages, sustainable practices, and creative freedom. Our designs blend traditional techniques with modern silhouettes.</p>
          <p>Ikraar isn't just about looking beautiful — it's about feeling connected to something larger. To a craft, to a community, to a culture.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="about-section">
    <div class="container">
      <h2 class="section-title">What We Stand For</h2>
      <div class="section-divider"></div>
      <div class="values-grid fade-in">
        @foreach([
          ['fa-hands', 'Artisan First', 'We work directly with over 200 artisans across 8 states, ensuring fair compensation and preserving traditional crafts.'],
          ['fa-leaf', 'Sustainable Fashion', 'From natural fabrics to eco-friendly dyes and minimal-waste production, sustainability is how we operate.'],
          ['fa-gem', 'Uncompromising Quality', 'Every garment goes through rigorous quality checks. We use only premium fabrics and ensure perfect finishing.'],
          ['fa-heart', 'Made with Love', 'Each piece is crafted with care and intention — our artisans pour their hearts into every stitch.'],
          ['fa-female', 'For Every Woman', 'Inclusive sizing, versatile designs, and price points that make artisanal fashion accessible.'],
          ['fa-globe-asia', 'Rooted in India', 'Proudly Indian, globally inspired. We celebrate our heritage while creating designs that resonate worldwide.'],
        ] as $val)
          <div class="value-card">
            <i class="fas {{ $val[0] }}"></i>
            <h3>{{ $val[1] }}</h3>
            <p>{{ $val[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section style="background:var(--primary);padding:60px 0;text-align:center;color:var(--white);">
    <div class="container">
      <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:32px;">
        @foreach([['200+','Artisan Partners'],['8','Indian States'],['50K+','Happy Customers'],['100%','Handcrafted']] as $stat)
          <div>
            <div style="font-family:var(--font-heading);font-size:2.5rem;font-weight:700;margin-bottom:8px;">{{ $stat[0] }}</div>
            <div style="font-size:0.85rem;font-weight:300;letter-spacing:1px;text-transform:uppercase;">{{ $stat[1] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="about-section">
    <div class="container">
      <div class="about-grid fade-in">
        <div class="about-image"><img src="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?w=800&q=80" alt="Founder"></div>
        <div class="about-text">
          <h2>A Note from the Founder</h2>
          <p>"Growing up surrounded by the rich textile traditions of India, I always dreamed of creating a brand that would honour these crafts while making them relevant for today's woman."</p>
          <p>"Ikraar is that dream realized. Every collection we create is a love letter to the weavers, printers, and embroiderers who keep our textile heritage alive."</p>
          <p>"Thank you for being part of our journey. This is just the beginning."</p>
          <p style="font-family:var(--font-heading);font-size:1.2rem;color:var(--primary);margin-top:20px;font-style:italic;">With love and gratitude</p>
        </div>
      </div>
    </div>
  </section>

  <section class="newsletter" style="background:var(--charcoal);">
    <div class="container">
      <h2>Ready to Explore?</h2>
      <div class="section-divider"></div>
      <p>Discover our handcrafted collections and find your perfect piece</p>
      <div style="display:flex;gap:16px;justify-content:center;margin-top:28px;flex-wrap:wrap;">
        <a href="{{ route('shop') }}" class="btn btn-primary">Shop Now</a>
        <a href="{{ route('collections') }}" class="btn btn-outline" style="color:#fff;border-color:#fff;">View Collections</a>
      </div>
    </div>
  </section>

@endsection
