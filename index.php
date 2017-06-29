<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<main class="main">
  <div class="container">

    <section class="content">
    		<h2 class="blog-filter-title">Blog Posts</h2>
    		<?php get_template_part( 'loop', 'index' );	?>
    </section> <!--/.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</main> <!-- /.main -->

<?php get_footer(); ?>
