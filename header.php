<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); wp_cache_flush(); ?>>
<!--<![endif]-->
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]--> 
<?php wp_head(); ?>
<link rel="stylesheet" href="http://villageofmonee.org/css/font-awesome.min.css" type="text/css" media="all">
</head>

<body <?php body_class(); ?>>
		

        <div id="header">
				<?php 
				query_posts(array('posts_per_page' => '-1', 'post_type' => 'ditty_news_ticker'));
                	while ( have_posts() ) : the_post();
                    	echo do_shortcode('[ditty_news_ticker id="'.$post->ID.'"]');
                	endwhile; wp_reset_query(); 
				?>
          <div class="container">
              <a href="<?php bloginfo('wpurl') ?>"><img src="<?php bloginfo('template_directory')?>/images/text_logo.png" class="logo" /></a>
          </div>
        </div>
        
		<nav id="site-navigation" class="main-navigation" role="navigation">
        	<div id="nav-case">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                <div class="nav-share">
                    <?php include('inc/add-this.php') ?>
                    
                </div>
                <a href="http://www.facebook.com/villageofmonee" target="_blank">
                <div class="nav-share"><img src="<?php bloginfo('template_directory') ?>/images/icon-fb.png" /></div>
                </a>
                <a href="<?php bloginfo('wpurl') ?>/calendar/">
                	<div class="nav-cal"><?php echo date('d'); ?></div>
                </a>
            </div>
		</nav><!-- #site-navigation -->

		