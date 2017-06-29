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
		<div class="wrapper">
			<header id="masthead" class="site-header" role="banner">
				<h1 class="logo">
					<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png"; ?>"></a>
				</h1>
				<nav id="site-navigation" class="main-navigation clear-bottom" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'acstarter' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
			<?php $text = get_field("section_1_text");?>
			<?php $image = get_field("section_1_image");?>
			<div class="row-1" <?php if($image): echo 'style="background-image: url('.$image['url'].');"';endif;?>>
				<?php if($text):?>
					<div class="text">
						<?php echo $text; ?>
					</div><!--.text-->
				<?php endif;?>
			</div><!--.row-1-->
			<img class="divot" src="<?php echo get_template_directory_uri()."/images/divot.png";?>" alt="divot">
		</div><!--.wrapper-->
	</section><!--.section-->
	<section class="section section-2">
		<div class="wrapper">
			<?php $title = get_field("section_2_title");
			$image = get_field("section_2_image");
			$copy = get_field("section_2_copy");
			if($title):?>
				<div class="row-1">
					<?php echo $title;?>
				</div><!--.row-1-->
			<?php endif;
			if($image):?>
				<div class="row-2">
					<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
				</div><!--.row-2-->
			<?php endif;
			if($copy):?>
				<div class="row-3">
					<?php echo $copy;?>
				</div><!--.row-3-->
			<?php endif;?>
		</div><!--.wrapper-->
	</section><!--.section-->
	<section class="section section-3">
		<div class="wrapper">
			<?php $title = get_field("section_3_title");
			$image = get_field("section_3_image");
			$copy = get_field("section_3_copy");
			$button_text = get_field("section_3_button_text");
			$button_link = get_field("section_3_link");?>
			<div class="col-1">
				<?php if($image):?>
					<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
				<?php endif;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php if($title):?>
					<div class="title">
						<?php echo $title;?>
					</div><!--.title-->
				<?php endif;?>
				<?php if($copy):?>
					<div class="copy">
						<?php echo $copy;?>
					</div><!--.copy-->
				<?php endif;?>
				<?php if($button_link && $button_text):?>
					<div class="button">
						<a href="<?php echo $button_link;?>">
							<?php echo $button_text;?>
						</a>
					</div><!--.button-->
				<?php endif;?>
			</div><!--.col-2-->
			<img class="divot" src="<?php echo get_template_directory_uri()."/images/divot.png";?>" alt="divot">
		</div><!--.wrapper-->
	</section><!--.section-->
	<section class="section section-4">
		<div class="wrapper">
			<?php $title = get_field("section_4_title");
			$image = get_field("section_4_image");
			$copy = get_field("section_4_copy");
			$button_text = get_field("section_4_button_text");
			$button_link = get_field("section_4_link");?>
			<div class="col-1">
				<?php if($title):?>
					<div class="title">
						<?php echo $title;?>
					</div><!--.title-->
				<?php endif;?>
				<?php if($copy):?>
					<div class="copy">
						<?php echo $copy;?>
					</div><!--.copy-->
				<?php endif;?>
				<?php if($button_link && $button_text):?>
					<div class="button">
						<a href="<?php echo $button_link;?>">
							<?php echo $button_text;?>
						</a>
					</div><!--.button-->
				<?php endif;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php if($image):?>
					<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
				<?php endif;?>
			</div><!--.col-2-->
		</div><!--.wrapper-->
	</section><!--.section-->
	<section class="section section-5">
		<div class="wrapper">
			<?php $title = get_field("section_5_title");
			if($title):?>
				<h2 class="title">
					<?php echo $title;?>
				</h2><!--.title-->
			<?php endif;?>
			<?php $args = array(
				'post_type'=>'post',
				'post_per_page'=>3,
				'orderby'=>'date',
				'order'=>'DESC'
			);
			$query = new WP_Query( $args );
			if($query->have_posts()):?>
				<?php while($query->have_posts()): $query->the_post();?>
					<?php the_title();?>
				<?php endwhile;?>
				<?php $post = get_post(5);
				setup_postdata( $post );
			endif;?>
		</div><!--.wrapper-->
	</section><!--.section-->
	<section class="section section-6">
		<div class="wrapper">
			<div class="row-1">
				<?php $title = get_field("section_6_title");
				$image = get_field("section_6_image");
				$copy = get_field("section_6_copy");?>
				<div class="col-1">
					<?php if($image):?>
						<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
					<?php endif;?>
				</div><!--.col-1-->
				<div class="col-2">
					<?php if($title):?>
						<div class="title">
							<?php echo $title;?>
						</div><!--.title-->
					<?php endif;?>
					<?php if($copy):?>
						<div class="copy">
							<?php echo $copy;?>
						</div><!--.copy-->
					<?php endif;?>
				</div><!--.col-2-->
				<img class="divot" src="<?php echo get_template_directory_uri()."/images/divot.png";?>" alt="divot">
			</div><!--.row-1-->
			<footer id="colophon" class="site-footer" role="contentinfo">
				<?php $facebook_link = get_field("facebook_link","option");
				$instagram_link = get_field("instagram_link","option");
				$pinterest_link = get_field("pinterest_link","option");
				if($facebook_link||$instagram_link||$pinterest_link):?>
					<div class="row-1">
						<?php if($facebook_link):?>
							<a href="<?php echo $facebook_link;?>">
								<i class="fa fa-facebook"></i>
							</a>
						<?php endif;?>
						<?php if($instagram_link):?>
							<a href="<?php echo $instagram_link;?>">
								<i class="fa fa-instagram"></i>
							</a>
						<?php endif;?>
						<?php if($pinterest_link):?>
							<a href="<?php echo $pinterest_link;?>">
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
		</div><!--.wrapper-->
	</section><!--.section-->
</article><!-- #post-## -->
