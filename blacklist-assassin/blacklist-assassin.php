<?php
/**
 * Plugin Name: Blacklist Assassin
 * Plugin URI: http://joshmountain.com/blacklist-assassin
 * Description: A more ruthless WordPress blacklist.
 * Version: 1.0.0
 * Author: Josh Mountain
 * Author URI: http://joshmountain.com
 * License: GPL2
 */

/*  Copyright 2014  Josh Mountain  (email : hello@joshmountain.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('pre_comment_approved', 'custom_blacklist', 10, 2 );

function custom_blacklist( $approved, $commentdata ) {

    extract($commentdata, EXTR_SKIP);
    
    if ( wp_blacklist_check($comment_author, $comment_author_email, $comment_author_url, $comment_content, $comment_author_IP, $comment_agent) )
        $approved = 'trash';

    return $approved;
}