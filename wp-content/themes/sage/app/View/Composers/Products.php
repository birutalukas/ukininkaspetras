<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Products extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.products',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
{
    $group = get_field('products_group') ?? [];

    $products = array_map(function ($item) {
        return $item['product'] ?? null; // Extract product ID
    }, $group['products']);

    $products = array_filter($products);

    return [
        'products' => $products,
    ];
}

   
}
