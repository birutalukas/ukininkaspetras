<div class="flex gap-4 items-center footer-social">

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