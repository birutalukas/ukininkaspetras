<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use Illuminate\Support\Arr;

class SectionAbout extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.about',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        $group = get_field('about_group') ?? [];

        return [
            'about' => [
                'image'         => Arr::get($group, 'image'),
                'title'         => $group['title'] ?? '',
                'description'   => $group['description'] ?? '',
            ],
        ];
    }
   
}
