<header 
  class="fixed top-0 w-full pt-8 z-50 border border-t-0 border-l-0 border-r-0 transition-all duration-1000 ease-in-out"
  :class="{
    'translate-y-[-100%]' : isScrollingDown,
    'bg-brown-50 shadow-sm border-b-[1px] css-filled-header' : isHeaderFilled,
    '-mt-16' :  {{ is_cart() ? 1 : 0 }} || {{ is_checkout() ? 1 : 0 }} || {{ get_page_template_slug() === 'template-text-content.blade.php' }} || isScrolled,
  }"
  :style="{
  borderBottomWidth: isHeaderFilled ? '1px' : '0px',
  borderBottomColor: isHeaderFilled ? '#e5d2b1' : 'transparent'
  }"
  x-data="headerData" 
  x-init="initHeader()"
>

  <div class="container" id="header-top">

    <div class="flex justify-between items-center">

      @if ( !empty ( $info['mapUrl'] ) ) 
        <a href="{{ $info['mapUrl'] }}" target="_blank" class="flex items-center gap-2 sm:gap-4">
      @else
        <div class="flex items-center gap-2 sm:gap-4">
      @endif

        @if (!empty($info['address']))
          @include('svg.icon-pin') <span class="text-sm">{{ $info['address'] }}</span>
        @endif

      @if ( !empty ( $info['mapUrl'] ) ) 
        </a>
      @else
        </div>
      @endif

      <div class="flex gap-4 items-center">

        @if ( !empty( $social['facebook'] ) )  
          <a href="{{ $social['facebook'] }}" class="transition-all ease-in-out duration-500 hover:opacity-75 hover:scale-125" target="_blank" rel="noopener noreferrer">
            @include('svg.icon-facebook')
          </a>
        @endif
        @if ( !empty( $social['instagram'] ) )
          <a href="{{ $social['instagram'] }}" class="transition-all ease-in-out duration-500 hover:opacity-75 hover:scale-125" target="_blank" rel="noopener noreferrer">
            @include('svg.icon-instagram')
          </a>
        @endif
        @if ( !empty( $social['youtube'] ) )
          <a href="{{ $social['youtube'] }}" class="transition-all ease-in-out duration-500 hover:opacity-75 hover:scale-125" target="_blank" rel="noopener noreferrer">
            @include('svg.icon-youtube')
          </a>
        @endif
 
      </div>
       
    </div>

  </div>

    <div class="container" id="header-bottom">
      <div class="flex items-center justify-between w-full">

        <a href="{{ home_url('/') }}" class="mr-8 text-lg no-underline">
          {!! $siteName !!}
        </a>

        @if (has_nav_menu('primary_navigation'))

          <nav class="nav-primary flex items-center flex-1" :class="{'opacity-0 pointer-events-none' : {{ is_cart() ? 1 : 0 }} || {{ is_checkout() ? 1 : 0 }} }" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => false, 'echo' => false]) !!}
          </nav>
        @endif

        <a 
          href="{{ wc_get_cart_url() }}" 
          class="flex gap-4 items-center relative ml-8 transition-all ease-in-out duration-500 hover:opacity-75 hover:scale-125" id="cart-count"
          x-init="fetchCart()" 
          @added_to_cart.window="fetchCart();"
        >
          @include('svg.icon-cart')
          <span 
            class="absolute -top-2 -right-2 w-4 h-4 flex items-center justify-center rounded-full bg-brown-50 border-[1.5px] border-black !text-black text-[.625rem] font-light z-10"
            x-show="count > 0"
            x-text="count"       
          ></span>
        </a> 
  
      </div>

    </div>  
</header>
