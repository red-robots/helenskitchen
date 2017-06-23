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
    $post = get_post(1092);
    setup_postdata( $post );
    $more_text = get_field("contact_us_text");
    if(!$more_text):
        $more_text = "Contact Us to Order";
    endif;
    $more_link = get_the_permalink( );
    wp_reset_postdata();?>
    <div class="row-1">
        <div class="col-1">
            <?php if($single_page_image):?>
                <img src="<?php echo $single_page_image['sizes']['large'];?>" alt="<?php echo $single_page_image['alt'];?>">
            <?php endif;?>
        </div><!--.col-1-->
        <div class="col-2">
            <?php $secondary_title = get_field("secondary-product-title");?>
            <header>
                <h1>
                    <?php if($secondary_title):
                        echo $secondary_title;
                    else:
                        the_title();
                    endif;?>
                </h1>
            </header>
            <?php if(get_the_content()):?>
                <div class="copy">
                    <?php the_content();?>
                </div><!--.copy-->
            <?php endif;
            if($more_link):?>
                <div class="more">
                    <a href="<?php echo $more_link;?>">
                        <?php echo $more_text;?>
                    </a>
                </div><!--.more-->
            <?php endif;?>
        </div><!--.col-2-->
    </div><!--.row-1-->
    <?php $products_title = get_field("products_title","option");
    if($products_title):?>
        <header class="row-2">
            <h2><?php echo $products_title;?></h2>
        </header>
    <?php endif;?>
    <?php $available_products = get_field("available_products");
    $more_text_available_products = get_field("more_text_available_products");
    if(!$more_text_available_products):
        $more_text_available_products = "More Info";
    endif;
    if($available_products):?>
        <div class="products clear-bottom">
            <?php foreach($available_products as $row):
                $title = $row["title"];
                $description = $row["description"];
                $image = $row["image"];
                if($title):?>
                    <div class="product js-blocks">
                        <?php if($image):?>
                            <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;?>
                        <?php if($title):?>
                            <header>
                                <h2><?php echo $title;?></h2>
                            </header>
                        <?php endif;?>
                        <div class="more">
                            <a class="popup" href="#<?php echo sanitize_title_with_dashes($title);?>">
                                <?php echo $more_text_available_products;?>
                            </a>
                        </div><!--.more-->
                        <div class="hidden">
                            <div class="wrapper popup-product" id="<?php echo sanitize_title_with_dashes($title);?>">
                                <div class="col-1">
                                    <?php if($image):?>
                                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                    <?php endif;?>
                                </div><!--.col-1-->
                                <div class="col-2">
                                    <?php if($title):?>
                                        <header>
                                            <h2><?php echo $title;?></h2>
                                        </header>
                                    <?php endif;?>
                                    <?php if($description):?>
                                        <div class="copy">
                                            <?php echo $description;?>
                                        </div><!--.copy-->
                                    <?php endif;
                                    if($more_link):?>
                                        <div class="more">
                                            <a href="<?php echo $more_link;?>">
                                                <?php echo $more_text;?>
                                            </a>
                                        </div><!--.more-->
                                    <?php endif;?>
                                </div><!--.col-2-->
                            </div><!--.wrapper-->
                        </div><!--.hidden-->
                    </div><!--.product--> 
                <?php endif;
            endforeach;?>
        </div><!--.products-->
    <?php endif;?>
</article><!-- #post-## -->
