<?php
/**
 * Template Name: License Review
 */
if (! is_user_logged_in() ) { wp_redirect( home_url() ); exit; }

 get_header();
?>

                    <div class="main_container">
                        <div class="main_column3">
                        <?php query_posts(array('posts_per_page' => '-1', 'orderby'=>'title', 'order'=>'ASC', 'post_type' => 'license'));
			             while ( have_posts() ) : the_post(); ?>
				
                            <strong><?php the_title(); ?></strong>
                            <br/>
                            <br/>
                            
                            <?php if( in_array( 'Business License', get_field('select_license_types') ) ){ ?>
                            <a href="/?gf_pdf=<?php echo $post->ID; ?>&template=license_business.php" target="_blank">Business License</a>
                            <br/>
                            <a href="/?gf_pdf=<?php echo $post->ID; ?>&template=license_business_renew.php&orentation=p" target="_blank">Business License Renewal Form</a>
                            <br/>
                            <br/>
                            <?php } ?>
                            
                            <?php if( in_array( 'Liquor License', get_field('select_license_types') ) ){ ?>
                            <a href="/?gf_pdf=<?php echo $post->ID; ?>&template=license_liquor.php" target="_blank">Liquor License</a>
                            <br/>
                            <br/>
                            <?php } ?>
                            
                            
                            <?php if( in_array( 'Contractor License', get_field('select_license_types') ) ){ ?>
                            <a href="/?gf_pdf=<?php echo $post->ID; ?>&template=license_contractor.php" target="_blank">Contractor License</a>
                            <br/>
                            <a href="/?gf_pdf=<?php echo $post->ID; ?>&template=license_contractor_renew.php&orentation=p" target="_blank">Contractor License Renewal Form</a>
                            <br/>
                            <br/>
                            <?php } ?>
                            
                            
                            <?php if( in_array( 'Subcontractor License', get_field('select_license_types') ) ){ ?>
                            <a href="/?gf_pdf=<?php echo $post->ID; ?>&template=license_subcontractor.php" target="_blank">Subcontractor License</a> 
                            <br/>
                            <a href="/?gf_pdf=<?php echo $post->ID; ?>&template=license_contractor_renew.php&orentation=p" target="_blank">Subcontractor License Renewal Form</a>
                            <br/>
                            <br/>
                            <?php } ?>

                            <hr/>
                        <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>

<?php get_footer(); ?>


