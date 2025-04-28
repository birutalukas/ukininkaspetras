<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'social' => $this->getSocial(),
            'info'   => $this->getInfo(),                    
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }
        /**
     * Returns the Social Links.
     *
     * @return array
     */

    public function getSocial()
    {

        $group = get_field('social_group', 'options');

        if (!$group) {
            return [];
        }
        
        return [
            'facebook' => $group['facebook_link'] ?? '',
            'instagram' => $group['instagram_link'] ?? '',
            'youtube' => $group['youtube_link'] ?? '',
            'patreon' => $group['patreon_link'] ?? '',
            'contribee' => $group['contribee_link'] ?? '',
        ];
        
    }

    /**
     * Returns the Social Links.
     *
     * @return array
     */
    public function getInfo()
    {

        $group = get_field('info_group', 'options');

        if (!$group) {
            return [];
        }

        return [
            'email'     => $group['email'] ?? '',
            'address'   => $group['address'] ?? '',
            'mapUrl'    => $group['map_url'] ?? '',
        ];
        
    }
}
