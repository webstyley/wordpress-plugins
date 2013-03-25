<?php

/*

Plugin Name: Eliminate Comments Tracebacks and Pings

Plugin URI: http://www.wordpress.org

Description: When activated, disables posting of comments, tracebacks and pingbacks to pages and posts, it also hides all existing ones.

Version: 1.0.2

Author: WebStyley.com

Author URI: http://www.webstyley.com

*/



/*

Copyright (c) 2012 WebStyley.com
Copyright (c) 2009 Jaka Jancar



Permission is hereby granted, free of charge, to any person

obtaining a copy of this software and associated documentation

files (the "Software"), to deal in the Software without

restriction, including without limitation the rights to use,

copy, modify, merge, publish, distribute, sublicense, and/or sell

copies of the Software, and to permit persons to whom the

Software is furnished to do so, subject to the following

conditions:



The above copyright notice and this permission notice shall be

included in all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,

EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES

OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND

NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT

HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,

WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING

FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR

OTHER DEALINGS IN THE SOFTWARE.

*/



function ncop_comments_open_filter($open, $post_id=null)

{

    $post = get_post($post_id);

    return $open && $post->post_type !== 'page';

}



function ncop_comments_template_filter($file)

{

    return is_page() ? dirname(__FILE__).'/empty' : $file;

}



add_filter('comments_open', 'ncop_comments_open_filter', 10, 2);

add_filter('comments_template', 'ncop_comments_template_filter', 10, 1);



function ncop_pingbacks_open_filter($open, $post_id=null)

{

    $post = get_post($post_id);

    return $open && $post->post_type !== 'page';

}



add_filter('pingbacks_open', 'ncop_pingbacks_open_filter', 10, 2);

