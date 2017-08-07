<?php
/**
 * @package times
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">		
		<div class="entry-meta">
			<?php times_posted_on_times(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
			
			
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'times' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php times_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<?php times_post_nav(); ?>
</article><!-- #post-## -->
