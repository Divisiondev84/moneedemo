<?php
/**
 * NULLED !!!!!!!!!!!!!!!
 * USE HOMEPAGE TEMPLATE!!!!
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 //header('Location: '.get_bloginfo('wpurl'));
?>

<?php get_header(); ?>
<div class="home_revSlider">
<?php putRevSlider( "home" ) ?>
</div>
<div class="main_container">
	<div class="home_event_area">
        <div class="home_feature_event">
        	<?php echo do_shortcode('[rev_slider home_featured_activity]'); ?>
			<!--
            <div class="event_title">
                <a class="feature_title" href="<?php bloginfo('wpurl') ?>/event-registration/?ee=<?php echo get_post_meta(136,'wpcf-home-slider-featured-activity-link',true) ?>">
                    <?php echo get_post_meta(136,'wpcf-home-slider-featured-activity-title',true) ?>
                </a>
            </div> 
            -->
            <?php echo do_shortcode('[ICON_TABLE_DISPLAY]'); ?>
            <div class="details drop_p">
				<?php echo get_post_meta(136,'wpcf-home-slider-featured-activity',true) ?>
            </div>
        </div>
        <div class="home_events">
        	<div class="main_title">Upcoming <strong>Events</strong></div>
            <?php echo do_shortcode('[HOME_TABLE_DISPLAY]'); ?>
        </div>
    </div>
    
    	<?php query_posts(array('posts_per_page' => '4', 'post_type' => 'page', 'meta_key' => 'wpcf-teaser-homepage-display-order', 'order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_query' => array(array('key' => 'wpcf-display-on-homepage','value' => '1','compare' => '=')))); ?>
        <?php if (have_posts()) : ?>
        	<div class="home_display_boxes">
				<?php while (have_posts()) : the_post(); ?>
            		<div class="home_display_box">
                    	<a href="<?php the_permalink(); ?>">
                            <div class="page_title"><?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-title',true); ?></div>
                            <?php the_post_thumbnail('Home Features'); ?>
                        </a>
                        <div class="page_excerpt">
							<?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-content',true); ?> 
                        	<a class="read_more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                        </div>
                    </div>
    			<?php endwhile; ?>
            </div>
        <?php endif; ?>
    
    	<?php query_posts(array('posts_per_page' => '4', 'offset' => '4', 'post_type' => array('page','redirect'), 'meta_key' => 'wpcf-teaser-homepage-display-order', 'order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_query' => array(array('key' => 'wpcf-display-on-homepage','value' => '1','compare' => '=')))); ?>
        <?php if (have_posts()) : ?>
        	<div class="home_display_boxes" style="border-bottom:none;">
				<?php while (have_posts()) : the_post(); ?>
            		<div class="home_display_box">
                    	<a href="<?php the_permalink(); ?>">
                            <div class="page_title"><?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-title',true); ?></div>
                            <?php the_post_thumbnail('Home Features'); ?>
                        </a>
                        <div class="page_excerpt">
							<?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-content',true); ?> 
                        	<a class="read_more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                        </div>
                    </div> 
    			<?php endwhile; ?>
            </div>
        <?php endif; ?>
        
	<div class="home_content_row">
    	<div class="did_you_know">
        <div class="main_title">
        	Quick Links
        </div>
			<?php query_posts(array('posts_per_page' => '3', 'post_type' => array('page','redirect'), 'meta_key' => 'wpcf-did-you-know-display-order', 'order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_query' => array(array('key' => 'wpcf-did-you-know','value' => '1','compare' => '=')))); while (have_posts()) : the_post(); ?>
                <div class="list_item">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('Home Event'); ?>
                        <div class="title">
                            <?php echo get_post_meta($post->ID,'wpcf-did-you-know-title',true); ?>
                        </div>
                    </a>
                    <div class="content">
                    	<?php echo get_post_meta($post->ID,'wpcf-did-you-know-content',true); ?>
                        <br/>
                        <a class="read_more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                    </div>
                </div>
        	<?php endwhile; ?>
        </div>
		<div class="welcome">
        	<div class="title">
        		<?php echo get_post_meta(136,'wpcf-welcome-to-monee-title',true) ?>
            </div>
        	<div class="content droptop_p">
                <?php echo wp_get_attachment_image(url_get_image_id(get_post_meta(136,'wpcf-welcome-to-monee-image',true)),'Home Features'); ?>
        		<?php echo get_post_meta(136,'wpcf-welcome-to-monee-content',true) ?>
            </div>
        </div>
    </div>
    
</div>
<?php get_footer(); ?>