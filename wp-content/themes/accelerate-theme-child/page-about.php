<?php
/**
 * The template for displaying the services on the About Us page
 * Template Name: About
 * Template Post Type: services
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

<section class="bkgd-image">
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
					$list_services = get_field('list_services');
					$list_overview = get_field('overview_services');
					$tag_line = get_field('tag_line');
					$button_text = get_field('button_text');
				?>

				<div class="about-text">
					<p><?php the_content(); ?></p>
				</div>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
</section>	
<div class="about-page site-content">
<section class="about-overview clearfix">
	<div class="clearfix"></div>
	<div class="about-overview site-content">
		<h3><?php echo $list_services; ?></h3>
		<p><?php echo $list_overview; ?></p>
	</div>
</section>			


<section class="about-services site-content">
	<div class="about-services">
		<?php query_posts('post_type=Services'); ?>
		<div class="services-section site-content">
			<?php while (have_posts() ) : the_post(); ?>
				<div class="svc-area clearfix">
					<?php
						$image = get_field('graphic');
						$size = "full";
						// Add a test to display graphics on alternating sides of the content
						if ($wp_query->current_post % 2 == 0) {
							$image_side = "left-aligned";
							$text_side = "right-aligned";
						}
						else {
							$image_side = "right-aligned";
							$text_side = "left-aligned";
						}
					?>
					<div class="svc">
						<figure class="svc-image <?php echo $image_side; ?>">
							<?php if ($image) {
								echo wp_get_attachment_image($image, $size);
							} ?>
						</figure>

						<div class="services-text">
							<h3 class="svc-title"><?php echo the_title(); ?></h3>
							<p class="svc-text <?php echo $text_side; ?>"><?php echo the_content(); ?></p>
						</div> <!-- services-text -->
					</div> <!-- svc -->
				</div><!-- services-section -->	
			<?php endwhile; // end of the loop. ?>
			<?php wp_reset_query(); ?>
		</div><!-- about-services -->	
	</div>
</section>
</div>
<section class="about-contact-us site-content clearfix">
	<div class="about-contact-us">	
		<h4><?php echo $tag_line; ?></h4>
		<h5 class="button about-contact-us-button">
			<a href="<?php echo home_url(); ?>/contact"><?php echo $button_text; ?></a>
		</h5>
	</div>
</section class="site-content">	
					
<!-- No sidebars in this theme -->
<?php //get_sidebar(); ?>

<div class="clearfix"></div>
<div id="about-footer">
	<?php get_footer(); ?>
</div>