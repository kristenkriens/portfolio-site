<?php get_header(); ?>

<main id="main" class="main">
  <div class="container">
    <section class="content">
      <h2>Category Archives: <?php single_cat_title(); ?></h2>
    	<?php
    		$category_description = category_description();
    		if ( ! empty( $category_description ) )
    			echo '' . $category_description . '';
    	   get_template_part( 'loop', 'category' );
        ?>

    </section> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</main> <!-- /.main -->

<?php get_footer(); ?>
