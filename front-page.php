<?php get_header(); ?>

<main id="content">
	<?php
		//check to see if the slider plugin exists before running its function
		if( function_exists( 'nkr_slider' ) ){
			nkr_slider();
		}
	?>

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

	<?php
		//get up to 5 Latest products
		$products = new WP_Query( array(
			'post_type' 				=> 'product',
			'posts_per_page' 		=> 5,
		) );

		if( $products->have_posts() ){
	?>
	<div class="featured-products">
		<h2>Featured Products:</h2>
		<ul>
			<?php
				while( $products->have_posts() ){
					$products->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<div class="caption">
						<h3><?php the_title(); ?></h3>
						<?php platty_price(); ?>
					</div>
				</a>
			</li>
			<?php } //end while
			wp_reset_postdata(); ?>
		</ul>
	</div>
	<?php } //end of custom query loop ?>

</main>

<?php get_sidebar('home'); //include sidebar-home.php ?>
<?php get_footer(); ?>
