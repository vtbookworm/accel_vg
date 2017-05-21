<?php
/**
 * The template for displaying the archive of case studies
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>
<div class="archive-case-studies">
	<div id="primary" class="site-content">
		<div id="content" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php //the_content(); ?>
				<?php $services = get_field('services');
					  $client = get_field('client');
					  $site_link = get_field('site_link');
					  $image1 = get_field('image_1');
					  $size = "full";
				?>
				<article class="case-studies clearfix">
				
					<section class="case-studies-content">

						<h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<h4><?php echo $services; ?></h4>

						<p><?php the_excerpt(); ?></p>

						<a class="view-project" href="<?php echo the_permalink(); ?>">View Project ></a>

					</section>

					<section class="case-studies-images">
						<?php if($image1) { ?>
						<a href="<?php echo the_permalink(); ?>">
							<?php echo wp_get_attachment_image( $image1, $size ); ?>
						</a>
						<?php } ?>
					</section>

				</article>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div>
	<!-- No sidebars in this theme -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>