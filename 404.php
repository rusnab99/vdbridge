<?php get_header(); ?>

    <div class="content-main">

        <div class="content">
            <div id="page">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h1 class="page-title">Такой страницы не существует!</h1>
                    <img src="<?php bloginfo('template_url') ?>/images/404.png" />
                <?php endwhile; ?>

                <?php else: ?>

                <?php endif; ?>
            </div>
        </div>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>