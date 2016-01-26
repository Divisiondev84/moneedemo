<?php global $post; ?>
<?php if ( espresso_event_phone( $post->ID, FALSE ) != '' ) : ?>
	<p>
		<span class="small-text"><strong><?php _e( 'Event Phone:', 'event_espresso' ); ?> </strong></span> <?php espresso_event_phone( $post->ID ); ?>
	</p>
<?php endif; ?>
<?php 
	do_action( 'AHEE_event_details_before_the_content', $post ); 
	if (( is_archive() && has_excerpt( $post->ID )) || apply_filters( 'FHEE__EES_Espresso_Events__process_shortcode__true', FALSE )) {
		the_excerpt();
	} else {
		the_content();
	}
	do_action( 'AHEE_event_details_after_the_content', $post ); 
?>
