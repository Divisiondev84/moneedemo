<?php
/**
 * Template Name: Event Details
 *
 * This is template will display all of your event's details
 *
 * @ package		Event Espresso - Event Registration and Management Plugin for WordPress
 * @ link			http://www.eventespresso.com
 * @ version		EE4+
 */
get_header(); 
?>
			<div class="main_container">
            	<div class="main_column1">
		
                    <div id="espresso-event-details-wrap-dv" class="">
                        <div id="espresso-event-details-dv" class="" >				
                    <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            //  Include the post TYPE-specific template for the content.
                            espresso_get_template_part( 'content', 'espresso_events' );
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        endwhile;
                    ?>
                        </div>
                    </div>

                </div>
                <?php get_sidebar(); ?>
        	</div>
		<?php get_footer(); ?>
	