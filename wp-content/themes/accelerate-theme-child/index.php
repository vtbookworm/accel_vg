<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>
	<!-- BLOG PAGE -->
	<section class="blog-page">
		<div class="site-content">
			<div class="main-content">
				
			<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
				
					<article class="post-entry">
						<div class="entry-wrap">
							<header class="entry-header">
								<div class="entry-meta">
									<time class="entry-time"><?php the_date();?></time>
								</div>
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</header>
							<div class="entry-summary">
									<?php the_excerpt(); ?>
							</div>
							<footer class="entry-footer">
								<div class="entry-meta">
									<span class="entry-terms comments author">
										Written by <span class="blog-meta-custom"><?php the_author_posts_link(); ?></span>
										<?php echo "&nbsp&nbsp/&nbsp$nbsp"; ?>
										Posted in <?php the_category(', '); ?>
										<?php echo "&nbsp&nbsp/&nbsp$nbsp"; ?>
										<?php comments_popup_link('<span>No comments</span>', '1 comment', '% comments');?>
										
									</span>
								</div>
							</footer>
						</div>
					
					</article>
					
			<?php endwhile; endif; ?>
			</div>

			<?php get_sidebar(); ?>
		
			<div class="clearfix"></div>
					
				<!-- Added to display Page x of y in bottom nav bar -->					
			<div id="navigation" class="navigation"> 
				<div class="left"><?php next_posts_link('&larr; <span>Older Posts</span>'); ?></div>
				<div class="center"><?php current_paged(); ?></div>
				<div class="right"><?php previous_posts_link('<span>Newer Posts</span> &rarr;'); ?></div>
			</div>


						
		</div>

	</section>
	<!-- END blog page -->
<?php get_footer();
