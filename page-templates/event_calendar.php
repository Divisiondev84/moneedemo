<?php
/**
 * Template Name: Events Calendar
 */
 get_header();
?>
    <div class="main_container">
        <div class="main_column3">
        	<!--
        	<div class="calendar-swap">
            	<a href="<?php bloginfo('wpurl') ?>/village-events/">
                	<img src="<?php bloginfo('template_directory') ?>/images/icon-list.png" />
                </a>
            </div>
          -->
            <?php while ( have_posts() ) : the_post(); ?>

                <h1 class="content_title"><?php the_title(); ?></h1>
                <div><?php the_content(); ?></div>
				<div>.</div>
            <?php endwhile;  ?>
        </div>
    </div>

<?php get_footer(); ?>