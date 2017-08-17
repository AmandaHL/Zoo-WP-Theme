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
<a href="https://www.facebook.com/ZOOFans.fan" target="_blank"><i class="socicon-facebook"></i></a><!--FB-->
<a href="https://twitter.com/ZOOFans"><i class="socicon-twitter"></i></a><!--Twitter-->
<a href="https://www.linkedin.com/company/zoo-fans"><i class="socicon-linkedin"></i></a><!--LinkedIn-->
<a href="https://www.youtube.com/user/ZOOFans"><i class="socicon-youtube"></i></a><!--Youtube-->
<a href="https://plus.google.com/+Zoofans/about"><i class="socicon-googleplus"></i></a><!--Google+-->
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