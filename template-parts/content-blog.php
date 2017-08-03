<?php
/**
 * Template part for displaying page content in page-blog.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class("template-blog"); ?>>
	 <?php $banner_image = get_field("banner_image");
    $more_text = get_field("more_text");
    $recent_posts_text = get_field("recent_posts_text");
    if(!$more_text):
        $more_text = "Read More";
    endif;
    if($banner_image):?>
        <img class="banner row-1" src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>">
    <?php endif;?>
    <header class="row-2">
        <h1><?php the_title();?></h1>
    </header>
    <?php $not_in = array();?>
    <div class="row-3">
        <div class="col-1">
            <?php $args = array(
                "post_type"=>"post",
                "posts_per_page"=>2,
                "paged"=>$paged,
                "order"=>"DESC",
                "orderby"=>"date"
            );
            $query = new WP_Query($args);
            if($query->have_posts()):?>
                <div class="posts">
                    <?php while($query->have_posts()):$query->the_post();
                        $not_in[] = get_the_ID();?>
                        <article class="post">
                            <header>
                                <h1><?php the_title();?></h1>
                            </header>
                            <div class="date">
                                <?php the_date("M j, Y");?>
                            </div><!--.row-2-->
                            <div class="copy">
                                <?php the_content('');?>
                            </div><!--.copy-->
                            <div class="more-link">
                                <a href="<?php echo get_the_permalink();?>">
                                    <?php echo $more_text;?>
                                </a>
                            </div><!--.more-link-->
                        </article><!--.post-->
                    <?php endwhile;?>
                </div><!--.posts-->
                <?php wp_reset_postdata();
            endif;?>
            <div class="pagi-posts">
                <?php pagi_posts_nav_query($query);?>
            </div><!--.pagi-posts-->
        </div><!--.col-1-->
        <section class="col-2">
            <?php if($recent_posts_text):?>
                <header><h2><?php echo $recent_posts_text;?><h2></header>
            <?php endif;?>
            <?php $args = array(
                "post_type"=>"post",
                "post__not_in"=>$not_in,
                "posts_per_page"=>25,
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
        </section><!--.col-2-->
    </div><!--.row-3-->
</section><!-- #post-## -->
