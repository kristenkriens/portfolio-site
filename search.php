<?php get_header(); ?>
<div class="main">
	<div class="container">

		<div class="content">
			<?php if ( have_posts() ) : ?>

				<h2>Search Results for: <?php echo get_search_query(); ?></h2>
				<?php get_template_part( 'loop', 'search' ); ?>

			<?php else : ?>

				<h3>Nothing Found</h3>
				<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div> <!-- /.content -->

		<?php get_sidebar(); ?>

	</div><!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>
