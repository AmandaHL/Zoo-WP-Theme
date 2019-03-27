<section class="top-footer">
	<div>
<nav class="footer1">
<?php wp_nav_menu( array(
	'theme_location' => 'top-footer-menu', 
   	'menu_class' => 'top-footer-links'
)
);
?>

</nav>
<div class="social-follow">
<a href="https://www.facebook.com/ZOOFans.fan" target="_blank"><span class="icon-facebook"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/401-facebook.svg" alt="Facebook"></span></a><!--FB-->
<a href="https://twitter.com/ZOOFans"><span class="icon-twitter"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/407-twitter.svg" alt="Twitter"></span></a><!--Twitter-->
<a href="https://www.linkedin.com/company/zoo-fans"><span class="icon-linkedin2"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/459-linkedin2.svg" alt="LinkedIn"></span></a><!--LinkedIn-->
<a href="https://www.youtube.com/user/ZOOFans"><span class="icon-youtube"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/414-youtube.svg" alt="YouTube"></span></a><!--Youtube-->
<a href="https://plus.google.com/+Zoofans/about"><span class="icon-google-plus"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/396-google-plus.svg" alt="Google+"></span></a><!--Google+-->
</div><!--social follow-->
</div>	
</section><!--top-footer-->
<footer>
<div class="bottom-footer">
<nav class="footer2">
<?php wp_nav_menu( array(
	'theme_location' => 'footer-menu', 
   	'menu_class' => 'footer-links'
)
);
?>
</nav>
<p class="copyright">
ZOO FANS IS A TRADEMARK OF ZOO FANS INC. COPYRIGHT &copy; <?php echo date('Y'); ?> ZOO FANS INC. ALL RIGHTS RESERVED. BOULDER, CO<br> 
PRODUCTS ON THIS WEBSITE MAY BE COVERED BY THE FOLLOWING U.S. AND INTERNATIONAL PATENTS: D631148, 138172, 001790452-0001, 338608 AND OTHER PATENTS PENDING.  
</p><!--.copyright-->
</div><!--.bottom-footer-->
</footer>
</div><!--#wrapper-->
<?php wp_footer();?>
</body>
</html>