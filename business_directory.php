<?php
/**
 * Template Name: Business Directory
 */
 get_header();
?>

    <div class="main_container">
        <div class="main_column3">
            <?php ?>

                <h1 class="content_title"><?php the_title(); ?></h1>
                <div><?php while ( have_posts() ) : the_post(); the_content();  endwhile;?></div>
				
				  <?php 
                  $terms = get_terms("directory-categories");
                  $count = count($terms);
                  if ( $count > 0 ){
                     
                     foreach ( $terms as $term ) { ?>
                     <div class="directory_category">
                     
                  	 <div class="sub_title"><?php echo $term->name; ?></div>
                  
                  <?php
						   query_posts(array('posts_per_page' => '-1', 'orderby'=>'title', 'order'=>'ASC', 'post_type' => array('directory'),'tax_query' => array(array(
						  'taxonomy' => 'directory-categories',
						  'field' => 'slug',
						  'terms' => $term->slug)))); ?>

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
							<?php endwhile;?>
                     </div>
				  <?php
                     }
                  }
                  ?>
                
            <?php  ?>
        </div>
    </div>

<?php get_footer(); ?>