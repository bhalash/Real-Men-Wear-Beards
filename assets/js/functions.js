/**
 * Miscellaneous JavaScript Functions
 * -----------------------------------------------------------------------------
 * @category   JavaScript File
 * @package    Sheepie
 * @author     Mark Grealish <mark@bhalash.com>
 * @copyright  Copyright (c) 2015 Mark Grealish
 * @license    https://www.gnu.org/copyleft/gpl.html The GNU General Public License v3.0
 * @version    3.0
 * @link       https://github.com/bhalash/sheepie
 *
 * This file is part of Sheepie.
 *
 * Sheepie is free software: you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software 
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 * 
 * Sheepie is distributed in the hope that it will be useful, but WITHOUT ANY 
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along with 
 * Sheepie. If not, see <http://www.gnu.org/licenses/>.
 */

/*
 * Initialize highligh.js
 * -----------------------------------------------------------------------------
 * highlight.js operates on the <code> child or <pre> elements. This wraps the
 * content of an element with <code> before initializing highlight.js.
 */

jQuery('pre:not(:has(> code))').wrapInner('<code></code>');
hljs.initHighlightingOnLoad();

/**
 * Article Photobox
 * -----------------------------------------------------------------------------
 * Wordpress inserts a line break if it find a wayward space or line break in 
 * the post texarea. This can cause every other item in the photobox to be 
 * irregularly sized. I remove breaks in order to circumvent this.
 */

var photobox = {
    br: '.article-photobox br',
    a: 'article a:has(img)',
    lightbox: 'lightbox',
    addLightbox: function() {
        // Add lightbox to body on page load.
        jQuery('body').prepend('<a href="#_" id="' + photobox.lightbox + '"><img src="" /></a>');
        photobox.lightbox = '#' + photobox.lightbox;
    },
    setImage: function() {
        // Set lightbox image source on click.
        var src = jQuery(this).find('img').first().attr('src');
        jQuery(photobox.lightbox).find('img').attr('src', src);
        // window.history.back(1);
    },
    setHref: function() {
        // Change href of all items to point to the lightbox.
        jQuery(this).data('href', jQuery(this).attr('href'));
        jQuery(this).attr('href', photobox.lightbox);
    }
}

// Remove all line breaks within the photobox, as they can break formatting.
jQuery(photobox.br).remove();
photobox.addLightbox();
jQuery(photobox.a).each(photobox.setHref);
jQuery(photobox.a).click(photobox.setImage);

/*
 * Comments Focus
 * -----------------------------------------------------------------------------
 * The CSS style associated with this is still incomplete. Goal is to have 
 * comment 'pop out' when clicked.
 */

jQuery('.comment').click(function() { 
    jQuery('.comment').not(this).removeClass('focused-comment');
    jQuery(this).addClass('focused-comment');
    return false;
});