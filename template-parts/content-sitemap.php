<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-sitemap"); ?>>
	<header>
		<?php the_title(); ?>
	</header>
	<div class="copy">
		<?php the_content();?>
		<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
	</div><!--.copy-->
</article><!-- #post-## -->
