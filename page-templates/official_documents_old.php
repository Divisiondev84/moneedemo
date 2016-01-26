<?php
/**
 * Template Name: Official Documents Old
 */
 get_header();
?>

    <div class="main_container">
        <div class="main_column1">
            <?php while ( have_posts() ) : the_post(); ?>

                <h1 class="content_title"><?php the_title(); ?></h1>
                <div class="featured_image"><?php the_post_thumbnail('Featured Image') ?></div>
                <div><?php the_content(); ?></div>
                
            <?php $taxonomy_slug = get_post_meta($post->ID, 'wpcf-taxonomy-slug', true); endwhile;  ?>
				
            <div>
				<?php query_posts(array(
				'posts_per_page' => '15', 
				'meta_key' => 'wpcf-village-document-date',
				'orderby' => 'meta_value',
        		'order' => 'DESC', 
                'post_type' => array('village-document'),
				//'' => ''
				//'tax_query' => array(array(
                //'taxonomy' => 'directory-categories',
                //'field' => 'slug',
                //'terms' => $taxonomy_slug))
				)); ?>
                
                <?php while ( have_posts() ) : the_post(); ?> 

                    <div class="directory_box"> 
                        <h2><a href="<?php echo get_post_meta($post->ID, 'wpcf-village-document', true);?>" target="_blank"><?php the_title(); ?></a></h2> 
                        <div class="document_info">
                        	<a href="<?php echo get_post_meta($post->ID, 'wpcf-village-document', true);?>" target="_blank">
                        		<img src="<?php bloginfo('template_directory') ?>/images/icon-pdf.png" class="icon-pdf" /> 
                            </a>
                            <div class="date_info">
							<?php
							echo $eventStartTime = types_render_field('village-document-date', array('format' => 'm/d/Y','style' => 'text'));
							?>
                            <br/>
                            <a href="<?php echo get_post_meta($post->ID, 'wpcf-village-document', true);?>" target="_blank" class="read_more"> 
                              Download Now
                            </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>