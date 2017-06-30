<?php get_header(); ?>

<main id="main" class="main">
  <div class="container">
    <section class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2 class="entry-title"><?php the_title(); ?></h2>

          <div class="entry-meta">
            <?php hackeryou_posted_on(); ?>
          </div><!-- .entry-meta -->

          <?php $featuredImage = featured_image_url($post); ?>
          <img src="<?php echo $featuredImage ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">

          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

        <div id="nav-below" class="navigation clearfix">
          <p class="nav-previous"><?php previous_post_link('%link', '< %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title >'); ?></p>
        </div><!-- #nav-below -->

        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>

    </section> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</main> <!-- /.main -->

<?php get_footer(); ?>
