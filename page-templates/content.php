    <div class="main_container">
        <div class="main_column1">
            <?php while ( have_posts() ) : the_post(); ?>

                <h1 class="content_title"><?php the_title(); ?></h1>
                <div class="featured_image"><?php the_post_thumbnail('Featured Image') ?></div>
                <div><?php the_content(); ?></div>

            <?php endwhile;  ?>
        </div>
        <?php get_sidebar(); ?>
    </div>

