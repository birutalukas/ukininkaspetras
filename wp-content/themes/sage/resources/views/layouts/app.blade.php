<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

  @if (!is_cart() || !is_checkout())
    @include('sections.header')
  @endif

  <main id="main" class="main">

    @if (is_cart() || is_checkout() || is_shop() || is_product())
      <div class="container">
    @endif
       
    @yield('content')

    @if (is_cart() || is_checkout() || is_shop() || is_product())
      </div>
    @endif
    
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif

@include('sections.footer')
