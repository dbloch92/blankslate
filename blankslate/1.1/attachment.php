<?php get_header(); ?><div id="container"><div id="content"><?php the_post(); ?><h1 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', 'clean' ), esc_html( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><span class="meta-nav">&laquo; </span><?php echo get_the_title($post->post_parent) ?></a></h1><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><h2 class="entry-title"><?php the_title(); ?></h2><div class="entry-meta"><span class="meta-prep meta-prep-author"><?php _e('By ', 'clean'); ?></span><span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'clean' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span><span class="meta-sep"> | </span><span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'clean'); ?></span><span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span><?php edit_post_link( __( 'Edit', 'clean' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?></div><div class="entry-content"><div class="entry-attachment"><?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "medium"); ?><p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a></p><?php else : ?><a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a><?php endif; ?></div><div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div><?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'clean' )  ); ?><?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'clean' ) . '&after=</div>') ?></div><div class="entry-utility"><?php printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow comments with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'clean' ),get_the_category_list(', '),get_the_tag_list( __( ' and tagged ', 'clean' ), ', ', '' ),get_permalink(),the_title_attribute('echo=0'),get_post_comments_feed_link() ) ?><?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // ?><?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'clean' ), get_trackback_url() ) ?><?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // ?><?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'clean' ), get_trackback_url() ) ?><?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // ?><?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'clean' ) ?><?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // ?><?php _e( 'Both comments and trackbacks are closed.', 'clean' ) ?><?php endif; ?><?php edit_post_link( __( 'Edit', 'clean' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?></div></div><?php comments_template(); ?></div></div><?php get_sidebar(); ?><?php get_footer(); ?>