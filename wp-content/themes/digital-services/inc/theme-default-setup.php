<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package News_Viral
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digital_services_default_menu() {
    $html = '<ul class="offside">';
        $html .= '<li class="menu-item menu-item-type-post_type menu-item-object-page">';
            $html .= '<a href="' . esc_url( home_url() ) . '" title="' . esc_attr__( 'Home', 'digital-services' ) . '">';
                $html .= __( 'Home', 'digital-services' );
            $html .= '</a>';
        $html .= '</li>';
    $html .= '</ul>';
    echo $html;
}