<?php get_header(); ?>
			<div class="main_container">
            	<div class="main_column1">
					<?php while ( have_posts() ) : the_post();
					$csz = 'Monee, IL 60449';
					if(get_post_meta($post->ID, 'wpcf-directory-csz', true)){$csz = get_post_meta($post->ID, 'wpcf-directory-csz', true);} ?>
                        <h1 class="content_title">Job Posting: <?php the_title(); ?></h1>
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
                                <div class="job_body">
                                    <h2>Company / Organization</h2>
                                	<p>
                            		<?php echo get_post_meta($post->ID, 'wpcf-job-company-name', true);  ?>
                                    </p>
                                    
                                    <h2>Position</h2>
                                	<p>
									<?php echo get_post_meta($post->ID, 'wpcf-job-position', true); ?> -
                                    <?php echo get_post_meta($post->ID, 'wpcf-job-position-type', true); ?>
                                    </p>
                                    
                                    <h2>Job Description</h2>
                                    <?php echo get_post_meta($post->ID, 'wpcf-job-description', true); ?>
                                    
                                    <h2>Requirements</h2>
                                    <?php echo get_post_meta($post->ID, 'wpcf-job-requirements', true); ?>
									
                                    <?php if(get_post_meta($post->ID, 'wpcf-directory-email', true)){ ?>
                                    	<h2>Apply Now</h2>
                                    	<?php echo do_shortcode('[gravityform id="2" name="Apply Now" title="false" description="false" ajax="true"]'); ?>
                                    <?php } ?>
                                    
                                </div>
                    <?php endwhile; ?>
                </div>
                <?php get_sidebar(); ?>
        	</div>
<?php get_footer(); ?>