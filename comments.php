<?php
/**
 * Template for displaying comments and comment form.
 * Include it with comments_template()
 */

//if the post is password protected, exit this file
if( post_password_required( ) ){
	return;
}

//split up the comment counts
$commentcount 	= count( $wp_query->comments_by_type['comment'] );
$pingscount 	= count( $wp_query->comments_by_type['pings'] );
?>

<section class="comments">	
	<?php if( comments_open() AND $commentcount != 0 ){ ?>
	<h3><?php echo $commentcount == 1 ? 'One Comment' : $commentcount . ' Comments' ; ?>
	on this post</h3>
	<?php } ?>

	<?php if( comments_open() ){ ?>	
	<a href="#respond">Leave a Comment</a>
	<?php } ?>

	<ol>
		<?php wp_list_comments( array(
			'type' => 'comment', //only real comments, no pings
		) ); ?>
	</ol>

	<?php 
	if( get_comment_pages_count() > 1 ){
		echo '<div class="pagination">';
		paginate_comments_links();
		echo '</div>';
	} ?>

</section>

<section class="comments-form">
	<?php comment_form(); ?>
</section>


<?php if( $pingscount != 0 ){ ?>
<section class="trackbacks">
	<h3><?php echo $pingscount == 1 ? 'One site links here' : $pingscount . ' Sites link here'; ?></h3>
	<ol>
		<?php wp_list_comments( array(
			'type' => 'pings', //trackbacks and pingbacks
			'short_ping' => true,
		) ); ?>
	</ol>
</section>
<?php } ?>