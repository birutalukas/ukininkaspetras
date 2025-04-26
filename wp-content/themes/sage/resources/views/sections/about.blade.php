<section class="section bg-brown-200">

    <div class="container md:pb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16" >

            <div class="hidden md:block relative overflow-hidden md:h-[120%]" data-image-parallax="wrap">
                @if ( !empty ( $about['image'] ) )
                    <img src="{{ $about['image']['url'] }}" alt="{{ $about['image']['alt'] }}" class="h-[120%] md:h-[140%] w-auto object-cover">
                @endif
            </div>

            <div data-block-parallax="wrap">
                <div data-block-parallax="item">
                    @if ( !empty ( $about['title']) )
                        <h2 class="section-title mb-6 sm:mb-8">{{ $about['title'] }}</h2>
                    @endif

                    @if ( !empty ( $about['description'] ) )
                        <article class="max-w-[36rem]">
                            {!! $about['description'] !!}
                        </article>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
