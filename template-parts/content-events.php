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
    <header>
        <h1>
            <?php the_title();?>
        </h1>
    </header>
    <div class="copy">
        <?php the_content();?>
    </div><!--.copy-->
    <?php $events = get_field("event");
    if($events):?>
        <div class="events clear-bottom">
            <?php foreach($events as $event):
                $title = $event['title'];
                $image = $event['image'];
                $description = $event['description'];?>
                <div class="event">
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
                    <?php endif;?>
                </div><!--event-->
            <?php endforeach;?>
        </div><!--.events-->
    <?php endif;?>
</article><!-- #post-## -->
