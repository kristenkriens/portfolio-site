<footer>
  <div class="container">
  	 <div class="footer-text">
    	<p>&copy; Kristen Kriens <?php echo date('Y'); ?>. Inspired by the <a href="https://themeforest.net/item/craft-multipurpose-responsive-wordpress-theme/8728255" target="_blank">Craft</a> theme.</p>
    </div>
    <ul class="footer-links">
	    <?php
	      if(have_rows('social_links', 'options')) {
	        while(have_rows('social_links', 'options')) {
	          the_row();
	          ?>
	          <li class="footer-link">
              <a href="<?php the_sub_field('social_link_url', 'options'); ?>" title="<?php the_sub_field('social_link_name', 'options'); ?>" target="_blank">
  	             <i class="fa fa-<?php the_sub_field('social_link_name', 'options'); ?>" aria-hidden="true"></i>
  	          </a>
            </li>
	          <?php
	        } // end while
	      } // end if
	    ?>
	 </ul>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
