<?php
/**
 * Template Name: Home Page
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 //header('Location: '.get_bloginfo('wpurl'));
?>

<?php get_header(); ?>
<!--
<div class="home_revSlider">
<?php //putRevSlider( "home" ) ?>
</div>
-->
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
            <?php //echo do_shortcode('[ICON_TABLE_DISPLAY]'); ?>
            <div class="details drop_p">
				<?php //echo get_post_meta(136,'wpcf-home-slider-featured-activity',true) ?>
            </div>
        </div>
        
    	<div class="did_you_know">
            <div class="main_title">
                <span class="thin">Village</span> News
                <div class="view_all"><a href="<?php bloginfo('wpurl'); ?>/local-news">All News</a></div>
            </div>
			<?php query_posts(array('posts_per_page' => '3')); while (have_posts()) : the_post(); ?>
                <div class="list_item">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('Home Event'); ?>
                        <div class="title">
                            <?php the_title(); ?>
                        </div>
                    </a>
                    <div class="content">
                    	<?php echo excerpt(13); ?>
                        <br/>
                        <a class="read_more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
                    </div>
                </div>
        	<?php endwhile; ?>
        </div>
    </div>
    
    	<?php query_posts(array('posts_per_page' => '3','post_type' => array('page','redirect','microsite'), 'meta_key' => 'wpcf-teaser-homepage-display-order', 'order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_query' => array(array('key' => 'wpcf-display-on-homepage','value' => '1','compare' => '=')))); ?>
    <div class="home_content_row">
        <div class="welcome">
            <div class="title">
                <?php echo get_post_meta(136,'wpcf-welcome-to-monee-title',true) ?>
            </div>
            <div class="content droptop_p">
                <?php //echo wp_get_attachment_image(url_get_image_id(get_post_meta(136,'wpcf-welcome-to-monee-image',true)),'Home Features'); ?>
                <?php echo get_post_meta(136,'wpcf-welcome-to-monee-content',true) ?>
            </div>
        </div>
        <div class="home_display_boxes">
            <?php while (have_posts()) : the_post(); ?>
                <div class="home_display_box">
                    <?php if(!get_post_meta($post->ID,'wpcf-redirect-location',true)){ ?>
                    	<a href="<?php the_permalink(); ?>">
                    <?php }else{ ?>
                    	<a target="_blank" href="<?php echo get_post_meta($post->ID,'wpcf-redirect-location',true); ?>">
                    <?php } ?>
                        <div class="page_title"><?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-title',true); ?></div>
                        <?php the_post_thumbnail('Home Features'); ?>
                    </a>
                    <div class="page_excerpt">
                        <?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-content',true); ?>
                        
						<?php if(!get_post_meta($post->ID,'wpcf-redirect-location',true)){ ?>
                            <a class="read_more" href="<?php the_permalink(); ?>">
                        <?php }else{ ?>
                            <a class="read_more" target="_blank" href="<?php echo get_post_meta($post->ID,'wpcf-redirect-location',true); ?>">
                        <?php } ?> 
                        Read More &raquo;</a>
                    </div>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
        
	<div class="home_content_row">
        
        <div class="home_events">
          <div class="main_title">
          		Upcoming <strong>Events</strong>
                <div class="view_all"><a href="<?php bloginfo('wpurl'); ?>/calendar/">All Events</a></div>
          </div>
          
          <?php dynamic_sidebar( 'homepage' ); ?>            
        </div>

		<div class="home_display_boxes">        
			<?php query_posts(array('posts_per_page' => '2', 'offset' => '3', 'post_type' => array('page','redirect','microsite'), 'meta_key' => 'wpcf-teaser-homepage-display-order', 'order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_query' => array(array('key' => 'wpcf-display-on-homepage','value' => '1','compare' => '=')))); ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="home_display_box">
                    <?php if(! get_post_meta($post->ID,'wpcf-redirect-location',true)){ ?>
                    	<a href="<?php the_permalink(); ?>">
                    <?php }else{ ?>
                    	<a target="_blank" href="<?php echo get_post_meta($post->ID,'wpcf-redirect-location',true); ?>">
                    <?php } ?>
                        <div class="page_title"><?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-title',true); ?></div>
                        <?php the_post_thumbnail('Home Features'); ?>
                    </a>
                    <div class="page_excerpt">
                        <?php echo get_post_meta($post->ID,'wpcf-teaser-homepage-content',true); ?>
                        
						<?php if(! get_post_meta($post->ID,'wpcf-redirect-location',true)){ ?>
                            <a class="read_more" href="<?php the_permalink(); ?>">
                        <?php }else{ ?>
                            <a class="read_more" target="_blank" href="<?php echo get_post_meta($post->ID,'wpcf-redirect-location',true) ?>">
                        <?php } ?> 
                        Read More &raquo;</a>
                    </div>
                </div> 
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
    
</div>
<?php get_footer(); ?>