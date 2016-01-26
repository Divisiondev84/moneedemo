    <div class="main_container">
        <div class="main_column1">
            <h1 class="content_title"><?php printf( __( 'Local News: %s', 'twentytwelve' ), '' . single_cat_title( '', false ) . '' ); ?></h1>
            <?php while ( have_posts() ) : the_post(); ?>
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
