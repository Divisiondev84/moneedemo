<?php
/**
 * Template Name: Official Documents
 */
 get_header();
?>

    <div class="main_container">
        <div class="main_column1">
            <?php while ( have_posts() ) : the_post(); ?>

                <h1 class="content_title"><?php the_title(); ?></h1>
                <div class="featured_image"><?php the_post_thumbnail('Featured Image') ?></div>
                <div><?php the_content(); ?></div>
                
            <?php endwhile;  ?>
				
            <div>
                <div class="directory_box">
                    <h2>Village Board Packet</h2> 
					<?php query_posts(array(
                    'posts_per_page' => '15', 
                    'meta_key' => 'wpcf-village-document-date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC', 
                    'post_type' => array('village-document'),
                    //'' => ''
                    'tax_query' => array(array(
                    'taxonomy' => 'document-type',
                    'field' => 'slug',
                    'terms' => 'village-board'))
                    )); ?>
                    
                    <?php while ( have_posts() ) : the_post(); ?>  
                                <div class="date_info">
                                	<a href="<?php echo get_post_meta($post->ID, 'wpcf-village-document', true);?>" target="_blank" class="read_more_large">
                                		<?php echo $eventStartTime = types_render_field('village-document-date', array('format' => 'm/d/Y','style' => 'text'));?>
                                	</a>
                                </div>
                    <?php endwhile; ?>
                </div>
                <div class="directory_box">
                    <h2>Police Commission</h2> 
					<?php query_posts(array(
                    'posts_per_page' => '15', 
                    'meta_key' => 'wpcf-village-document-date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC', 
                    'post_type' => array('village-document'),
                    //'' => ''
                    'tax_query' => array(array(
                    'taxonomy' => 'document-type',
                    'field' => 'slug',
                    'terms' => 'police-commission'))
                    )); ?>
                    
                    <?php while ( have_posts() ) : the_post(); ?>  
                                <div class="date_info">
                                	<a href="<?php echo get_post_meta($post->ID, 'wpcf-village-document', true);?>" target="_blank" class="read_more_large">
                                		<?php echo $eventStartTime = types_render_field('village-document-date', array('format' => 'm/d/Y','style' => 'text'));?>
                                	</a>
                                </div>
                    <?php endwhile; ?>
                </div>
                <div class="directory_box">
                    <h2>Planning & Zoning</h2> 
					<?php query_posts(array(
                    'posts_per_page' => '15', 
                    'meta_key' => 'wpcf-village-document-date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC', 
                    'post_type' => array('village-document'),
                    //'' => ''
                    'tax_query' => array(array(
                    'taxonomy' => 'document-type',
                    'field' => 'slug',
                    'terms' => 'planning-zoning'))
                    )); ?>
                    
                    <?php while ( have_posts() ) : the_post(); ?>  
                                <div class="date_info">
                                	<a href="<?php echo get_post_meta($post->ID, 'wpcf-village-document', true);?>" target="_blank" class="read_more_large">
                                		<?php echo $eventStartTime = types_render_field('village-document-date', array('format' => 'm/d/Y','style' => 'text'));?>
                                	</a>
                                </div>
                    <?php endwhile; ?>
                </div>
            </div>
            
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>