<?php
/**
 * Template Name: Venue Rentals
 */
 get_header();
?>
    <div class="main_container">
        <div class="main_column1">
            <h1 class="content_title"><?php the_title(); ?></h1>
            <?php query_posts(array('posts_per_page' => '-1', 'orderby'=>'title', 'order'=>'ASC', 'post_type' => 'venue-rental'));
			while ( have_posts() ) : the_post(); ?>
				<div class="listing">
                    <div class="listing_image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('Listing Image') ?></a>
                    </div>
                    <div class="listing_excerpt">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="listing_date">
						<?php
							echo get_post_meta($post->ID, 'wpcf-directory-address', true);
							if(get_post_meta($post->ID, 'wpcf-directory-address2', true)){echo '<br/>'.get_post_meta($post->ID, 'directory-address2', true);}
							if(get_post_meta($post->ID, 'wpcf-directory-csz', true)){
								echo '<br/>'.get_post_meta($post->ID, 'wpcf-directory-csz', true);
							}else{
								echo '<br/> Monee, IL 60449';
							}
						?>
                        </div>
                    <?php excerpt(20); ?>
                    <a class="read_more" href="<?php the_permalink(); ?>">More Info &raquo;</a>
                    </div>
                </div>

            <?php endwhile; wp_reset_query(); ?>
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>