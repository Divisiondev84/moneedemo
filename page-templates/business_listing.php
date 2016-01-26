<?php
/**
 * Template Name: Business Listing
 */
 get_header();
 $bizid = $_GET['bid'];
global $post;
$args = array( 'p' => $bizid, 'post_type' => 'license', 'post_status' => array( 'publish', 'draft'));
$myposts = get_posts( $args );
foreach( $myposts as $post ) :
 setup_postdata($post);
?>
			<div class="main_container">
            	<div class="main_column1">
                        <h1 class="content_title"><?php the_title(); ?></h1>
                        <?php if(! get_post_meta($post->ID, 'no_map', true)){ ?>
                            <div class="directory_map">
                                <?php 
                                		echo do_shortcode('[ubermenu-map address="'.get_post_meta($post->ID, 'business_info_address', true).', '. 
										get_post_meta($post->ID, 'business_info_city', true) . get_post_meta($post->ID, 'business_info_state', true).', '. 
										get_post_meta($post->ID, 'business_info_zip', true) .' " zoom="15"] '); 
                                ?>
                            </div>
                        <?php } ?>
                        <div class="content_body">
                            <div class="directory_meta">
								<?php if(get_the_post_thumbnail()){ ?>
                                    <div class="directory_image"><?php the_post_thumbnail('Directories') ?></div>
                                <?php } ?>
                                <div class="directory_address">
                                    <strong>Address</strong> <br/>
                                    <?php echo get_post_meta($post->ID, 'business_info_address', true);?>,
                                    <?php echo get_post_meta($post->ID, 'business_info_city', true);?>
                                    <?php echo get_post_meta($post->ID, 'business_info_state', true);?>,
                                    <?php echo get_post_meta($post->ID, 'business_info_zip', true);?>
                                    
                                     <br/>
                                     <br/>
									<?php if(get_post_meta($post->ID, 'public_phone', true)){ ?>
                                     	<br/><br/>
                                        <strong>Phone</strong> <br/>
                                        <?php echo get_post_meta($post->ID, 'public_phone', true); ?>
                                    <?php } ?>
                                </div>
                                <!--
								<?php if(get_post_meta($post->ID, 'wpcf-directory-website', true)){ ?>
                                    <a class="directory_website" href="<?php echo get_post_meta($post->ID, 'wpcf-directory-website', true); ?>" target="_blank">
                                        Visit Website
                                    </a>
                                <?php } ?>
                                -->
                            </div>
                            <?php if(get_post_meta($post->ID, 'business_about', true)){ ?>
                                <div class="directory_body">
                                	<?php echo get_post_meta($post->ID, 'business_about', true); ?>
                                </div>
                            <?php } ?>
                        </div>
                </div>
                <?php endforeach; wp_reset_postdata(); get_sidebar(); ?>
        	</div>

<?php get_footer(); ?>