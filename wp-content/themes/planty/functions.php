<?php
// Your code to enqueue parent theme styles
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

// Ajoute d'une fonction de rappel pour le hook de filtre
add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu',10,2);
// Ajout du lien Admin à la fin du menu
function add_extra_item_to_nav_menu($items) {
    if (is_user_logged_in ()) {
        $items .= '<li id="menu-item-412" class="menu-admin-class"><a href=' . admin_url() . '>Admin</a></li>';
    }
    return $items;
}
?>