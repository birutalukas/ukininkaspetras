@props([
    'product' => null,
])
@php

    if (!$product) {
        return;
    }
    $product_id = $product->get_id();

@endphp

<div class="overflow-hidden group p-4 border border-brown-200">
    <a href="{{ get_permalink($product_id) }}" class="block aspect-square w-full relative overflow-hidden" data-image-parallax="wrap">
        <div class="w-full h-[120%] group-hover:scale-110 transition-all duration-500 overflow-hidden relative">
            <img 
                src="{{ get_the_post_thumbnail_url($product_id, 'large') }}" 
                alt="{{ $product->get_name() }}" 
                class="w-full !h-[120%] object-cover absolute -top-[10%] left-0 z-10 "
                data-image-parallax="image"
            >
        </div>
    </a>
    <div>
        <div class="p-4 text-center">
            <h2 class="text-xl font-semibold mb-2">
                <a href="{{ get_permalink($product_id) }}" class="font-bold !no-underline">{{ $product->get_name() }}</a>
            </h2>
            <p class="text-gray-700 mb-2">{!! wp_trim_words($product->get_short_description(), 15, '...') !!}</p>
            <span class="block  text-lg font-medium">{!! $product->get_price_html() !!}</span>
        </div>
        <button
            type="button"  
            class="ajax-add-to-cart theme-button"
            data-product_id="{{ $product->get_id() }}" 
            data-quantity="1" 
            data-product_sku="{{ $product->get_sku() }}" 
            rel="nofollow"
            >
            Į krepšelį
        </button>
    </div>
</div>
