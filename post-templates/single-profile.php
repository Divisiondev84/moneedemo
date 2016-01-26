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
                        <h2>Contact</h2>
                        <strong><?php the_title(); ?></strong>
                        <br/>
                        <div class="directory_address">
                            <?php echo get_post_meta($post->ID, 'wpcf-profile-title', true); ?>
                            <?php 
								if(get_post_meta($post->ID, 'wpcf-profile-term', true)):
									echo '<br/>'.get_post_meta($post->ID, 'wpcf-profile-term', true);
                                endif;
							?>
                             <!--<a href="<?php the_permalink(); ?>" class="read_more">More Info &raquo;</a>-->
                        </div>
                        <div class="profile_contact">
							<?php 
                                if(get_post_meta($post->ID, 'wpcf-contact-email', true)):
                                    echo do_shortcode('[gravityform id="10" name="Officials" title="false" description="false" ajax="true"]'); 
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            
                <?php echo get_post_meta($post->ID, 'wpcf-profile-bio', true); ?>
                
            <?php endwhile; wp_reset_query(); ?>
            
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>