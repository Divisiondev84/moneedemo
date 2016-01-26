<div class="footer">
	<div class="footer_container">
    	<div class="footer_column">
        	<div class="title">Residents</div>
            <?php wp_nav_menu( array('menu' => 'Residents', 'before' =>'', 'after' => '', 'container' => false,'items_wrap' => '%3$s')); ?>
        </div>
    	<div class="footer_column">
        	<div class="title">Visitors</div>
            <?php wp_nav_menu( array('menu' => 'Visitors', 'before' =>'', 'after' => '', 'container' => false,'items_wrap' => '%3$s')); ?>
        </div>
    	<div class="footer_column">
        	<div class="title">Business</div>
            <?php wp_nav_menu( array('menu' => 'Business & Industry', 'before' =>'', 'after' => '', 'container' => false,'items_wrap' => '%3$s')); ?>
        </div>
    	<div class="footer_column">
        	<div class="title">Government</div>
            <?php wp_nav_menu( array('menu' => 'Government', 'before' =>'', 'after' => '', 'container' => false,'items_wrap' => '%3$s')); ?>
        </div>
    	<div class="footer_column">
        	<div class="title">Local News</div>
            <?php wp_nav_menu( array('menu' => 'News', 'before' =>'', 'after' => '', 'container' => false,'items_wrap' => '%3$s')); ?>
        </div>
    </div>
	<div class="footer_logo">
    	<a href="<?php bloginfo('wpurl'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/footer_logo.png" /></a>
        <div class="footer_info">Monee © <?php echo date('Y');?>. All rights reserved.</div>
    </div>
	<div class="footer_under">
    	<div class="footer_left">P: 708.534.8301 <br/> F: 708.534.0694</div>
    	<div class="footer_right">5130 W. Court St. <br/> Monee, IL 60449</div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<?php if(get_post_type() == 'microsite'){
	 wp_deregister_script( 'jquery' );
?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="<?php echo bloginfo('template_directory');?>/js/jquery.slides.js"></script>

    
    <script type="text/javascript">
    $( document ).ready(function() {
						
		var firstNavigator = $('.micro_current').attr('data-swap');
		$('.micro_content').html($('#'+firstNavigator).html());
        
        $( ".micro_nav_item" ).click(function() {
			var newNavigator = $(this).attr('data-swap');
			
			$( ".micro_current" ).addClass('micro_nav_item');
			$( ".micro_nav_item" ).removeClass('micro_current');
			
			$( this ).addClass('micro_current');
			
			$('.micro_content').slideUp('slow',function(){
				$('.micro_content').html($('#'+newNavigator).html());
				$('.micro_content').slideDown('slow',function(){});
			});
        });
    
		$(".micro_slideshow").slidesjs({
		  width: 750,
		  height: 400,
		  navigation: {active: false},
		  pagination: {active: false},
		  play: {
			active: false,
			  // [boolean] Generate the play and stop buttons.
			  // You cannot use your own buttons. Sorry.
			effect: "fade",
			  // [string] Can be either "slide" or "fade".
			interval: 5000,
			  // [number] Time spent on each slide in milliseconds.
			auto: true,
			  // [boolean] Start playing the slideshow on load.
			swap: true,
			  // [boolean] show/hide stop and play buttons
			pauseOnHover: false
			  // [boolean] pause a playing slideshow on hover
			  // [number] restart delay on inactive slideshow
		  },
		  effect: {
			slide: {
			  speed: 200
			},
			fade: {
			  speed: 1000,
			  crossfade: true
			}
		  }
		});  
		
           
    });	
    </script>
<?php } ?>

<script type="text/javascript">
		$("#tribe-events a.tribe-events-button").html("+ Add Events To Calendar");
		$("#tribe-events a.tribe-events-button").attr("href","http://villageofmonee.org/popup/ics.php");
		$("#tribe-events a.tribe-events-button").attr("onclick","javascript:void window.open('http://villageofmonee.org/popup/ics.php','1423778651940','width=500,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=0,top=0');return false;");
</script>

<?php wp_footer(); ?>

</body>
</html>