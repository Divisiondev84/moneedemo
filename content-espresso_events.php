<?php
/**
 * This template will display a single event - copy it to your theme folder
 *
 * @ package		Event Espresso
 * @ author		Seth Shoultes
 * @ copyright	(c) 2008-2013 Event Espresso  All Rights Reserved.
 * @ license		http://eventespresso.com/support/terms-conditions/   * see Plugin Licensing *
 * @ link			http://www.eventespresso.com
 * @ version		4+
 */

global $post;
$event_class = has_excerpt( $post->ID ) ? ' has-excerpt' : '';
$event_class = apply_filters( 'FHEE__content_espresso_events__event_class', $event_class );

?>
<?php
print_r(get_post_meta($post->ID,'DTT_EVT_start',true));
?>
<?php do_action( 'AHEE_event_details_before_post', $post ); ?>
<div id="event_espresso_registration_form" class="event-display-boxes ui-widget">
<div class="event_espresso_form_wrapper event-data-display ui-widget-content <?php echo $ui_corner ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class( $event_class ); ?>>

		<?php do_action( 'AHEE_event_details_before_featured_img', $post ); ?>		
	
			<?php the_post_thumbnail('Featured Image'); ?>
        	
		<?php do_action( 'AHEE_event_details_after_featured_img', $post );?>
		

<!-- ///////////////////////////  -->
        <div class="event_description clearfix">
            <div class="times droptop_p">
                <div class="start_date">
                    <?php espresso_get_template_part( 'content', 'espresso_events-datetimes' );
				espresso_get_template_part( 'content', 'espresso_events-venues' ); ?>
                </div>
            </div>
            <?php espresso_get_template_part( 'content', 'espresso_events-details' );
			 ?>
        </div>
    
<!-- //////////////  -->

	
		<?php //espresso_get_template_part( 'content', 'espresso_events-details' ); ?>
		<?php //espresso_get_template_part( 'content', 'espresso_events-tickets' ); ?>
		<?php //espresso_get_template_part( 'content', 'espresso_events-venues' ); ?>
        
	
</article>
</div>
</div>
<!-- #post -->
<?php do_action( 'AHEE_event_details_after_post', $post );

