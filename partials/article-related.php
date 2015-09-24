<?php

/**
 * Related Article Template
 * -----------------------------------------------------------------------------
 * @category   PHP Script
 * @package    Sheepie
 * @author     Mark Grealish <mark@bhalash.com>
 * @copyright  Copyright (c) 2015 Mark Grealish
 * @license    https://www.gnu.org/copyleft/gpl.html The GNU GPL v3.0
 * @version    1.0
 * @link       https://github.com/bhalash/sheepie
 */

?>

<article <?php post_class('related'); ?> id="article-<?php the_ID(); ?>">
    <header class="title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <div class="excerpt-thumbnail thumbnail" <?php post_image_css($post->ID, true); ?>></div>
            <?php the_title('<h6 class="title">', '</h6>'); ?>
        </a>
    </header>
    <footer>
        <small><?php sheepie_partial('postmeta'); ?></small>
    </footer>
</article>
