<?phpadd_action( 'after_setup_theme', 'clean_theme_setup' );define('ICL_AFFILIATE_ID', 12036);define('ICL_AFFILIATE_KEY', '8ba0a59b514f88228d4a9ce5bd904c0e');function clean_theme_setup() {add_theme_support( 'automatic-feed-links' );}load_theme_textdomain( 'clean', TEMPLATEPATH . '/languages' );$locale = get_locale();$locale_file = TEMPLATEPATH . "/languages/$locale.php";if ( is_readable($locale_file) )require_once($locale_file);function get_page_number() {if (get_query_var('paged')) {print ' | ' . __( 'Page ' , 'clean') . get_query_var('paged');}}function catz($glue) {$current_cat = single_cat_title( '', false );$separator = "\n";$cats = explode( $separator, get_the_category_list($separator) );foreach ( $cats as $i => $str ) {if ( strstr( $str, ">$current_cat<" ) ) {unset($cats[$i]);break;}}if ( empty($cats) )return false;return trim(join( $glue, $cats ));}function tag_ur_it($glue) {$current_tag = single_tag_title( '', '',  false );$separator = "\n";$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );foreach ( $tags as $i => $str ) {if ( strstr( $str, ">$current_tag<" ) ) {unset($tags[$i]);break;}}if ( empty($tags) )return false;return trim(join( $glue, $tags ));}if ( ! isset( $content_width ) ) $content_width = 640;function register_my_menus() {register_nav_menus(array( 'main-menu' => __( 'Main Menu' )));}add_action( 'init', 'register_my_menus' );function theme_widgets_init() {register_sidebar( array ('name' => 'Primary Widget Area','id' => 'primary-widget-area','before_widget' => '<li id="%1$s" class="widget-container %2$s">','after_widget' => "</li>",'before_title' => '<h3 class="widget-title">','after_title' => '</h3>',) );}add_action( 'init', 'theme_widgets_init' );$preset_widgets = array ('primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),);if ( isset( $_GET['activated'] ) ) {update_option( 'sidebars_widgets', $preset_widgets );}function is_sidebar_active( $index ){global $wp_registered_sidebars;$widgetcolums = wp_get_sidebars_widgets();if ($widgetcolums[$index]) return true;return false;}function commenter_link() {$commenter = get_comment_author_link();if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );} else {$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );}$avatar_email = get_comment_author_email();$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );echo $avatar . ' <span class="fn n">' . $commenter . '</span>';}function custom_comments($comment, $args, $depth) {$GLOBALS['comment'] = $comment;$GLOBALS['comment_depth'] = $depth;?><li id="comment-<?php comment_ID() ?>" class="<?php comment_class() ?>"><div class="comment-author vcard"><?php commenter_link() ?></div><div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep"> | </span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'clean'),get_comment_date(),get_comment_time(),'#comment-' . get_comment_ID() );edit_comment_link(__('Edit', 'clean'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div><?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'clean') ?><div class="comment-content"><?php comment_text() ?></div><?phpif($args['type'] == 'all' || get_comment_type() == 'comment') :comment_reply_link(array_merge($args, array('reply_text' => __('Reply','clean'),'login_text' => __('Log in to reply.','clean'),'depth' => $depth,'before' => '<div class="comment-reply-link">','after' => '</div>')));endif;?><?php }function custom_pings($comment, $args, $depth) {$GLOBALS['comment'] = $comment;?><li id="comment-<?php comment_ID() ?>" class="<?php comment_class() ?>"><div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'clean'),get_comment_author_link(),get_comment_date(),get_comment_time() );edit_comment_link(__('Edit', 'clean'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div><?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'clean') ?><div class="comment-content"><?php comment_text() ?></div><?php }