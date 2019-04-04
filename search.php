<?php get_header(); ?>
<main id="main" class="main">
	<div class="container">

		<section class="content">
			<?php if ( have_posts() ) : ?>

				<h2>Search Results for: <?php echo get_search_query(); ?></h2>
				<?php get_template_part( 'loop', 'search' ); ?>

			<?php else : ?>

				<h3>Nothing Found</h3>
				<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</section> <!-- /.content -->

		<?php get_sidebar(); ?>

	</div><!-- /.container -->
</main> <!-- /.main -->

<?php get_footer(); ?>
