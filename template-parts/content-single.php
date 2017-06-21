<?php
/**
 * Template part for displaying page content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single"); ?>>
	<?php $post = get_post(42);
	setup_postdata( $post );
    $recent_posts_text = get_field("recent_posts_text");
	wp_reset_postdata();
	$not_in = array(get_the_ID());?>
    <div class="row-1">
        <div class="col-1">
			<div class="post">
				<header>
					<h1><?php the_title();?><h1>
				</header>
				<div class="date">
					<?php the_date("M J,Y");?>
				</div><!--.row-2-->
				<div class="copy">
					<?php the_content();?>
				</div><!--.copy-->
			</div><!--.post-->
        </div><!--.col-1-->
        <div class="col-2">
            <?php if($recent_posts_text):?>
                <header><h2><?php echo $recent_posts_text;?></h2></header>
            <?php endif;?>
            <?php $args = array(
                "post_type"=>"post",
                "post__not_in"=>$not_in,
                "posts_per_page"=>5,
                "order"=>"DESC",
                "orderby"=>"date"
            );
            $query = new WP_Query($args);
            if($query->have_posts()):?>
                <div class="items">
                    <?php while($query->have_posts()):$query->the_post();?>
                        <div class="item">
                            <a href="<?php echo get_the_permalink();?>">
                                <h3><?php the_title();?></h3>
                            </a>
                        </div><!--.item-->
                    <?php endwhile;?>
                </div><!--.items-->
                <?php wp_reset_postdata();
            endif;?>
        </div><!--.col-2-->
    </div><!--.row-1-->
</article><!-- #post-## -->
