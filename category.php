<?php get_header(); ?>

    <div class="content-main">

        <div class="content">
            <div id="category">
                <h1><?php single_cat_title('Рубрика: ');?></h1>
            </div>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="post-content">
                    <div class="post-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-text"><?php the_excerpt(); ?></div>
                    <div class="readmore"><a href="<?php the_permalink(); ?>">Читать далее</a></div>
                </div>
            <?php endwhile; ?>

            <?php else: ?>

            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>