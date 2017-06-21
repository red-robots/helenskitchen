<?php
/**
 * Template part for displaying page content in page-blog.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-blog"); ?>>
	 <?php $banner_image = get_field("banner_image");
    $more_text = get_field("more_text");
    $recent_posts_text = get_field("recent_posts_text");
    if(!$more_text):
        $more_text = "Read More";
    endif;
    if($banner_image):?>
        <img class="banner row-1" src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>">
    <?php endif;
    $not_in = array();?>
    <div class="row-2">
        <div class="col-1">
            <?php $args = array(
                "post_type"=>"post",
                "posts_per_page"=>2,
                "order"=>"DESC",
                "orderby"=>"date"
            );
            $query = new WP_Query($args);
            if($query->have_posts()):?>
                <div class="posts">
                    <?php while($query->have_posts()):$query->the_post();
                        $not_in[] = get_the_ID();?>
                        <div class="post">
                            <header>
                                <?php the_title();?>
                            </header>
                            <div class="date">
                                <?php the_date("M J,Y");?>
                            </div><!--.row-2-->
                            <div class="copy">
                                <?php the_content('');?>
                            </div><!--.copy-->
                            <div class="more-link">
                                <a href="<?php echo get_the_permalink();?>">
                                    <?php echo $more_text;?>
                                </a>
                            </div><!--.more-link-->
                        </div><!--.post-->
                    <?php endwhile;?>
                </div><!--.posts-->
                <?php wp_reset_postdata();
            endif;?>
            <div class="pagi-posts">
                <?php pagi_posts_nav_query($query);?>
            </div><!--.pagi-posts-->
        </div><!--.col-1-->
        <div class="col-2">
            <?php if($recent_posts_text):?>
                <header><?php echo $recent_posts_text;?></header>
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
                                <?php the_title();?>
                            </a>
                        </div><!--.item-->
                    <?php endwhile;?>
                </div><!--.items-->
                <?php wp_reset_postdata();
            endif;?>
        </div><!--.col-2-->
    </div><!--.row-2-->
</article><!-- #post-## -->
