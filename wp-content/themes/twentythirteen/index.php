<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php

 $timestamp = wp_next_scheduled( 'queue_cron_posts' );
 echo date('Y-m-d h:i:s A');

var_dump(wp_get_schedules());

var_dump(_get_cron_array());

	$timestamp = time();
	$hora = date('G', $timestamp);
	echo $hora;

  if ($hora < 10 || $hora > 20 ) {
    //We don't send information in these hours
  } else {

    // We get the first draft
    $draft = get_posts( array(
        'post_type'      => 'product',
        'posts_per_page' => 1,
        'post_status'    => 'draft',
        'order'          => 'ASC'
    ) );
    
    // If draft exists
    if ($draft) {
    
      // We get the ID and we change the post_status to publish
			echo 'entra';    
    } // if ($draft)
  } // if($hora)
?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
