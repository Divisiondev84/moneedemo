<?php wp_reset_query(); ?>

<div class="main_column2">

	<?php if(get_post_meta($post->ID,'wpcf-resource-links',true)){ ?>
        <div class="widget_item">
          <h3 class="widget_title">Resources</h3>
          <?php echo get_post_meta($post->ID,'wpcf-resource-links',true); ?>
        </div>
	<?php }  wp_reset_query(); ?>

<?php 
	$sidebar_group = get_post_meta($post->ID,'wpcf-sidebar-items',true);
	$sidebar_group = explode(",", $sidebar_group); 
	?>
	<?php query_posts(array('posts_per_page' => '-1', 'post_type' => 'any', 'post__in' => $sidebar_group)); ?>
	<ul class="dpe-flexible-posts">
	<?php while( have_posts() ) : the_post(); ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a href="<?php echo the_permalink(); ?>">
			<h3 class="widget_title">
			<?php if(get_post_meta($post->ID,'wpcf-featured-sidebar-title',true))
			{echo get_post_meta($post->ID,'wpcf-featured-sidebar-title',true);}else{the_title();} 
			?>
            </h3>
				<?php
						// If the post has a feature image, show it
						if( has_post_thumbnail() ) {
							the_post_thumbnail( "Home Features" );
						// Else if the post has a mime type that starts with "image/" then show the image directly.
						} elseif( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) {
							echo wp_get_attachment_image( $post->ID, $thumbsize );
						}
				?>
			</a>
            <?php echo get_post_meta($post->ID,'wpcf-featured-sidebar-excerpt',true); ?>
		</li>
	<?php endwhile; ?>
	</ul><!-- -->


<?php wp_reset_query(); ?>    


<?php 
	$post_id = $post->ID; 
	$category = wp_get_post_terms($post_id, 'directory-categories'); 
	$category_term = array_pop($category);
	if (get_post_type() == 'directory') :
	query_posts(array('posts_per_page' => '5', 'post__not_in' => array($post_id), 'post_type' => 'directory', 'orderby' => 'rand', 
	'tax_query' => array(array('taxonomy' => 'directory-categories','field' => 'id','terms' => $category_term->term_id))));
		if (have_posts()) : ?>
			<div class="widget_item">
			<h3 class="widget_title">
				More In 
				<?php  
				echo $category_term->name;
				?>
			</h3>
			</div>
		<?php while (have_posts()) : the_post(); ?>
			<a class="directory_more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php endwhile; ?>
	<?php endif; ?>
<?php endif; wp_reset_query(); ?> 


<?php $post_id = $post->ID; if (get_post_type() == 'post') : ?>
	
	<?php query_posts(array('posts_per_page' => '2', 'post__not_in' => array($post_id), 'post_type' => 'post', 'orderby' => 'ASC'));
		if (have_posts()) : ?>
		<h3 class="widget_title">More In The News</h3>
		<?php while (have_posts()) : the_post(); ?>
			<div style="float:left; margin-bottom:20px;">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('Home Features') ?></a>
				<a class="directory_more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		<?php endwhile; ?>
	<?php endif;  wp_reset_query(); ?>
	
    <!--
	<?php query_posts(array('posts_per_page' => '2', 'post__not_in' => array($post_id), 'post_type' => 'post', 'orderby' => 'ASC'));
		if (have_posts()) : ?>
		<h3 class="widget_title">Upcoming Events</h3>
		<?php while (have_posts()) : the_post(); ?>
			<div style="float:left; margin-bottom:20px;">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('Home Features') ?></a>
				<a class="directory_more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
    -->
    
<?php endif; wp_reset_query(); ?> 


</div>