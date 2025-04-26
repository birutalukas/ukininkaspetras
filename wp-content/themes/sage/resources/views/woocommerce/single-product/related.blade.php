@php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.6.0
 */
@endphp

@if ($related_products)
    <section class="w-full section">

        @php
            $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));
        @endphp

        @if ($heading)
            <h2 class="section-title mb-8">{{ esc_html($heading) }}</h2>
        @endif

		<div class="products-grid">

			@foreach ($related_products as $related_product)
                @if ($loop->index < 3)
				    @include('woocommerce.product-card', ['product' => wc_get_product($related_product->get_id())])
                @endif
			@endforeach

		</div>
    </section>
@endif

@php wp_reset_postdata(); @endphp
