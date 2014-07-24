<?php
/**
 * @package pengu!n
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( array(600,300) ); ?> </a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>
		<?php if (!has_post_format('status')) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>
		
		<div class="entry-meta-top">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php penguin_posted_on(); ?>
		<?php endif; ?>
			
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<small class="comments-link btn btn-sm"><?php comments_popup_link( __( 'Leave a comment', 'penguin' ), __( '1 Comment', 'penguin' ), __( '% Comments', 'penguin' ) ); ?></small>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'penguin' ), '<small class="edit-link btn btn-sm">', '</small>' ); ?>
		</div><!-- .entry-meta-top -->

	</header><!-- .entry-header -->	
	
	<?php if ( !has_post_format() || has_post_format('gallery') || is_search() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'penguin' ) ); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>	
	
	<?php if ( 'post' == get_post_type() ) : ?>
	<footer class="entry-meta-bottom">
		<?php /* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'penguin' ) );
		if ( $categories_list && penguin_categorized_blog() ) : ?>
		<div class="cat-links">
			<span class="penguin-category-icon"></span> <?php echo $categories_list ?>
		</div>
		<?php endif; // End if categories ?>

		<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'penguin' ) );
			if ( $tags_list ) :
		?>
		<div class="tags-links">
			<span class="penguin-tag-icon"></span> <?php echo $tags_list ?>
		</div>
		<?php endif; // End if $tags_list ?>
	</footer><!-- .entry-meta-bottom -->
	<?php endif; // End if 'post' == get_post_type() ?>
</article><!-- #post-## -->