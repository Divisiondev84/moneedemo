<?php
/**
 * Template Name: Officials Dept Heads
 */
 get_header();
?>

    <div class="main_container">
        <div class="main_column1">
            <?php while ( have_posts() ) : the_post(); ?>
                <h1 class="content_title"><?php the_title(); ?></h1>
            <?php endwhile;  ?>
				
            <div class="profile_column">
            
				<?php query_posts(array('posts_per_page' => '1',
                'post_type' => array('profile'),
                'post__in' => array(get_post_meta($post->ID, 'wpcf-department-head', true)))); ?>
                
                <?php while ( have_posts() ) : the_post();?> 

                    <div class="directory_box"> 
                		<a href="<?php the_permalink()?>"><?php the_post_thumbnail('Profile Image') ?></a>
                        <h2><a href="<?php the_permalink()?>"><?php the_title(); ?></a>
                    
					<?php if(get_post_meta($post->ID, 'wpcf-contact-email', true)): ?>
                            <a href="<?php the_permalink()?>"><i class="fa fa-envelope" style="float:right;"></i></a>
                    <?php endif;?></h2> 
                        <div class="directory_address">
                            <?php echo get_post_meta($post->ID, 'wpcf-profile-title', true); ?>
                            <br/>
                            <?php echo get_post_meta($post->ID, 'wpcf-profile-term', true); ?>
                            <!--<a href="<?php the_permalink(); ?>" class="read_more">More Info &raquo;</a>-->
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <?php wp_reset_query(); while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile;  ?>
            
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>