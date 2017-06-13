<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-products"); ?>>
    <?php $banner_image = get_field("banner_image");
    $more_text = get_field("more_text");
    if(!$more_text):
        $more_text = "More Info";
    endif;
    if($banner_image):?>
        <img class="banner" src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>">
    <?php endif;?>
    <header>
        <h1><?php the_title();?></h1>
    </header>
    <?php $product_type = get_field("product_type");
    $args = array(
        'post_type'=>'product',
        'posts_per_page'=>-1,
    );
    if($product_type):
        $args['tax_query'] = array(
            array(
                'taxonomy'=>'product_type',
                'field'=>'term_id',
                'terms'=> $product_type
            )
        );
    endif;
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
                    <div class="more">
                        <a href="<?php echo get_the_permalink();?>">
                            <?php echo $more_text;?>
                        </a>
                    </div><!--.more-->
                </div><!--.product--> 
            <?php endwhile;?>
        </div><!--.products-->
    <?php endif;?>
</article><!-- #post-## -->
