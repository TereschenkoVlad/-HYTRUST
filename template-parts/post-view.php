<?php
/**
 * Created by PhpStorm.
 * User: vladt
 * Date: 08.08.2018
 * Time: 15:12
 */

?>

<li>
        <?php echo get_the_post_thumbnail( get_the_ID(), 'medium'); ?>
        <h2>
            <?php the_title(); ?>
        </h2>
        <p>
            <?php the_excerpt_embed(); ?>
        </p>
        <a href="<?php permalink_link() ?>">Learn more</a>
</li>
