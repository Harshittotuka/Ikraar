@props(['title', 'breadcrumbs' => []])

<section class="page-header">
  <div class="container">
    <h1>{{ $title }}</h1>
    @if(count($breadcrumbs))
      <p class="breadcrumb">
        @foreach($breadcrumbs as $crumb)
          @if(isset($crumb['url']))
            <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
          @else
            {{ $crumb['label'] }}
          @endif
          @if(!$loop->last) <span>/</span> @endif
        @endforeach
      </p>
    @endif
  </div>
</section>
