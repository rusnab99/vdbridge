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
<header>
<div class="header">
    <div class="logo">
    <img src="<?php bloginfo('template_url'); ?>/img/80.png"/>
    </div>
    <div class="mainText">VD Bridge
        <div class="mainText1">Строить мосты между людьми</div>
    </div>
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
<div class="regis">
    <button type="submit">Регистрация/вход</button>
</div>
</header>

