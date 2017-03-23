<?php get_header(); //include header.php ?>

<main id="content">
	<?php
	if( have_posts() ){
		while( have_posts() ){
			the_post();
	 ?>
	<article <?php post_class(); ?>>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>

		<?php the_post_thumbnail( 'large' ); ?>

		<div class="entry-content">
			<?php platty_price(); ?>
			<?php platty_size(); ?>
			<?php the_content(); ?>
		</div>
	</article>
	<!-- end .post -->
	<?php
		} //end while

		platty_pagination();

		//TODO: make a template for showing "reviews"
		//comments_template( '/comments.php', true ); //include comments.php or WP default

	}//end if there are posts
	else{
		echo 'Sorry, no posts to show';
	}
	?>


</main>
<!-- end #content -->


<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>
