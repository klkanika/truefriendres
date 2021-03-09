<?php

/**
 * Twenty Twenty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentytwenty_theme_support()
{

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// Set post thumbnail size.
	set_post_thumbnail_size(1200, 9999);

	// Add custom image size used in Cover Template.
	add_image_size('twentytwenty-fullscreen', 1980, 9999);

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if (get_theme_mod('retina_logo', false)) {
		$logo_width  = floor($logo_width * 2);
		$logo_height = floor($logo_height * 2);
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'twentytwenty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('twentytwenty');

	// Add support for full and wide align images.
	add_theme_support('align-wide');

	// Add support for responsive embeds.
	add_theme_support('responsive-embeds');

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if (is_customize_preview()) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support('starter-content', twentytwenty_get_starter_content());
	}

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new TwentyTwenty_Script_Loader();
	add_filter('script_loader_tag', array($loader, 'filter_script_loader_tag'), 10, 2);
}

add_action('after_setup_theme', 'twentytwenty_theme_support');

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/classes/class-twentytwenty-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Handle Customizer settings.
require get_template_directory() . '/classes/class-twentytwenty-customize.php';

// Require Separator Control class.
require get_template_directory() . '/classes/class-twentytwenty-separator-control.php';

// Custom comment walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-comment.php';

// Custom page walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-twentytwenty-script-loader.php';

// Non-latin language handling.
require get_template_directory() . '/classes/class-twentytwenty-non-latin-languages.php';

// Custom CSS.
require get_template_directory() . '/inc/custom-css.php';

/**
 * Register and Enqueue Styles.
 */
function twentytwenty_register_styles()
{

	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('twentytwenty-style', get_stylesheet_uri(), array(), $theme_version);
	wp_style_add_data('twentytwenty-style', 'rtl', 'replace');

	// Add output of Customizer settings as inline style.
	wp_add_inline_style('twentytwenty-style', twentytwenty_get_customizer_css('front-end'));

	// Add print CSS.
	wp_enqueue_style('twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print');
}

add_action('wp_enqueue_scripts', 'twentytwenty_register_styles');

/**
 * Register and Enqueue Scripts.
 */
function twentytwenty_register_scripts()
{

	$theme_version = wp_get_theme()->get('Version');

	if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('twentytwenty-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false);
	wp_script_add_data('twentytwenty-js', 'async', true);
}

add_action('wp_enqueue_scripts', 'twentytwenty_register_scripts');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentytwenty_skip_link_focus_fix()
{
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
			var t, e = location.hash.substring(1);
			/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
		}, !1);
	</script>
<?php
}
add_action('wp_print_footer_scripts', 'twentytwenty_skip_link_focus_fix');

/** Enqueue non-latin language styles
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_non_latin_languages()
{
	$custom_css = TwentyTwenty_Non_Latin_Languages::get_non_latin_css('front-end');

	if ($custom_css) {
		wp_add_inline_style('twentytwenty-style', $custom_css);
	}
}

add_action('wp_enqueue_scripts', 'twentytwenty_non_latin_languages');

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function twentytwenty_menus()
{

	$locations = array(
		'primary'  => __('Desktop Horizontal Menu', 'twentytwenty'),
		'expanded' => __('Desktop Expanded Menu', 'twentytwenty'),
		'mobile'   => __('Mobile Menu', 'twentytwenty'),
		'footer'   => __('Footer Menu', 'twentytwenty'),
		'social'   => __('Social Menu', 'twentytwenty'),
	);

	register_nav_menus($locations);
}

add_action('init', 'twentytwenty_menus');

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function twentytwenty_get_custom_logo($html)
{

	$logo_id = get_theme_mod('custom_logo');

	if (!$logo_id) {
		return $html;
	}

	$logo = wp_get_attachment_image_src($logo_id, 'full');

	if ($logo) {
		// For clarity.
		$logo_width  = esc_attr($logo[1]);
		$logo_height = esc_attr($logo[2]);

		// If the retina logo setting is active, reduce the width/height by half.
		if (get_theme_mod('retina_logo', false)) {
			$logo_width  = floor($logo_width / 2);
			$logo_height = floor($logo_height / 2);

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if (strpos($html, ' style=') === false) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace($search, $replace, $html);
		}
	}

	return $html;
}

add_filter('get_custom_logo', 'twentytwenty_get_custom_logo');

if (!function_exists('wp_body_open')) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function twentytwenty_skip_link()
{
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __('Skip to the content', 'twentytwenty') . '</a>';
}

add_action('wp_body_open', 'twentytwenty_skip_link', 5);

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentytwenty_sidebar_registration()
{

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __('Footer #1', 'twentytwenty'),
				'id'          => 'sidebar-1',
				'description' => __('Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty'),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __('Footer #2', 'twentytwenty'),
				'id'          => 'sidebar-2',
				'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
			)
		)
	);
}

add_action('widgets_init', 'twentytwenty_sidebar_registration');

/**
 * Enqueue supplemental block editor styles.
 */
function twentytwenty_block_editor_styles()
{

	// Enqueue the editor styles.
	wp_enqueue_style('twentytwenty-block-editor-styles', get_theme_file_uri('/assets/css/editor-style-block.css'), array(), wp_get_theme()->get('Version'), 'all');
	wp_style_add_data('twentytwenty-block-editor-styles', 'rtl', 'replace');

	// Add inline style from the Customizer.
	wp_add_inline_style('twentytwenty-block-editor-styles', twentytwenty_get_customizer_css('block-editor'));

	// Add inline style for non-latin fonts.
	wp_add_inline_style('twentytwenty-block-editor-styles', TwentyTwenty_Non_Latin_Languages::get_non_latin_css('block-editor'));

	// Enqueue the editor script.
	wp_enqueue_script('twentytwenty-block-editor-script', get_theme_file_uri('/assets/js/editor-script-block.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}

add_action('enqueue_block_editor_assets', 'twentytwenty_block_editor_styles', 1, 1);

/**
 * Enqueue classic editor styles.
 */
function twentytwenty_classic_editor_styles()
{

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style($classic_editor_styles);
}

add_action('init', 'twentytwenty_classic_editor_styles');

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_customizer_styles($mce_init)
{

	$styles = twentytwenty_get_customizer_css('classic-editor');

	if (!isset($mce_init['content_style'])) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;
}

add_filter('tiny_mce_before_init', 'twentytwenty_add_classic_editor_customizer_styles');

/**
 * Output non-latin font styles in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_non_latin_styles($mce_init)
{

	$styles = TwentyTwenty_Non_Latin_Languages::get_non_latin_css('classic-editor');

	// Return if there are no styles to add.
	if (!$styles) {
		return $mce_init;
	}

	if (!isset($mce_init['content_style'])) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;
}

add_filter('tiny_mce_before_init', 'twentytwenty_add_classic_editor_non_latin_styles');

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 */
function twentytwenty_block_editor_settings()
{

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __('Accent Color', 'twentytwenty'),
			'slug'  => 'accent',
			'color' => twentytwenty_get_color_for_area('content', 'accent'),
		),
		array(
			'name'  => __('Primary', 'twentytwenty'),
			'slug'  => 'primary',
			'color' => twentytwenty_get_color_for_area('content', 'text'),
		),
		array(
			'name'  => __('Secondary', 'twentytwenty'),
			'slug'  => 'secondary',
			'color' => twentytwenty_get_color_for_area('content', 'secondary'),
		),
		array(
			'name'  => __('Subtle Background', 'twentytwenty'),
			'slug'  => 'subtle-background',
			'color' => twentytwenty_get_color_for_area('content', 'borders'),
		),
	);

	// Add the background option.
	$background_color = get_theme_mod('background_color');
	if (!$background_color) {
		$background_color_arr = get_theme_support('custom-background');
		$background_color     = $background_color_arr[0]['default-color'];
	}
	$editor_color_palette[] = array(
		'name'  => __('Background Color', 'twentytwenty'),
		'slug'  => 'background',
		'color' => '#' . $background_color,
	);

	// If we have accent colors, add them to the block editor palette.
	if ($editor_color_palette) {
		add_theme_support('editor-color-palette', $editor_color_palette);
	}

	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x('Small', 'Name of the small font size in the block editor', 'twentytwenty'),
				'shortName' => _x('S', 'Short name of the small font size in the block editor.', 'twentytwenty'),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x('Regular', 'Name of the regular font size in the block editor', 'twentytwenty'),
				'shortName' => _x('M', 'Short name of the regular font size in the block editor.', 'twentytwenty'),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x('Large', 'Name of the large font size in the block editor', 'twentytwenty'),
				'shortName' => _x('L', 'Short name of the large font size in the block editor.', 'twentytwenty'),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x('Larger', 'Name of the larger font size in the block editor', 'twentytwenty'),
				'shortName' => _x('XL', 'Short name of the larger font size in the block editor.', 'twentytwenty'),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);

	add_theme_support('editor-styles');

	// If we have a dark background color then add support for dark editor style.
	// We can determine if the background color is dark by checking if the text-color is white.
	if ('#ffffff' === strtolower(twentytwenty_get_color_for_area('content', 'text'))) {
		add_theme_support('dark-editor-style');
	}
}

add_action('after_setup_theme', 'twentytwenty_block_editor_settings');

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function twentytwenty_read_more_tag($html)
{
	return preg_replace('/<a(.*)>(.*)<\/a>/iU', sprintf('<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title(get_the_ID())), $html);
}

add_filter('the_content_more_link', 'twentytwenty_read_more_tag');

/**
 * Enqueues scripts for customizer controls & settings.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_controls_enqueue_scripts()
{
	$theme_version = wp_get_theme()->get('Version');

	// Add main customizer js file.
	wp_enqueue_script('twentytwenty-customize', get_template_directory_uri() . '/assets/js/customize.js', array('jquery'), $theme_version, false);

	// Add script for color calculations.
	wp_enqueue_script('twentytwenty-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array('wp-color-picker'), $theme_version, false);

	// Add script for controls.
	wp_enqueue_script('twentytwenty-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array('twentytwenty-color-calculations', 'customize-controls', 'underscore', 'jquery'), $theme_version, false);
	wp_localize_script('twentytwenty-customize-controls', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars());
}

add_action('customize_controls_enqueue_scripts', 'twentytwenty_customize_controls_enqueue_scripts');

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_preview_init()
{
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_script('twentytwenty-customize-preview', get_theme_file_uri('/assets/js/customize-preview.js'), array('customize-preview', 'customize-selective-refresh', 'jquery'), $theme_version, true);
	wp_localize_script('twentytwenty-customize-preview', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars());
	wp_localize_script('twentytwenty-customize-preview', 'twentyTwentyPreviewEls', twentytwenty_get_elements_array());

	wp_add_inline_script(
		'twentytwenty-customize-preview',
		sprintf(
			'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',
			wp_json_encode('cover_opacity'),
			wp_json_encode(twentytwenty_customize_opacity_range())
		)
	);
}

add_action('customize_preview_init', 'twentytwenty_customize_preview_init');

/**
 * Get accessible color for an area.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $area The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function twentytwenty_get_color_for_area($area = 'content', $context = 'text')
{

	// Get the value from the theme-mod.
	$settings = get_theme_mod(
		'accent_accessible_colors',
		array(
			'content'       => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
			'header-footer' => array(
				'text'      => '#000000',
				'accent'    => '#cd2653',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
		)
	);

	// If we have a value return it.
	if (isset($settings[$area]) && isset($settings[$area][$context])) {
		return $settings[$area][$context];
	}

	// Return false if the option doesn't exist.
	return false;
}

/**
 * Returns an array of variables for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_customizer_color_vars()
{
	$colors = array(
		'content'       => array(
			'setting' => 'background_color',
		),
		'header-footer' => array(
			'setting' => 'header_footer_background_color',
		),
	);
	return $colors;
}

/**
 * Get an array of elements.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_elements_array()
{

	// The array is formatted like this:
	// [key-in-saved-setting][sub-key-in-setting][css-property] = [elements].
	$elements = array(
		'content'       => array(
			'accent'     => array(
				'color'            => array('.color-accent', '.color-accent-hover:hover', '.color-accent-hover:focus', ':root .has-accent-color', '.has-drop-cap:not(:focus):first-letter', '.wp-block-button.is-style-outline', 'a'),
				'border-color'     => array('blockquote', '.border-color-accent', '.border-color-accent-hover:hover', '.border-color-accent-hover:focus'),
				'background-color' => array('button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file .wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.bg-accent', '.bg-accent-hover:hover', '.bg-accent-hover:focus', ':root .has-accent-background-color', '.comment-reply-link'),
				'fill'             => array('.fill-children-accent', '.fill-children-accent *'),
			),
			'background' => array(
				'color'            => array(':root .has-background-color', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.wp-block-button', '.comment-reply-link', '.has-background.has-primary-background-color:not(.has-text-color)', '.has-background.has-primary-background-color *:not(.has-text-color)', '.has-background.has-accent-background-color:not(.has-text-color)', '.has-background.has-accent-background-color *:not(.has-text-color)'),
				'background-color' => array(':root .has-background-background-color'),
			),
			'text'       => array(
				'color'            => array('body', '.entry-title a', ':root .has-primary-color'),
				'background-color' => array(':root .has-primary-background-color'),
			),
			'secondary'  => array(
				'color'            => array('cite', 'figcaption', '.wp-caption-text', '.post-meta', '.entry-content .wp-block-archives li', '.entry-content .wp-block-categories li', '.entry-content .wp-block-latest-posts li', '.wp-block-latest-comments__comment-date', '.wp-block-latest-posts__post-date', '.wp-block-embed figcaption', '.wp-block-image figcaption', '.wp-block-pullquote cite', '.comment-metadata', '.comment-respond .comment-notes', '.comment-respond .logged-in-as', '.pagination .dots', '.entry-content hr:not(.has-background)', 'hr.styled-separator', ':root .has-secondary-color'),
				'background-color' => array(':root .has-secondary-background-color'),
			),
			'borders'    => array(
				'border-color'        => array('pre', 'fieldset', 'input', 'textarea', 'table', 'table *', 'hr'),
				'background-color'    => array('caption', 'code', 'code', 'kbd', 'samp', '.wp-block-table.is-style-stripes tbody tr:nth-child(odd)', ':root .has-subtle-background-background-color'),
				'border-bottom-color' => array('.wp-block-table.is-style-stripes'),
				'border-top-color'    => array('.wp-block-latest-posts.is-grid li'),
				'color'               => array(':root .has-subtle-background-color'),
			),
		),
		'header-footer' => array(
			'accent'     => array(
				'color'            => array('body:not(.overlay-header) .primary-menu > li > a', 'body:not(.overlay-header) .primary-menu > li > .icon', '.modal-menu a', '.footer-menu a, .footer-widgets a', '#site-footer .wp-block-button.is-style-outline', '.wp-block-pullquote:before', '.singular:not(.overlay-header) .entry-header a', '.archive-header a', '.header-footer-group .color-accent', '.header-footer-group .color-accent-hover:hover'),
				'background-color' => array('.social-icons a', '#site-footer button:not(.toggle)', '#site-footer .button', '#site-footer .faux-button', '#site-footer .wp-block-button__link', '#site-footer .wp-block-file__button', '#site-footer input[type="button"]', '#site-footer input[type="reset"]', '#site-footer input[type="submit"]'),
			),
			'background' => array(
				'color'            => array('.social-icons a', 'body:not(.overlay-header) .primary-menu ul', '.header-footer-group button', '.header-footer-group .button', '.header-footer-group .faux-button', '.header-footer-group .wp-block-button:not(.is-style-outline) .wp-block-button__link', '.header-footer-group .wp-block-file__button', '.header-footer-group input[type="button"]', '.header-footer-group input[type="reset"]', '.header-footer-group input[type="submit"]'),
				'background-color' => array('#site-header', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal', '.menu-modal-inner', '.search-modal-inner', '.archive-header', '.singular .entry-header', '.singular .featured-media:before', '.wp-block-pullquote:before'),
			),
			'text'       => array(
				'color'               => array('.header-footer-group', 'body:not(.overlay-header) #site-header .toggle', '.menu-modal .toggle'),
				'background-color'    => array('body:not(.overlay-header) .primary-menu ul'),
				'border-bottom-color' => array('body:not(.overlay-header) .primary-menu > li > ul:after'),
				'border-left-color'   => array('body:not(.overlay-header) .primary-menu ul ul:after'),
			),
			'secondary'  => array(
				'color' => array('.site-description', 'body:not(.overlay-header) .toggle-inner .toggle-text', '.widget .post-date', '.widget .rss-date', '.widget_archive li', '.widget_categories li', '.widget cite', '.widget_pages li', '.widget_meta li', '.widget_nav_menu li', '.powered-by-wordpress', '.to-the-top', '.singular .entry-header .post-meta', '.singular:not(.overlay-header) .entry-header .post-meta a'),
			),
			'borders'    => array(
				'border-color'     => array('.header-footer-group pre', '.header-footer-group fieldset', '.header-footer-group input', '.header-footer-group textarea', '.header-footer-group table', '.header-footer-group table *', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal nav *', '.footer-widgets-outer-wrapper', '.footer-top'),
				'background-color' => array('.header-footer-group table caption', 'body:not(.overlay-header) .header-inner .toggle-wrapper::before'),
			),
		),
	);

	/**
	 * Filters Twenty Twenty theme elements
	 *
	 * @since Twenty Twenty 1.0
	 *
	 * @param array Array of elements
	 */
	return apply_filters('twentytwenty_get_elements_array', $elements);
}


add_action('admin_post_nopriv_franchise_register', 'franchise_register_process');
add_action('admin_post_franchise_register', 'franchise_register_process');

function franchise_register_process()
{
	echo $_POST['title'];
	echo $_POST['id'];
	$my_post = array(
		'post_title' => $_POST['general_info-name'],
		'post_type' => $_POST['post_type'],
		'post_status' =>  'submitted'
	);

	$the_post_id = wp_insert_post($my_post);

	foreach ($_POST as $key => $value) {
		$name = explode("-", $key);
		if (count($name) > 2) {
			$group1 = $name[0];
			$group2 = $name[1];
			$field = $name[2];
			$formatValue = [];
			foreach ($value as $v) {
				array_push($formatValue, array($field => $v));
			}
			update_field(
				$group1,
				array(
					$group2 => $formatValue
				),
				$the_post_id
			);
		} else if (count($name) > 1) {
			$group = $name[0];
			$field = $name[1];
			if ($group === 'taxonomy') {
				wp_set_object_terms($the_post_id, $value, $field);
			} else {
				if (is_array($value)) {
					$repeater = [];
					foreach ($value as $v) {
						array_push($repeater, array(
							$field => $v,
						));
					}
					update_field(
						$group,
						$repeater,
						$the_post_id
					);
				} else {
					update_field(
						$group,
						array(
							$field => $value
						),
						$the_post_id
					);
				}
			}
		} else {
			$group = null;
			$field = $name[0];
			update_field($field, $value, $the_post_id);
		}
	}

	header("location: " . get_site_url() . '/' . $_POST['redirect']);
	exit();
}

add_action('admin_post_nopriv_supplier_register', 'supplier_register_process');
add_action('admin_post_supplier_register', 'supplier_register_process');

function supplier_register_process()
{
	/* here you must put your code */
	$ประเภทกิจการ = $_POST['ประเภทกิจการ'];
	$ชื่อธุรกิจ = $_POST['ชื่อธุรกิจ'];
	$สินค้าที่จำหน่าย = $_POST['สินค้าที่จำหน่าย']; //เป็น autocomplete เดี๋ยวค่อยจัดการ
	$แนะนำธุรกิจ = $_POST['แนะนำธุรกิจ'];
	$ประเทศ = $_POST['ประเทศ'];
	$รูปภาพ = $_POST['รูปภาพ'];
	$สถานที่จัดส่ง = $_POST['สถานที่จัดส่ง'];
	$แหล่งจัดส่ง = $_POST['แหล่งจัดส่ง'];

	// Create post object
	$my_post = array(
		'post_title' => 'โย่วๆ',
		'post_type' => 'suppliers',
		'post_status' =>  'submitted'
	);

	// Insert the post into the database
	$the_post_id = wp_insert_post($my_post);
	update_field('ชื่อธุรกิจ', 'ชื่อธุรกิจ', $the_post_id);
	update_field('แนะนำธุรกิจ', 'แนะนำธุรกิจ', $the_post_id);
	update_field('ประเทศ', array('ญี่ปุ่น'), $the_post_id);
	update_field('สถานที่จัดส่ง', array('ภาคใต้', 'ภาคเหนือ'), $the_post_id);
	update_field('ประเภทกิจการ', get_term_by('name', 'ก็ผักอะโว้ย', 'suppliertypes'), $the_post_id);

	$test = array(get_term_by('name', 'ผัก', 'suppliergoods')->term_id, get_term_by('name', 'เนื้อเอ', 'suppliergoods')->term_id);
	update_field('สินค้าที่จำหน่าย', $test, $the_post_id);

	update_field(
		'แหล่งจัดส่ง',
		array(
			array(
				"ชื่อ" => "แหล่งจัดส่งชื่อ",
				"ที่อยู่" => "แหล่งจัดส่งที่อยู่",
				"สถานที่จัดส่งหลัก" => true
			),
			array(
				"ชื่อ" => "แหล่งจัดส่งชื่อ2",
				"ที่อยู่" => "แหล่งจัดส่งที่อยู่2",
				"สถานที่จัดส่งหลัก" => false
			),
			array(
				"ชื่อ" => "แหล่งจัดส่งชื่อ3",
				"ที่อยู่" => "แหล่งจัดส่งที่อยู่3",
				"สถานที่จัดส่งหลัก" => true
			)
		),
		$the_post_id
	);
	update_field(
		'โซเชียลมีเดีย',
		array(
			"facebook" => "1",
			"line" => "2",
			"twitter" => "3",
			"instagram" => "4",
			"website" => "5"
		),
		$the_post_id
	);
	update_field(
		'รายละเอียดเจ้าของธุรกิจ',
		array(
			"ชื่อ" => "1",
			"เบอร์โทร" => "2",
			"email" => "3",
			"facebook" => "4",
			"line" => "5",
			"twitter" => "6",
			"instagram" => "7"
		),
		$the_post_id
	);

	exit();
}

add_action('admin_post_nopriv_restaurant_register', 'restaurant_register_process');
add_action('admin_post_restaurant_register', 'restaurant_register_process');

function restaurant_register_process()
{
	echo $_POST['title'];
	echo $_POST['id'];
	$my_post = array(
		'post_title' => $_POST['general_info-name'],
		'post_type' => $_POST['post_type'],
		'post_status' =>  'submitted'
	);

	$the_post_id = wp_insert_post($my_post);

	foreach ($_POST as $key => $value) {
		$name = explode("-", $key);
		if ($name === "other_info-facilities[]" || $name === "general_info-restaurant_type[]") {
			$group1 = $name[0];
			$group2 = $name[1];
			$formatValue = [];
			foreach ($value as $v) {
				array_push($formatValue, array($v));
			}
			update_field(
				$group1,
				array(
					$group2 => $formatValue
				),
				$the_post_id
			);
		} else if ($name === "general_info-map") {
			$group1 = $name[0];
			$group2 = $name[1];
			update_field(
				$group1,
				array(
					$group2 => array(
						"address" => $value['address'],
						"lat" => $value['lat'],
						"lng" => $lng,
					)
				),
				$the_post_id
			);
		} else if (count($name) > 2) {
			$group1 = $name[0];
			$group2 = $name[1];
			$field = $name[2];
			update_field(
				$group1,
				array(
					$group2 =>
					array(
						$field => $value
					),
				),
				$the_post_id
			);
		} else if (count($name) > 1) {
			$group = $name[0];
			$field = $name[1];
			update_field(
				$group,
				array(
					$field => $value
				),
				$the_post_id
			);
		} else {
			$group = null;
			$field = $name[0];
			update_field($field, $value, $the_post_id);
		}
	}

	header("location: " . get_site_url() . '/' . $_POST['redirect']);
	exit();
}


add_action('admin_post_nopriv_common_register', 'common_register_process');
add_action('admin_post_common_register', 'common_register_process');

function common_register_process()
{
	if ($_POST['post_type'] === 'course_register') {
		$my_post = array(
			'post_type' => $_POST['post_type'],
			'post_status' =>  'submitted',
			'post_title' => $_POST['general_info-name'] . ' for ' . get_field($_POST['title'], $_POST['id'])
		);
	} else {
		$my_post = array(
			'post_type' => $_POST['post_type'],
			'post_status' =>  'submitted',
			'post_title' => $_POST[$_POST['title']]
		);
	}

	$the_post_id = wp_insert_post($my_post);

	foreach ($_POST as $key => $value) {
		$name = explode("-", $key);
		if (count($name) > 2) {
			$group1 = $name[0];
			$group2 = $name[1];
			$field = $name[2];
			$formatValue = [];
			foreach ($value as $v) {
				array_push($formatValue, array($field => $v));
			}
			update_field(
				$group1,
				array(
					$group2 => $formatValue
				),
				$the_post_id
			);
		} else if (count($name) > 1) {
			$group = $name[0];
			$field = $name[1];
			if ($group === 'taxonomy') {
				wp_set_object_terms($the_post_id, $value, $field);
			} else {
				if (is_array($value)) {
					$repeater = [];
					foreach ($value as $v) {
						array_push($repeater, array(
							$field => $v,
						));
					}
					update_field(
						$group,
						$repeater,
						$the_post_id
					);
				} else {
					update_field(
						$group,
						array(
							$field => $value
						),
						$the_post_id
					);
				}
			}
		} else {
			$group = null;
			$field = $name[0];
			update_field($field, $value, $the_post_id);
		}
	}

	header("location: " . get_site_url() . '/' . $_POST['redirect']);
	exit();
}

require_once('custom-classes/class-posts.php');

add_action('wp_ajax_get_posts_by_cat_json_ajax', 'get_posts_by_cat_json_ajax');
add_action('wp_ajax_nopriv_get_posts_by_cat_json_ajax', 'get_posts_by_cat_json_ajax');

function get_posts_by_cat_json_ajax()
{
	$postType = $_POST['postType'];
	$categoryNo = $_POST['categoryNo'];
	$offset = $_POST['offset'];
	$postsPerPage = $_POST['postsPerPage'];
	$orderBy = $_POST['orderBy'];
	$order = $_POST['order'];

	$posts = Post::getPostsByCategory($postType, $categoryNo, $postsPerPage, $offset, null, $orderBy ? $orderBy : false, $order ? $order : false);

	echo json_encode($posts);
	wp_die();
}

add_action('wp_ajax_get_cat_by_name_json_ajax', 'get_cat_by_name_json_ajax');
add_action('wp_ajax_nopriv_get_cat_by_name_json_ajax', 'get_cat_by_name_json_ajax');

function get_cat_by_name_json_ajax()
{
	$args = array(
		'taxonomy' => $_POST['taxonomy'],
		'orderby' => $_POST['orderby'],
		'order' => $_POST['order'],
		'number' => $_POST['number'],
		'name__like' => $_POST['keyword']
	);

	$categories = get_categories($args);
	if ($_POST['taxonomy'] === 'suppliertypes' || $_POST['taxonomy'] === 'franchise_type') {
		foreach ($categories as $key => $cat) {
			$cat->pictureUrl = get_field('pictureUrl', $cat) ? get_field('pictureUrl', $cat) :  get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260';
		}
	}

	echo json_encode($categories);
	wp_die();
}
require_once('custom-classes/class-restaurant.php');

add_action('wp_ajax_get_restaurant_json_ajax', 'get_restaurant_json_ajax');
add_action('wp_ajax_nopriv_get_restaurant_json_ajax', 'get_restaurant_json_ajax');

function get_restaurant_json_ajax()
{
	$postType = $_POST['postType'];
	$categoryNo = $_POST['categoryNo'];
	$offset = $_POST['offset'];
	$postsPerPage = $_POST['postsPerPage'];
	$ชื่อร้าน = $_POST['ชื่อร้าน'];
	$startNum = $_POST['startNum'];
	$endNum = $_POST['endNum'];

	$posts = Restaurant::getPostsByCategory($postType, $categoryNo, $postsPerPage, $offset, null, $ชื่อร้าน, $startNum, $endNum);

	echo json_encode($posts);
	wp_die();
}

add_action('wp_ajax_get_posts_by_acf_field_json_ajax', 'get_posts_by_acf_field_json_ajax');
add_action('wp_ajax_nopriv_get_posts_by_acf_field_json_ajax', 'get_posts_by_acf_field_json_ajax');

function get_posts_by_acf_field_json_ajax()
{
	$postType = $_POST['postType'];
	$postsPerPage = $_POST['postsPerPage'];
	$categoryNo = $_POST['categoryNo'];
	$acfFields = $_POST['acf_fields'];
	$taxonomies = $_POST['taxonomies'];
	$offset = $_POST['offset'];

	$options = array(
		'numberposts'	=> $postsPerPage,
		'post_type'		=> $postType,
		'category__in' => $categoryNo,
		'offset' => $offset
	);

	if ($acfFields && count($acfFields) > 0) {
		$meta_query = array('relation' => 'AND');
		foreach ($acfFields as $key => $acfField) {
			array_push(
				$meta_query,
				array(
					'key' => $acfField['field'],
					'compare' => $acfField['compare'],
					'value' => is_numeric($acfField['value']) ? intval($acfField['value']) : $acfField['value'],
					'type'    => is_numeric($acfField['value']) ? 'numeric' : 'char',
				)
			);
		}
		$options['meta_query'] = $meta_query;
	}

	if ($taxonomies != null && count($taxonomies) > 0) {
		foreach ($taxonomies as $key => $taxonomy) {
			$tax_query = array('relation' => 'AND');
			array_push(
				$tax_query,
				array(
					'taxonomy' => $taxonomy['taxonomy'],
					'field' => $taxonomy['field'],
					'terms' => $taxonomy['terms'],
				)
			);
		}
		$options['tax_query'] = $tax_query;
	}

	$posts = get_posts($options);
	$postsObject = new WP_Query($options);
	if ($posts && $posts[0]) {
		$posts[0]->total = $postsObject->found_posts;
	}

	if ($postType === 'franchises') {
		foreach ($posts as $key => $post) {
			$post->ชื่อธุรกิจ = get_field('ชื่อธุรกิจ', $post->ID);
			$post->จำนวนสาขา = get_field('จำนวน_franchise_c', $post->ID);
			$post->ค่าสมัคร = get_field('franchise_price', $post->ID);
			$post->ประเภทธุรกิจ = get_the_terms($post->ID, 'franchise_type') ? get_the_terms($post->ID, 'franchise_type')[0]->name : '';
			$post->รูปภาพ =  get_field('รูปภาพ', $post->ID);
		}
	}

	if ($categoryNo == get_category_by_slug('restaurant101')->cat_ID) {
		foreach ($posts as $key => $post) {
			$post->pictureUrl = get_the_post_thumbnail_url($post->ID) ? get_the_post_thumbnail_url($post->ID)  :  get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260';
			$post->restaurantCategory = get_field('restaurant_101_category', $post->ID) && get_field('restaurant_101_category', $post->ID)[0] ? get_field('restaurant_101_category', $post->ID)[0] : '';
			$post->title = get_the_title($post->ID);
		}
	}

	echo json_encode($posts);
	wp_die();
}
