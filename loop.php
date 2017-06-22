<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h2 class="blog-filter-title">Not Found</h2>
		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h3 class="entry-title">
	        	<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
	          <?php the_title(); ?>
	         </a>
      	</h3>

      	<div class="entry-meta">
      	  <?php hackeryou_posted_on(); ?>
      	</div><!-- .entry-meta -->

			<?php $featuredImage = featured_image_url($post); ?>
         <a href="<?php the_permalink() ?>"><img src="<?php echo $featuredImage ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a>

			<section class="entry-content">
				<?php the_excerpt() ?>
				<?php wp_link_pages( array(
          'before' => '<div class="page-link"> Pages:',
          'after' => '</div>'
        )); ?>
			</section><!-- .entry-content -->


		</article><!-- #post-## -->

		<?php comments_template( '', true ); ?>


<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<div id="nav-below" class="navigation clearfix">
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	  <p class="nav-previous"><?php next_posts_link('< Older Entries'); ?></p>
	  <p class="nav-next"><?php previous_posts_link('Newer Entries >'); ?></p>
	<?php endif; ?>
</div>
