<?php
/*
Template Name: Products by Brand
*/

//edit these to match your site's needs:
$post_type = 'product';
$taxonomy = 'brand';

 get_header();
 ?>
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

  <?php
    //get all the brands that have products in them
    $terms = get_terms( $taxonomy );
  ?>

  <pre>
    <?php print_r($terms); ?>
  </pre>

  <?php foreach( $terms as $term ){ ?>
  <section class="one-term">
      <h2><?php echo $term->name; ?></h2>

    <ul>
      <?php
        //get all the products in THIS term
        $query = new WP_Query( array(
          'post_type'         => 'product',
          'posts_per_page'    => 3,
          'tax_query'         => array(
            array(
              'taxonomy'    => $taxonomy,
              'terms'       => $term->slug,
              'field'       => 'slug',
            )
          ),
        ) );
        if( $query->have_posts() ){
          while( $query->have_posts() ){
      ?>
      <li>
        <a href="<?php the_permalink(); ?>">
          <?php
            if( $query->current_post == 0 ){
              the_post_thumbnail( 'large' );
            }else{
              the_post_thumbnail( 'thumbnail' );
            }
          ?>
          <h3><?php the_title(); ?></h3>
          <?php  platty_price(); ?>
        </a>
      </li>
      <?php
          } //end while
          wp_reset_postdata();
        } //end if
      ?>
    </ul>
  </section>
  <?php } //end for each term ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
