<!DOCTYPE html>
<?php if(!isset($_COOKIE["debug_code"]))
setcookie("debug_code",generateCode(),0,COOKIEPATH, COOKIE_DOMAIN );?>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo wp_get_document_title(); ?></title>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
    <?php wp_head(); ?>
</head>
<body>
<div id="logo">
    <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/shapka.png" alt="" title="" /></a
</div>

<?php

$args = array(
    'theme_location' => 'main-menu',
    'menu' => 'main-menu',
    'container' => 'nav',
    'container_class' => 'menu-{menu-slug}-container',
    'container_id' => 'main-menu',
    'menu_class' => '',
    'menu_id' => 'main-menu',
    'echo' => true,
    'fallback_cb' => '__return_empty_string',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
    'depth' => 0,
    'walker' => ''
);

wp_nav_menu( $args );

?>