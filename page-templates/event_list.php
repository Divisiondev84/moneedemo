<?php
/**
 * Template Name: Event
 */
 get_header();
?>
    <div class="main_container">
        <div class="main_column1">
        	<div class="calendar-swap">
            	<!--
            	<a href="<?php bloginfo('wpurl') ?>/village-events/calendar/">
                	<img src="<?php bloginfo('template_directory') ?>/images/icon-calendar.png" />
                </a>
                -->
            </div>
            <?php while ( have_posts() ) : the_post(); ?>

                <h1 class="content_title"><?php the_title(); ?></h1>
                <div><?php the_content(); ?></div>

            <?php endwhile;  ?>
        </div>
        <?php get_sidebar();  ?>
    </div>

<?php get_footer(); ?>