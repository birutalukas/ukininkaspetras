<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Hero extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.hero',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        $group = get_field('hero_group');
        return [
            'showVideo' => $group['image_or_video'] ?? false,
            'title'     => $group['title'],
            'heroImage' => $this->heroImage($group),
            'heroVideo' => $this->heroVideo($group),            
        ];
    }

    /**
     * Returns the Hero Image.
     *
     * @return string
     */
    public function heroImage($group)
    {
        $desktop = $group['hero_image_desktop'] ?? [];
        $mobile = $group['hero_image_mobile'] ?? [];
        return [
            'desktopImageUrl' => $desktop['url'] ?? '',
            'desktopImageAlt' => $desktop['alt'] ?? '',
            'mobileImageUrl' => $mobile['url'] ?? '',
            'mobileImageAlt' => $mobile['alt'] ?? '',
        ];
    }
    /**
     * Returns the Hero Video.
     *
     * @return string
     */
    public function heroVideo($group)
    {
        return [
            'video' => $group['hero_video'],
        ];
    }
}
