<?php
/**
 * @package PENGU!N Gold
 */
?>

<?php tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php tha_entry_top(); ?>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
		<?php get_template_part( 'template-parts/the_post_thumbnail' ); ?>
		<?php endif; ?>
		<?php if (!has_post_format('status')) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/meta', 'top' ); ?>
	</header><!-- .entry-header -->

	<?php $contentoutput = get_theme_mod( 'excerpt-content' ); ?>
	<?php if ( $contentoutput != 'content' && ! has_post_format() ) : ?>
	<?php get_template_part( 'template-parts/the_excerpt' ); ?>
	<?php else : ?>
	<?php get_template_part( 'template-parts/the_content' ); ?>
	<?php endif; ?>

	<?php if ( 'post' == get_post_type() ) : ?>
	<?php get_template_part( 'template-parts/meta', 'bottom' ); ?>
	<?php endif; // End if 'post' == get_post_type() ?>

	<?php tha_entry_bottom(); ?>
</article><!-- #post-## -->
<?php tha_entry_after(); ?>