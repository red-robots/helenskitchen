<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
	<section class="section section-1">
		<header id="masthead" class="site-header" role="banner">
			<h1 class="logo">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png"; ?>"></a>
			</h1>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	</div><!--.section-->
	<section class="section section-2">
	</div><!--.section-->
	<section class="section section-3">
	</div><!--.section-->
	<section class="section section-4">
	</div><!--.section-->
	<section class="section section-5">
	</div><!--.section-->
</article><!-- #post-## -->
