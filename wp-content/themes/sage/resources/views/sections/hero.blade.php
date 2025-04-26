<section 
    class="h-screen relative overflow-hidden js-hero" 
    @if(!$showVideo) data-image-parallax="wrap" @endif
>
    <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent z-20"></div>
    @if ($showVideo)
        <video class="absolute inset-0 object-cover w-full h-full z-30" autoplay loop muted playsinline>
            <source src="{{ $videoUrl }}" type="video/mp4">
        </video>
    @else
        <picture class="absolute -top-[20%] left-0 w-full h-[120%] object-cover z-10" data-image-parallax="hero">
            @if ($heroImage['mobileImageUrl'])
                <source srcset="{{ $heroImage['mobileImageUrl'] }}" media="(max-width: 767px)">
            @endif
            @if ($heroImage['desktopImageUrl'])
                <source srcset="{{ $heroImage['desktopImageUrl'] }}" media="(min-width: 768px)">
            @endif
            <img src="{{ $heroImage['desktopImageUrl'] }}" alt="" class="min-h-[120%] object-cover">
        </picture>
    @endif

    <div class="absolute left-0 bottom-14 sm:inset-0 flex justify-center items-center text-left sm:text-center z-30">
        <div class="container">
            <h1 class="text-[2.5rem] leading-[3rem] sm:text-[3.5rem]  sm:leading-[4rem] text-white uppercase">
                {!!  $title !!}
            </h1>
        </div>
    </div>
</section>
