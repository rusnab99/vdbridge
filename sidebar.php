<div class="sidebar-right">
    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
        <ul id="sidebar">
            <?php dynamic_sidebar( 'sidebar' ); ?>
        </ul>
    <?php endif; ?>
</div>