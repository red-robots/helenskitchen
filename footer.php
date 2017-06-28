<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php $facebook_link = get_field("facebook_link","option");
		$instagram_link = get_field("instagram_link","option");
		$pinterest_link = get_field("pinterest_link","option");
		if($facebook_link||$instagram_link||$pinterest_link):?>
			<div class="row-1">
				<?php if($facebook_link):?>
					<a href="<?php echo $facebook_link;?>" target="_blank">
						<i class="fa fa-facebook"></i>
					</a>
				<?php endif;?>
				<?php if($instagram_link):?>
					<a href="<?php echo $instagram_link;?>" target="_blank">
						<i class="fa fa-instagram"></i>
					</a>
				<?php endif;?>
				<?php if($pinterest_link):?>
					<a href="<?php echo $pinterest_link;?>" target="_blank">
						<i class="fa fa-pinterest"></i>
					</a>
				<?php endif;?>
			</div><!--.row-1-->
		<?php endif;?>
		<div class="row-2">
			<?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
		</div><!--.row-2-->
		<?php $copyright = get_field("copyright","option");
		if($copyright):?>
			<div class="row-3">
				<?php echo $copyright;?>
			</div><!--.row-3-->
		<?php endif;?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
