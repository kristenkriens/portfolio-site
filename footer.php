<footer>
  <div class="container">
  	 <div class="footer-text">
    	<p>&copy; Kristen Kriens <?php echo date('Y'); ?>. <?php the_field('footer_text', 'options'); ?></p>
    </div>
    <div class="footer-links">
	    <?php
	      if(have_rows('social_links', 'options')) {
	        while(have_rows('social_links', 'options')) {
	          the_row();
	          ?>
	          <a href="<?php the_sub_field('social_link_url', 'options'); ?>" target="_blank">
	            <div class="footer-link">
	              <i class="fa fa-<?php the_sub_field('social_link_name', 'options'); ?>" aria-hidden="true"></i>
	            </div>
	          </a>
	          <?php
	        } // end while
	      } // end if
	    ?>
	 </div>
  </div>
</footer>

<script>
// scripts.js, plugins.js and jquery are enqueued in functions.php
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</body>
</html>