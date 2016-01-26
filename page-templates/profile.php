<?php
/**
 * Template Name: Profile
 */
 get_header();
?>

    <div class="main_container">
        <div class="main_column1">
            <?php while ( have_posts() ) : the_post(); ?>
                <h1 class="content_title"><?php the_title(); ?></h1>
				
                <div class="profile_column">
                    <div class="directory_box"> 
                        <?php the_post_thumbnail('Profile Image') ?>
                        <div class="directory_address">
                            <?php echo get_post_meta($post->ID, 'wpcf-profile-title', true); ?>
                            <br/>
                            <?php echo get_post_meta($post->ID, 'wpcf-profile-term', true); ?>
                             <!--<a href="<?php the_permalink(); ?>" class="read_more">More Info &raquo;</a>-->
                        </div>
                    </div>
                </div>
            
                <?php the_content(); ?>
                
            <?php endwhile; wp_reset_query(); ?>
            
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>