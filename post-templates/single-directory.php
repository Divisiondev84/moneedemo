<?php get_header(); ?>
			<div class="main_container">
            	<div class="main_column1">
					<?php while ( have_posts() ) : the_post(); ?>
                        <h1 class="content_title"><?php the_title(); ?></h1>
                        <?php if(! get_post_meta($post->ID, 'no_map', true)){ ?>
                        <div class="directory_map">
							<?php 
								$csz = 'Monee, IL 60449';
								if(get_post_meta($post->ID, 'wpcf-directory-csz', true)){$csz = get_post_meta($post->ID, 'wpcf-directory-csz', true);}
								echo do_shortcode('[ubermenu-map address="'.get_post_meta($post->ID, 'wpcf-directory-address', true).' '.  $csz .' " zoom="15"] '); 
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
								<?php if(get_post_meta($post->ID, 'wpcf-directory-website', true)){ ?>
                                    <a class="directory_website" href="<?php echo get_post_meta($post->ID, 'wpcf-directory-website', true); ?>" target="_blank">
                                        Visit Website
                                    </a>
                                <?php } ?>
                            </div>
                            <?php if(get_post_meta($post->ID, 'wpcf-directory-about', true)){ ?>
                                <div class="directory_body">
                                	<?php echo get_post_meta($post->ID, 'wpcf-directory-about', true); ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endwhile;  ?>
                </div>
                <?php get_sidebar(); ?>
        	</div>
<?php get_footer(); ?>