<?php
/**
 * Template Name: Listing - News
 */
 get_header();
?>
    <div class="main_container">
        <div class="main_column1">
            <h1 class="content_title"><?php the_title(); ?></h1>
            <?php query_posts(array('posts_per_page' => '-1', 'orderby'=>'date', 'order'=>'DESC', 'post_type' => 'post'));
			while ( have_posts() ) : the_post(); ?>
				<div class="listing">
                    <div class="listing_image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('Listing Image') ?></a>
                    </div>
                    <div class="listing_excerpt">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="listing_date">
						<?php
							$category = get_the_category(); 
							echo $category[0]->cat_name.' - ';
							the_date('F d, Y'); 
						?>
                        </div>
                    <?php the_excerpt(); ?>
                    <a class="read_more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                    </div>
                </div>

            <?php endwhile; wp_reset_query(); ?>
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>