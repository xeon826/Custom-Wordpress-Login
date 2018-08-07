<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage DELT
 * @since DELT 1.0
 */

get_header('login');

		$related = get_posts( array( 'category__not_in' => array(316, 314), 'posts_per_page' => 1, 'post__not_in' => $do_not_duplicate  ) );
		if( $related ) foreach( $related as $post ) {
			setup_postdata($post);
			$do_not_duplicate[] = $post->ID;
?>
	<div class="background-image" style='background-image: url("<?php the_post_thumbnail_url();?>")'>
	</div>
	<div id="primary" class="content-area login" >
		<main id="main" class="site-main" role="main">

		<?php
	}
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'login' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
// get_footer(); 
?>
