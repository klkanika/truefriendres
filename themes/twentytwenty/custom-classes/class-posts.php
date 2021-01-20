<?php
class Post
{
    var $id;
    var $title;
    var $link;
    var $categories;
    var $featuredImage;

    // interviews
    var $interviewee;
    var $intervieweeBusiness;

    public static function getStickyPosts($postsPerPage)
    {
        $posts = [];
        $sticky = get_option('sticky_posts');
        rsort($sticky);

        if (!empty($sticky)) {
            $args = array(
                'posts_per_page' => $postsPerPage,
                'post__in'  => $sticky,
                'post_status'      => 'publish',
                'ignore_sticky_posts' => 1,
                'order'    => 'DESC'
            );

            $the_query = new WP_Query($args);

            while ($the_query->have_posts()) {
                $the_query->the_post();
                $thePost = Post::getPost('post');
                array_push($posts, $thePost);
            }

            usort($posts, function ($a, $b) {
                $d = 0;
                $t = get_post_meta($a->ID, 'sticky_time');
                $is_fixed = get_field('is_fixed', $a->ID) ?: false;
                $xa = 0;
                if ($is_fixed) {
                    var_dump($a->ID);
                    $d = 9999999999999999;
                }
                if (isset($t) && $t[0]) {
                    $xa = - ($d + (int)$t[0]);
                } else {
                    $xa = - ($d);
                }
                $d = 0;
                $t = get_post_meta($b->ID, 'sticky_time');
                $is_fixed = get_field('is_fixed', $b->ID) ?: false;
                $xb = 0;
                if ($is_fixed) {
                    var_dump($b->ID);
                    $d = 9999999999999999;
                }
                if (isset($t) && $t[0]) {
                    $xb = - ($d + (int)$t[0]);
                } else {
                    $xb = - ($d);
                }
                if ($xa == $xb)
                    return 0;
                else if ($xa > $xb)
                    return 1;
                else
                    return -1;
            });


            $posts = array_slice($posts, 0, $postsPerPage, true);

            wp_reset_query();
        }

        if (count($posts) < $postsPerPage) {
            $args2 = array(
                'posts_per_page' => ($postsPerPage - count($posts)),
                'post_status'      => 'publish',
                'post_type' => 'post',
                'post__not_in'  => $sticky,
                'order'    => 'DESC'
            );

            $the_query2 = new WP_Query($args2);
            while ($the_query2->have_posts()) {
                $the_query2->the_post();
                $thePost = Post::getPost('post');
                // echo(json_encode($thePost));
                array_push($posts, $thePost);
            }

            wp_reset_query();
        }

        return $posts;
    }

    public static function getPostsByCategory($postType, $categoryNo, $postsPerPage, $offset)
    {
        $args = array(
            'post_type' => $postType,
            'posts_per_page' => $postsPerPage,
            'offset' => $offset,
            'post_status' =>  'publish',
            'ignore_sticky_posts' => 1
        );

        if ($postType === 'post' && $categoryNo != null) {
            $args['cat'] = $categoryNo;
        }

        $query = new WP_Query($args);

        $posts = [];
        if ($query->have_posts()) {
            $tq = $query->found_posts;
            while ($query->have_posts()) {
                $query->the_post();
                $thePost = Post::getPost($postType);
                array_push($posts, $thePost);
            }
        }

        return
            json_decode('{
                "posts" : ' . json_encode($posts) . ',' .
                '"posts_count" : ' .  $query->found_posts .
                '}');
    }

    private static function getPost($postType)
    {
        $thePost = new Post();
        $thePost->id =  (get_the_ID());
        $thePost->title = get_the_title();
        $thePost->link = get_the_permalink();
        $thePost->categories = get_the_category();
        $thePost->featuredImage = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'wp-content/themes/twentytwenty/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260';
        $thePost->date = get_the_date('d M Y');

        if ($postType === 'interviews') {
            $thePost->interviewee = get_field('interviewee');
            $thePost->intervieweeBusiness = get_field('intervieweeBusiness');
            $thePost->intervieweeBusinessLogo = get_field('intervieweeBusinessLogo');
        }
        if ($postType === 'gallery') {
            $thePost->images = get_field('images');
        }

        return $thePost;
    }
}
