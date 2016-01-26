<?php
/**
 * Template Name: Micro Directory
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
				<?php query_posts(array('posts_per_page' => '-1', 'orderby'=>'title', 'order'=>'ASC', 
                'post_type' => array('directory'),'tax_query' => array(array(
                'taxonomy' => 'directory-categories',
                'field' => 'slug',
                'terms' => $taxonomy_slug)))); ?>
                
                <?php while ( have_posts() ) : the_post();
				$csz = 'Monee, IL 60449';
				if(get_post_meta($post->ID, 'wpcf-directory-csz', true)){$csz = get_post_meta($post->ID, 'wpcf-directory-csz', true);} ?> 

                    <div class="directory_box"> 
                        <h2><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2> 
                        <div class="directory_address">
                            <?php echo get_post_meta($post->ID, 'wpcf-directory-address', true);
                            if(get_post_meta($post->ID, 'wpcf-directory-address-2', true)){ ?>, 
                                <?php echo get_post_meta($post->ID, 'wpcf-directory-address-2', true); ?>
                            <?php } ?>
                             <br/>
                            <?php echo $csz; ?>
                             <br/>
                             <a href="<?php the_permalink(); ?>" class="read_more">More Info &raquo;</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
        </div>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>