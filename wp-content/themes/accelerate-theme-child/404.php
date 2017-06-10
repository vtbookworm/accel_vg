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
			<?php query_posts('posts_per_page=1&post_type=error_404'); ?>
	
			<?php while ( have_posts() ) : the_post(); 
				$image = get_field('image');
				/* $image_location = get_field('image_location'); */
				$image_location = "Left";
				$link1_label = get_field('link_1_label');
				$link1_url = get_field('link_1_url');
				$link2_label = get_field('link_2_label');
				$link2_url = get_field('link_2_url');
				$link3_label = get_field('link_3_label');
				$link3_url = get_field('link_3_url'); 
			?>
				
				<section class="error-404">
					<h2 class="error-title"><?php the_title(); ?></h2>
					<?php if ($image_location == 'Top') { ?>
						<section class="error-image-top">
							<?php $list_placement = "error-image-top"; ?>
							<figure>
								<?php echo wp_get_attachment_image($image, $size); ?>
							</figure>
							<p><?php the_content(); ?></p>
						</section>
					<?php } elseif ($image_location == "Left") { ?>
						<section class="error-image-left">
							<?php $list_placement = "error-image-left"; ?>
							<figure>
								<?php echo wp_get_attachment_image($image, $size); ?>
							</figure>
							<p><?php the_content(); ?></p>
						</section>
					<?php } elseif ($image_location == "Right") { ?>
						<section class="error-image-right">
							<?php $list_placement = "error-image-right"; ?>
							<p><?php the_content(); ?></p>
							<figure>
								<?php echo wp_get_attachment_image($image, $size); ?>
							</figure>
						</section>
					<?php } else { ?>
						<section class="error-image-bottom">
							<?php $list_placement = "error-image-bottom"; ?>
							<p><?php the_content(); ?></p>
							<figure>
								<?php echo wp_get_attachment_image($image, $size); ?>
							</figure>
						</section>
					<?php }; ?>
						
					<!-- URLs and labels go here.  Don't forget to check whether link exists! -->
					<ul class="error-links <?php echo $list_placement; ?> clearfix">
						
						<?php if (($link1_label) && ($link1_url)) { ?>
							<li class="<?php echo $list_placement;?>"><a href="<?php echo home_url(); ?>/<?php echo $link1_url; ?>"><?php echo $link1_label;?></a></li>
						<?php } ?>
						
						<?php if (($link2_label) && ($link2_url)) { ?>
							<li><a href="<?php echo home_url(); ?>/<?php echo $link2_url; ?>"><?php echo $link2_label;?></a></li>
						<?php } ?>
						
						<?php if (($link3_label) && ($link3_url)) { ?>
							<li><a href="<?php echo home_url(); ?>/<?php echo $link3_url; ?>"><?php echo $link3_label;?></a></li>
						<?php } ?>
					<ul>
				</section>	
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<!-- No sidebars in this theme -->
<?php //get_sidebar(); ?>

<div class="clearfix"></div>

<?php get_footer(); ?>