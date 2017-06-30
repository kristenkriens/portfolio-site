<?php get_header(); ?>

<main id="main" class="main">
  <div class="container">

    <section class="content">
      <h2>Tag Archives: <?php single_tag_title(); ?></h2>
      <?php get_template_part( 'loop', 'tag' ); ?>
    </section> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div><!-- /.container -->
</main><!-- /.main -->

<?php get_footer(); ?>
