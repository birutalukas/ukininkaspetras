@if ($products)
    <section class="section bg-brown-50">

        <div class="container">
            <h2 class="section-title mb-6 sm:mb-8 md:mb-14">Produktai</h2>
        </div>

        <div class="container">
            <div class="products-grid" data-block-parallax="wrap">
                @foreach ($products as $product_id)
                    @php
                        $product = wc_get_product($product_id);
                    @endphp
            
                    @if ($product)            
                        <div class="image-wrapper" data-block-parallax="product">             
                            @include('woocommerce.product-card', ['product' => $product])       
                        </div>
                    @endif
                @endforeach
            </div>
            
        </div>
    </section>
@endif
