<?php get_header(); ?>

    <div class="content-main">

    <div class="content">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="post-content">
                <div class="post-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-text"><?php the_excerpt(); ?></div>
                <div class="readmore"><a href="<?php the_permalink(); ?>">Читать далее</a></div>
            </div>
        <?php endwhile; ?>

        <?php else: // Если ничего не найдено ?>
            <div id="page">
                <h1 class="post-title">По запросу ни чего не найдено!</h1>
                <h4 class="post-text">Попробуйте еще раз с другими ключевыми словами.</h4>
            </div>
        <?php endif; ?>
    </div>

<?php get_sidebar(); ?>