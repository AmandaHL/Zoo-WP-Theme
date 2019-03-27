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
<a href="" target="_blank"><span class="icon-facebook"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/401-facebook.svg" alt="Facebook"></span></a><!--FB-->
<a href=""><span class="icon-twitter"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/407-twitter.svg" alt="Twitter"></span></a><!--Twitter-->
<a href=""><span class="icon-linkedin2"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/459-linkedin2.svg" alt="LinkedIn"></span></a><!--LinkedIn-->
<a href=""><span class="icon-youtube"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/414-youtube.svg" alt="YouTube"></span></a><!--Youtube-->
<a href=""><span class="icon-google-plus"><img src="<?php echo get_template_directory_uri();?>/images/social-icons/396-google-plus.svg" alt="Google+"></span></a><!--Google+-->
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
COPYRIGHT &copy; <?php echo date('Y'); ?> **COMPANY NAME**. ALL RIGHTS RESERVED.  
</p><!--.copyright-->
</div><!--.bottom-footer-->
</footer>
</div><!--#wrapper-->
<?php wp_footer();?>
</body>
</html>