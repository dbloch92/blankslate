<?php get_header(); ?>
<?php global $post; ?>
<div id="content">
<?php the_post(); ?>
<h1 class="page-title"><?php the_title(); ?> | <a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', 'blankslate' ), esc_html( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><span class="meta-nav">&laquo; </span><?php echo get_the_title($post->post_parent) ?></a></h1>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part( 'entry', 'meta' ); ?>
<div class="entry-content">
<div id="nav-above" class="navigation">
<div class="nav-previous"><?php previous_image_link( false, sprintf(__( ' %s Previous' , 'blankslate' ), '&larr;' ) ); ?></div>
<div class="nav-next"><?php next_image_link( false, sprintf(__( 'Next %s' , 'blankslate' ), '&rarr;' ) ); ?></div>
</div>
<div class="entry-attachment">
<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, "large"); ?>
<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a></p>
<?php else : ?>
<a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
<?php endif; ?>
</div>
<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
<?php 
if ( has_post_thumbnail() ) {
the_post_thumbnail();
} 
?>
</div>
<div class="entry-footer">
<?php edit_post_link( __( 'Edit', 'blankslate' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
</div>
</div>
<?php comments_template(); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>