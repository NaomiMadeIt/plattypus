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

		<?php the_post_thumbnail( 'thumbnail' ); ?>

		<div class="entry-content">
			<?php 
			if( is_singular() ){
				//single post, page, attachment, etc
				the_content();
				wp_link_pages( array(
					'before' => '<div class="pagination">Pages:',
					'after'	=> '</div>',
					'pagelink' => '<span>%</span>',
					'next_or_number' => 'next',
				) );
			}else{
				//not singular : archives, blog, search results
				the_excerpt();				
			} ?>
		</div>
		<div class="postmeta">
			<span class="author">by: <?php the_author(); ?> </span>
			<span class="date"> <?php the_date(); ?> </span>
			<span class="num-comments"> <?php comments_number(); ?> </span>
			<span class="categories"><?php the_category(); ?></span>
			<span class="tags"><?php the_tags(); ?></span>
		</div>
		<!-- end .postmeta -->
	</article>
	<!-- end .post -->
	<?php 
		} //end while

		platty_pagination();

		comments_template( '/comments.php', true ); //include comments.php or WP default

	}//end if there are posts
	else{
		echo 'Sorry, no posts to show';
	} 
	?>

	
</main>
<!-- end #content -->


<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>