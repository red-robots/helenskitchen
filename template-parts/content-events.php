<?php
/**
 * Template part for displaying page content in page-events.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-events"); ?>>
    <?php $banner_image = get_field("banner_image");
    $post = get_post(1092);
    setup_postdata( $post );
    $more_text = get_field("contact_us_text");
    if(!$more_text):
        $more_text = "Contact Us to Order";
    endif;
    $more_link = get_the_permalink( );
    wp_reset_postdata();
    if($banner_image):?>
        <img class="banner" src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>">
    <?php endif;?>
    <header>
        <h1>
            <?php the_title();?>
        </h1>
    </header>
    <?php if(get_the_content( )):?>
        <div class="copy">
            <?php the_content();?>
        </div><!--.copy-->
    <?php endif;?>
    <?php $events = get_field("event");
    if($events):?>
        <div class="events clear-bottom">
            <?php foreach($events as $event):
                $title = $event['title'];
                $image = $event['image'];
                $description = $event['description'];?>
                <div class="event js-blocks">
                    <?php if($image):?>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    <?php endif;?>
                    <?php if($title):?>
                        <header>
                            <h2>
                                <?php echo $title;?>
                            </h2>
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
                </div><!--event-->
            <?php endforeach;?>
        </div><!--.events-->
    <?php endif;?>
</article><!-- #post-## -->
