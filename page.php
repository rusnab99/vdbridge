<?php get_header(); ?>

    <div class="content-main">

        <div class="content">
            <div id="page">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="post-text"><?php the_content(); ?></div>
                <?php endwhile; ?>

                <?php else: ?>

                <?php endif; ?>
            </div>
        </div>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>