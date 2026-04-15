<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Ikraar - Premium Indian Ethnic Wear | Kurtis, Suits & More')</title>
  <meta name="description" content="@yield('meta_description', 'Ikraar - Discover handcrafted Indian ethnic wear. Shop premium kurtis, suits, lehengas, and festive collections crafted with love and tradition.')">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@200;300;400;500;600;700&family=Noto+Serif+Devanagari:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('head')
</head>
<body>

  @include('partials.announcement-bar')
  @include('partials.header')
  @include('partials.mobile-nav')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')
  @include('partials.cart-drawer')
  @include('partials.quick-view-modal')
  @include('partials.search-overlay')
  @include('partials.bottom-nav')
  @include('partials.floating-buttons')

  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
