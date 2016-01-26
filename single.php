<?php 
	if (get_post_type() == 'post'){ get_header(); ?>
			<div class="main_container">
            	<div class="main_column1">
					<?php 
                        while ( have_posts() ) : the_post();
                            get_template_part('post-templates/post-contents/content', get_post_format());  
                        endwhile; 
                    ?>
                </div>
                <?php get_sidebar(); ?>
        	</div>
		<?php get_footer(); 
	}else{
		get_template_part('post-templates/single', get_post_type());
	}
?>