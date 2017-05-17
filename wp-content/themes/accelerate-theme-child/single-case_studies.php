<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $services = get_field('services');
					  $client = get_field('client');
					  $link = get_field('site_link');
					  $image1 = get_field('image_1');
					  $image2 = get_field('image_2');
					  $image3 = get_field('image_3');
					  $size = "full";
				?>
				<article class="case-studies">
					<section class="case-studies-content">

						<h2><?php the_title(); ?></h2>

						<h4><?php echo $services; ?></h4>

						<h5>Client: <?php echo $client ?></h5>
						
						<p><?php the_content(); ?></p>

						<a href="<?php echo $site_link; ?>">Visit Live Site</a>

					</section>

					<section class="case-studies-images">
						<?php if($image1) { 
							echo wp_get_attachment_image( $image1, $size );
						} ?>
						<?php if($image2) { 
							echo wp_get_attachment_image( $image2, $size );
						} ?>	
						<?php if($image3) { 
							echo wp_get_attachment_image( $image3, $size );
						} ?>


					</section>

				</article>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<!-- No sidebars in this theme -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>