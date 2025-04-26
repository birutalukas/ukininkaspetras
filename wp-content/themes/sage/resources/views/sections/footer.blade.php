<footer class="bg-brown-400">
  
  <div class="container section">

    <div class="grid sm:grid-cols-2 gap-16">

      <div class="flex flex-col gap-16">        

        <div>
          {!! do_shortcode('[mailerlite_form form_id=1]') !!}
        </div>             

      </div>

      <div class="flex flex-col gap-8 justify-between">

        <div class="flex flex-col lg:flex-row gap-8">

          <div class="lg:w-1/2">            
            @if (has_nav_menu('footer_information'))
              <h5>Informacija</h5>
              <nav class="nav-footer flex items-center flex-1" aria-label="{{ wp_get_nav_menu_name('footer_information') }}">
                {!! wp_nav_menu(['theme_location' => 'footer_information', 'menu_class' => 'nav', 'container' => false, 'echo' => false]) !!}
              </nav>
            @endif
          </div>

          <div class="lg:w-1/2">
            @if ( !empty ( $info['email'] || !empty ( $info['address'] ) ) )
              <h5>Kontaktai</h5>
              <div class="nav-footer">
                <ul>
                  
                  @if ( !empty ( $info['mapUrl'] ) && !empty ( $info['address'] ) ) 
                    <li>
                      <a href="{{ $info['mapUrl'] }}" target="_blank">
                        {{ $info['address'] }}
                      </a>
                    </li>
                  @endif
                  
                  @if ( !empty ( $info['email'] ) )   
                    <li>               
                      <a href="mailto:{{$info['email']}}">
                        {{$info['email']}}
                      </a>
                    </li>
                  @endif
                  
                </ul>
              </div>       
            @endif     
          </div>

        </div>

        <x-footer-social />
      </div>

      

    </div>

  </div>
  
  <div id="footer-bottom">
    <div class="py-6 border border-brown-200 border-l-0 border-b-0 border-r-0">
      <div class="container">
        <div class="flex items-center justify-between">

          <div class="flex flex-col-reverse gap-2 sm:flex-row">
            <span>© {{ $siteName }} - {{ date('Y') }}.</span>
            <span>Visos teisės saugomos</span>     
          </div>

          <div>
            {{-- <a href="#">Privatumo Politika</a> --}}
          </div>

        </div>
      </div>
    </div>
  </div>

</footer>
