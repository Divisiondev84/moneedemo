<?php get_header(); ?>

<div class="main_container">
    <div class="main_column1">
        <div class="micro_container">
            <div class="micro_marquee"><img src="<?php the_field('event_marque',$post->ID); ?>" /></div>
            <div class="micro_slideshow">
				<?php if( have_rows('slideshow_images') ): while ( have_rows('slideshow_images') ) : the_row(); ?>
					<img src="<?php the_sub_field('slide',$post->ID); ?>" />
				<?php endwhile; endif; ?>
            </div>
            <div class="micro_nav">
                <div class="micro_nav_item micro_current" data-swap="schedule">Schedule</div>
                <div class="micro_nav_item" data-swap="sponsors">Sponsors</div>
                <div class="micro_nav_item" data-swap="about">About</div>
                <div class="micro_nav_item" data-swap="forms">Forms</div>
                <div class="micro_nav_item" data-swap="garage">Garage Sale</div>
            </div>
            <div class="micro_content"></div>
            <div class="micro_marquee"><img src="<?php the_field('event_marque_footer',$post->ID); ?>" /></div>
        </div>
    </div>
    <?php //get_sidebar(); ?>
</div>

<div id="events" class="micro_hide">
    <div class="micro_schedule">
    <?php
                          
      if( have_rows('event_info') ): 
          while ( have_rows('event_info') ) : the_row();
    ?>
              <div class="micro_schedule_partday">
                  <div style="float:left; width:40%;">
                      <?php if(get_sub_field('image')){ ?>
					  	<img src="<?php the_sub_field('image'); ?>" width="100%" />
					  <?php } ?>
                      <br/>
                      <?php echo '<div class="micro_schedule_fullday">'.date("l, F d", strtotime(get_sub_field('event_name'))).'</div>'; ?>
                      <br/>
                      <em>
                      <?php echo get_sub_field('event_time'); ?>
                      <?php if(get_sub_field('end_time')){ ?>
                      -
                      <?php echo get_sub_field('end_time'); }?>
                      </em>
                  </div>
                  <div style="float:right; width:55%;">
                      <?php echo get_sub_field('event_description'); ?>
                  </div>
              </div>
    <?php
          endwhile;
      endif;
    ?>
    </div>
</div>


<div id="schedule" class="micro_hide">
	<?php
    if( have_rows('schedule') ):
        while ( have_rows('schedule') ) : the_row();
    ?>
    		<div class="micro_schedule">
    <?php
				
				echo '<div class="micro_schedule_fullday">'.date("l, F d", strtotime(get_sub_field('event_day'))).'</div>';
					
				if( have_rows('event_info') ): 
					while ( have_rows('event_info') ) : the_row();
	?>
    					<div class="micro_schedule_partday">
                            <div style="float:left; width:30%;">
                                <strong><?php echo get_sub_field('name'); ?></strong>
                                <br/>
                                <em>
								<?php echo get_sub_field('start_time'); ?>
								<?php if(get_sub_field('end_time')){ ?>
                                -
                                <?php echo get_sub_field('end_time'); }?>
                                </em>
                            </div>
                            <div style="float:right; width:65%;">
								<?php if(get_sub_field('image')){ ?>
                                  <img src="<?php the_sub_field('image'); ?>" width="40%" style="float:left; margin-right:10px; margin-bottom:5px;" />
                                <?php } ?>
                                <?php echo get_sub_field('short_description'); ?>
                            </div>
                        </div>
    <?php
					endwhile;
				endif;
    ?>
    		</div>
    <?php
        endwhile;
    endif;
    ?>
</div>


<div id="sponsors" class="micro_hide">
	
    <?php if( have_rows('top_sponsor_logos') ): 
			while ( have_rows('top_sponsor_logos') ) : the_row(); ?>
    			<img src="<?php the_sub_field('logos'); ?>" width="100%" />
    		<?php endwhile;
    	endif;
    ?>
		
</div>


<div id="about" class="micro_hide">
	<?php echo the_field('about'); ?>
</div>


<div id="forms" class="micro_hide">
        <div class="micro_schedule"> 
    <?php
        
          
        if( have_rows('form') ): 
          while ( have_rows('form') ) : the_row();
  ?>
              <?php echo the_field('garage_sale_body'); ?>
              <div class="micro_schedule_partday">
                            <div style="float:left; width:40%;">
                                <a href="<?php echo get_sub_field('form_download'); ?>" style="text-decoration:none;" target="_blank">
                                <strong><?php echo get_sub_field('form_title'); ?></strong>
                                <br/>
                                <em><small>Click to view</small></em>
                                </a>
                            </div>
                            <div style="float:right; width:55%;">
                                <?php echo get_sub_field('form_description'); ?>
                            </div>
                        </div>
    <?php
          endwhile;
        endif;
    ?>
        </div>
</div>


<div id="garage" class="micro_hide">
        <div class="micro_schedule">
    <?php
        
          
        if( have_rows('garage_sale_form') ): 
          while ( have_rows('garage_sale_form') ) : the_row();
  ?>
              <div class="micro_schedule_partday">
                            <div style="float:left; width:40%;">
                                <a href="<?php echo get_sub_field('garage_form_download'); ?>" style="text-decoration:none;" target="_blank">
                                <strong><?php echo get_sub_field('garage_sale_form_title'); ?></strong>
                                <br/>
                                <em><small>Click to view</small></em>
                                </a>
                            </div>
                            <div style="float:right; width:55%;">
                                <?php echo get_sub_field('garage_form_description'); ?>
                            </div>
                        </div>
    <?php
          endwhile;
        endif;
    ?>
        </div>
</div>


    
<?php get_footer(); ?>
