<?php

// set content width
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
// load stylesheets
function load_css()
{
    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', array(), 1, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_css');

// load Javascript
function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'load_js');

// load comments 
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

// theme options
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );

// load text domain
load_theme_textdomain('niffty');

// menus
register_nav_menus(
    array(
        'main-menu' => 'Main Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-company' => 'Footer Company Location',
        'footer-profile' => 'Footer Profile Location',
        'footer-help' => 'Footer Help Location',
        'social-menu' => 'Social Menu Location',
        'shop-menu' => 'Shop Menu Location',
    )
);

// custom image sizes
add_image_size('post-large', 800, 400, array( 'center', 'center' ));
add_image_size('post-small', 300, 200, array( 'center', 'center' ));
add_image_size('header', 1000, 600, array( 'center', 'center' ));

// register sidebars
function my_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Newsletter',
            'id' => 'newsletter',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Shop Sidebar',
            'id' => 'shop-sidebar',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Homepage Featured Products',
            'id' => 'featured-products',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Homepage Newest Products',
            'id' => 'newest-products',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>'
        )
    );
}
add_action('widgets_init', 'my_sidebars');

// register team post type
function team_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Team',
            'singular_name' => 'Member'
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
    );
    register_post_type('team', $args);
}
add_action('init', 'team_post_type');

// update archive title filter
add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
});

// backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

// change comments reply text
function wpb_comment_reply_text( $link ) {
    $link = str_replace( 'Reply', '<i class="fas fa-reply reply-arrow"></i> Reply', $link );
    return $link;
    }
    add_filter( 'comment_reply_link', 'wpb_comment_reply_text' );

// enable comments reply when YOAST disables
add_filter( 'wpseo_remove_reply_to_com', '__return_false' );

// change comments appearance
function niffty_comment( $comment, $args, $depth ) {
    //checks if were using a div or ol|ul for our output
   $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
   ?>
         <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
               <div class="comment-meta">
                  <div class="comment-author vcard">
                     <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                     <div class="author-info">
                        <?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) ); ?>
                        <div class="comment-metadata">
                            <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                                <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php
                                    /* translators: 1: comment date, 2: comment time */
                                    printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                                ?>
                                </time>
                            </a>
                            <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                        </div><!-- .comment-metadata -->
                     </div>
                    </div><!-- .comment-author -->
   
                  
   
                  <?php if ( '0' == $comment->comment_approved ) : ?>
                  <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                  <?php endif; ?>
               </div><!-- .comment-meta -->
   
               <div class="comment-content">
                  <?php comment_text(); ?>
               </div><!-- .comment-content -->
   
               <?php
               comment_reply_link( array_merge( $args, array(
                  'add_below' => 'div-comment',
                  'depth'     => $depth,
                  'max_depth' => '5',
                  'before'    => '<div class="reply">',
                  'after'     => '</div>'
               ) ) );
               ?>
            </article><!-- .comment-body -->
            <?php
}

// declare woocommerce support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


// woocommerce override quantity to be +/-

// Minimum CSS to remove +/- default buttons on input field type number
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }
    </style>
    <?php
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// Yith Wishlist changes
if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_move_wishlist_button' ) ){
	function yith_wcwl_move_wishlist_button(  ){
		echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
	}
	add_action( 'woocommerce_after_add_to_cart_button', 'yith_wcwl_move_wishlist_button' );
}

// replace empty hash in menu
add_filter( 'wp_nav_menu_items', function ( $menu ) {
    return str_replace( '<a href="#"', '<a', $menu );
} );

// add count to cart
add_filter( 'woocommerce_add_to_cart_fragments', 'niffty_add_to_cart_fragment' );
 
function niffty_add_to_cart_fragment( $fragments ) {
 
    global $woocommerce;
 
	$fragments['.cart-count'] = '<a href="' . wc_get_cart_url() . '" class="cart-count">' . $woocommerce->cart->cart_contents_count . '</a>';
 	return $fragments;
 
 }