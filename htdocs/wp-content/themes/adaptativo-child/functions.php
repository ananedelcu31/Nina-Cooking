<?
function mis_estilos()
{
     wp_enqueue_style( 'child-theme-css', 'https://www.webempresa.com/wordpress/demo-tema-adaptativo.html' );
}
add_action( 'wp_enqueue_scripts', 'mis_estilos' );
php ?>