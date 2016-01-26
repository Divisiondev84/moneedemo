<?php
/**
 * Template Name: Event Registration
 */
 get_header();
?>
    <div class="main_container">
        <div class="main_column1">
            <?php while ( have_posts() ) : the_post(); ?>
                <div><?php the_content(); ?></div>

            <?php endwhile;  ?>
        </div>
        <?php get_sidebar(); ?>
    </div>



<?php get_footer(); ?>