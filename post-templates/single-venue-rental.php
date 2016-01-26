<?php get_header(); ?>
			<div class="main_container">
            	<div class="main_column1">
					<?php while ( have_posts() ) : the_post();
					$csz = 'Monee, IL 60449';
					if(get_post_meta($post->ID, 'wpcf-directory-csz', true)){$csz = get_post_meta($post->ID, 'wpcf-directory-csz', true);} ?> 
                        <h1 class="content_title"><?php the_title(); ?></h1>
                        <div class="venue_featured_image"><?php the_post_thumbnail('Featured Image') ?></div>
                            <div class="directory_meta">
								<div class="venue_map">
									<?php echo do_shortcode('[ubermenu-map address="'.get_post_meta($post->ID, 'wpcf-directory-address', true).' '. $csz .'" zoom="15"] ') ?>
                                </div>
                                <div class="directory_address">
                                    <strong>Address</strong> <br/>
                                    <?php echo get_post_meta($post->ID, 'wpcf-directory-address', true);
									if(get_post_meta($post->ID, 'wpcf-directory-address-2', true)){ ?>, <br/>
                                        <?php echo get_post_meta($post->ID, 'wpcf-directory-address-2', true); ?>
                                    <?php } ?>
                                     <br/>
                                    <?php echo $csz; ?>
									<?php if(get_post_meta($post->ID, 'wpcf-directory-phone', true)){ ?>
                                     	<br/><br/>
                                        <strong>Phone</strong> <br/>
                                        <?php echo get_post_meta($post->ID, 'wpcf-directory-phone', true); ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if(get_post_meta($post->ID, 'wpcf-directory-about', true)){ ?>
                                <div class="directory_body">
                                	<?php echo get_post_meta($post->ID, 'wpcf-directory-about', true); ?>
                                </div>
                            <?php } ?>
                        <div class="venue_calendar">
						<?php echo do_shortcode('[dopbsp id="'.get_post_meta($post->ID,'wpcf-public-venue-id',true).'"]') ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php get_sidebar(); ?>
        	</div>
<?php get_footer(); ?>