<?php

/**
 * Template Name: Archive Page
 * -----------------------------------------------------------------------------
 * This is a simple dumb list of the site's archives by date, by category and by
 * tag. You are welcome to insert any custom taxonomies and post types wherever.
 * 
 * @category   PHP Script
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

get_header();
$timed_archive_counts = timed_archives_count();

// Archives by date.

printf('<h5 class="title">%s</h5>', __('Archives by Year', TTD));
printf('<div class="archive">');

foreach ($timed_archive_counts as $year => $months) {
    $first_post = year_first_post($year, true);

    printf('<div class="archive-card" id="archive-card-%s">', $year);

    printf('<h2 %s><a title="%s" href="%s">%s</a></h2>',
        post_image_css($first_post, false),
        __('Archives for the year ', TTD) . $year,
        get_year_link($year),
        $year
    );

    printf('<ul>');

    foreach ($months as $month => $count) {
        printf('<li><a href="%s">%s (%s)</a></li>',
            get_month_link($year, $month),
            get_month_from_number($month),
            $count
        );
    }

    printf('</ul></div>');
}

printf('</div>');
printf('<hr>');

// Arhives by category.
// TODO

printf('<h5 class="title">%s</h5>', __('Archives by Category', TTD));
printf('<hr>');

// Archives by tag.
// TODO

// Statistics.

printf('<h5 class="title">%s</h5>', __('Blog Statistics', TTD));
printf('<p>%s</p>', blog_statistics());

// Keep any custom taxonomies below here. Or not. I'm a comment, not a cop. ;)
get_footer(); ?>
