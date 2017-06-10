<?php
/**
 * The template for displaying the homepage
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

<section class="home-page">
	<div class="site-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class='homepage-hero'>
				<?php the_content(); ?>
				<a class="button" href="<?php echo home_url(); ?>/case-studies">View Our Work</a>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .site-content -->
</section><!-- .home-page -->

<section class="featured-work">
	<div class="site-content">
		<h4>Featured Work</h4>
		
		<ul class="homepage-featured-work">
			
			<?php query_posts('posts_per_page=3&post_type=case_studies'); ?>
				<?php while( have_posts() ) : the_post(); ?>
					<?php
						$image1 = get_field('image_1');
						$size = "medium";
					?>
					<li class="individual-featured-work">
						<figure class="featured-work-image">
							<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image1, $size); ?></a>
						</figure>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</li>
				<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>
</section>

<section class="services">
	<div class="site-content">
		<h4>Our Services</h4>
		
		<ul class="homepage-services">
			
			<?php query_posts('posts_per_page=4&post_type=services&order=ASC'); ?>
				<?php while( have_posts() ) : the_post(); ?>
					<?php
						$image1 = get_field('graphic');
						$size = "medium";
					?>
					<li class="individual-services">
						<figure class="services-image">
							<a href="<?php echo home_url(); ?>/about"><?php echo wp_get_attachment_image($image1, $size); ?></a>
						</figure>
						<h3><a href="<?php echo home_url(); ?>/about"><?php the_title(); ?></a></h3>
					</li>
				<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>
</section>

<section class="recent-posts">
	<div class="site-content">
		<div class="blog-post">
			<h4>From the Blog</h4>
			<?php query_posts('posts_per_page=1'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					
				<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div id="secondary" class="widget-area" role="complementary">
				<h4>Recent Tweets</h4>
				<?php dynamic_sidebar( 'sidebar-2' ); 
					$stt_options = get_option( 'widget_pi_simpletwittertweets' );
					$twitter_handle = $stt_options[2]['name'];
				?>
				<a href="https://twitter.com/intent/follow?screen_name=<?php echo "$twitter_handle" ?>" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-show-count="false">Follow Us &raquo;</a>
				
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>