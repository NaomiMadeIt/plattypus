<?php get_header(); ?>

<main id="content">
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			?>

			<h1 class="page-title">
				<?php the_title(); ?>
			</h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php
		} // end while
	} // end if
	?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>