<?php
/**
 * Template Name: db testing
 */
 get_header();
?>
    <div class="main_container">
        <div class="main_column3">
            <h1 class="content_title"><?php the_title(); ?></h1>
            <?php  $choices = get_field_object('field_54a15fcd56cb7');  ?>
            <?php foreach ($choices['choices'] as $choice) {  ?>
            <?php 
                    query_posts(array('posts_per_page' => '-1', 'orderby'=>'title', 'order'=>'ASC', 'post_type' => 'license', 'post_status' => array( 'publish', 'draft' ), 'meta_query' => array(array('key' => 'business_category','value' => $choice, 'compare' => '='))));
                    if (have_posts()){}else{continue;}
             ?>

<div class="directory_category">
    <div class="sub_title"><?php echo $choice; ?></div>
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="directory_box"> 
        <h2><a href="<?php bloginfo('wpurl'); ?>/monee-directory/business/?bid=<?php echo $post->ID; ?>"><?php the_title(); ?></a></h2>
        <div class="directory_address">
            <?php if(get_post_meta($post->ID,'business_info_address',true)){ ?>
                <?php echo get_post_meta($post->ID,'business_info_address',true); ?> <br>
                <?php echo get_post_meta($post->ID,'business_info_city',true); ?>, 
                <?php echo get_post_meta($post->ID,'business_info_state',true); ?> 
                <?php echo get_post_meta($post->ID,'business_info_zip',true); ?><br>
             <?php } ?>
            <a href="<?php bloginfo('wpurl'); ?>/monee-directory/business/?bid=<?php echo $post->ID; ?>" class="read_more">More Info »</a>
         </div>
     </div>
    <?php endwhile; wp_reset_query(); }  ?>
</div>
        
        </div>
    </div>

<?php get_footer(); ?>