<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up to <div id="content">
 *
 */
 ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url');?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title>ZOO Fans</title>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lateef%7COpen+Sans:300,400,600,700" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />


<?php wp_head();?>
</head>
<body id="top-anchor">

<header>
<div class="top">
<div class="logobox">
<a href="<?php echo home_url();?>">
<img src="<?php echo get_template_directory_uri();?>/images/ZooFans_logo.svg" alt="Zoo Fans, Inc.">
</a>
</div><!--.logobox-->
<div class="right-box">
<div class="help-nav">
<img class="nav-icon" src="<?php echo get_template_directory_uri();?>/images/nav-icon.svg" alt="Mobile Navigation Icon">
<?php get_search_form(); ?>
</div><!--.help-nav-->

<nav class="main-navigation">
 <?php wp_nav_menu( array(
    'theme_location' => 'main-menu', 
    'menu_class' => 'topnav'
)
);
?>

<ul class="mob-social-icons">
<!--<li class="mob-search">
<?php get_search_form(); ?>
</li>-->
</ul>

</nav>
<?php get_search_form(); ?>

<div class="phone-numbers">
<p class="large">###-###-####</p>
<p class="small">###-###-####</p>
</div><!--.phone-numbers-->
</div><!--.right-box-->

</div><!--.top-->
<nav class="secondary-navigation">
<?php wp_nav_menu(array(
    	'theme_location' => 'secondary-menu', 
    	'menu_class' => 'secondnav', 
    	'walker' => new Thumbnail_Walker()
)
);
?>

<div class="drop-down-container">
<div class="header-drop-down">&nbsp;</div>
</div>
</nav>

</header>
<div id="wrapper">