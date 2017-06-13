<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-product"); ?>>
    <?php $single_page_image = get_field("single_page_image");
    $post = get_post();
    setup_postdata( $post );
    $more_text = get_field("contact_us_text");
    $more_link = get_the_permalink( );
    wp_reset_postdata();?>
    <div class="row-1">
        <div class="col-1">
            <?php if($single_page_image):?>
                <img class="banner" src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>">
            <?php endif;?>
        </div><!--.col-1-->
        <div class="col-2">
            <header>
                <h1><?php the_title();?></h1>
            </header>
            <?php if(get_the_content()):?>
                <div class="copy">
                    <?php the_content();?>
                </div><!--.copy-->
            <?php endif;
            if($more_link && $more_text):?>
                <div class="more">
                    <a href="<?php echo $more_link;?>">
                        <?php echo $more_text;?>
                    </a>
                </div><!--.more-->
            <?php endif;?>
        </div><!--.col-2-->
    </div><!--.row-2-->
    <?php 
    $args = array(
        'post_type'=>'product',
        'posts_per_page'=>-1,
    );
    $query = new WP_Query($args);
    if($query->have_posts()):?>
        <div class="products">
            <?php while($query->have_posts()):$query->the_post();?>
                <div class="product">
                    <?php $product_page_image = get_field("product_page_image");?>
                    <?php if($product_page_image):?>
                        <img src="<?php echo $product_page_image['sizes']['large'];?>" alt="<?php echo $product_page_image['alt'];?>">
                    <?php endif;?>
                    <header>
                        <h2><?php the_title();?></h2>
                    </header>
                </div><!--.product--> 
            <?php endwhile;?>
        </div><!--.products-->
    <?php endif;?>
</article><!-- #post-## -->
