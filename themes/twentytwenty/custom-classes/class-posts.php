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

    public static function getStickyPosts($postType, $postsPerPage)
    {
        $posts = [];
        $sticky = get_option('sticky_posts');
        rsort($sticky);

        if (!empty($sticky)) {
            $args = array(
                'posts_per_page' => $postsPerPage,
                'post_type' => $postType,
                'post__in'  => $sticky,
                'post_status'      => 'publish',
                'ignore_sticky_posts' => 1,
                'order'    => 'DESC',
            );

            $the_query = new WP_Query($args);

            while ($the_query->have_posts()) {
                $the_query->the_post();
                $thePost = Post::getPost('post', null);
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
                'post_type' => $postType,
                'post_status'      => 'publish',
                'post__not_in'  => $sticky,
                'order'    => 'DESC'
            );

            $the_query2 = new WP_Query($args2);
            while ($the_query2->have_posts()) {
                $the_query2->the_post();
                $thePost = Post::getPost('post', null);
                // echo(json_encode($thePost));
                array_push($posts, $thePost);
            }

            wp_reset_query();
        }

        return $posts;
    }

    public static function test()
    {
        return true;
    }

    public static function getPostsByCategory($postType, $categoryNo, $postsPerPage, $offset, $except, $orderField = false, $order = false)
    {
        $args = array(
            'post_type' => $postType,
            'offset' => $offset,
            'post_status' =>  'publish',
            'ignore_sticky_posts' => 1,
        );

        if ($orderField) {
            $args['meta_key'] = $orderField;
            $args['orderby'] = 'meta_value';
        }

        if ($order) {
            $args['order'] = $order;
        }

        if ($postsPerPage != null) {
            $args['posts_per_page'] = $postsPerPage;
        }

        if ($postType === 'post' && $categoryNo != null) {
            $args['category__in'] = $categoryNo;
            // $args['category__not_in'] = get_category_by_slug('Uncategorized')->cat_ID;
        } else if (($postType === 'suppliers') && $categoryNo != null) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'suppliertypes',
                    'field' => 'term_id',
                    'terms' => $categoryNo
                )
            );
        } else if (($postType === 'courses') && $categoryNo != null) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'course_type',
                    'field' => 'term_id',
                    'terms' => $categoryNo
                )
            );
        } else if (($postType === 'restaurants') && $categoryNo != null) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'restaurant_type',
                    'field' => 'term_id',
                    'terms' => $categoryNo
                )
            );
        } else if (($postType === 'franchises') && $categoryNo != null) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'franchise_type',
                    'field' => 'term_id',
                    'terms' => $categoryNo
                )
            );
        }


        if ($except != null) {
            $args['post__not_in'] = $except;
        }

        $query = new WP_Query($args);

        $posts = [];
        if ($query->have_posts()) {
            $tq = $query->found_posts;
            while ($query->have_posts()) {
                $query->the_post();
                $thePost = Post::getPost($postType, null);
                array_push($posts, $thePost);
            }
        }

        return
            json_decode('{
                "posts" : ' . json_encode($posts) . ',' .
                '"posts_count" : ' .  $query->found_posts .
                '}');
    }

    private static function getPost($postType, $category)
    {
        $thePost = new Post();
        $thePost->id =  (get_the_ID());
        $thePost->title = get_the_title();
        $thePost->link = get_the_permalink();
        $thePost->categories = get_the_category();
        $thePost->featuredImage = @getimagesize(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260';
        $thePost->date = get_the_date('d M Y');
        $thePost->numberDate = get_the_date('d/m/Y');
        $thePost->restaurantCategory = get_field('restaurant_101_category');

        if ($postType === 'interviews') {
            $thePost->interviewee = get_field('interviewee');
            $thePost->intervieweeBusiness = get_field('intervieweeBusiness');
            $thePost->intervieweeBusinessLogo = get_field('intervieweeBusinessLogo') && file_exists(get_field('intervieweeBusinessLogo')) ? get_field('intervieweeBusinessLogo') : get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260';
        }

        if ($postType === 'suppliers') {
            $thePost->ชื่อธุรกิจ = get_field('ชื่อธุรกิจ');
            $thePost->รายละเอียดเจ้าของธุรกิจ = get_field('รายละเอียดเจ้าของธุรกิจ');
        }

        if ($postType === 'restaurants') {
            $thePost->ชื่อร้าน = get_field('ชื่อร้าน');
            $restaurantTypes = wp_get_post_terms(get_the_ID(), 'restaurant_type');
            $thePost->typeId = $restaurantTypes[0]->term_id;
            $thePost->ประเภทธุรกิจ = $restaurantTypes[0]->name;
            $thePost->จำนวนสาขา = get_field('จำนวนสาขา');
            $thePost->จังหวัด = get_field('province');
            $thePost->เบอร์โทรศัพท์ = get_field('telInfo')['telNo'];
        }

        if ($postType === 'documents') {
            $thePost->ชื่อ = get_field('ชื่อ');
            $thePost->รายละเอียด = get_field('รายละเอียด');
            $thePost->file = get_field('file');
            $thePost->pictureUrl = get_field('pictureurl');
        }

        if ($postType === 'advertisement') {
            $thePost->adsLink = get_field('link');
            $thePost->adsImage = get_field('image');
            $thePost->adsMobileImage = get_field('mobile_image');
            $thePost->adsDisplayAt = get_field('display_at');
        }

        if ($postType === 'courses') {
            $thePost->ชื่อ = get_field('ชื่อ');
            $thePost->terms = get_the_terms(get_the_ID(), 'course_type');
        }

        if ($postType === 'franchises') {
            $thePost->ชื่อธุรกิจ = get_field('ชื่อธุรกิจ');
            $thePost->จำนวนสาขา = get_field('จำนวน_franchise_c');
            $thePost->ประเภทธุรกิจ = get_the_terms(get_the_ID(), 'franchise_type') && get_the_terms(get_the_ID(), 'franchise_type')[0] ? get_the_terms(get_the_ID(), 'franchise_type')[0]->name : '';
            $thePost->ค่าสมัคร = get_field('franchise_price');
            $thePost->รูปภาพ = get_field('รูปภาพ');
        }

        return $thePost;
    }

    public static function searchPosts($keyword, $postsPerPage, $offset)
    {
        $args = array(
            's' => $keyword,
            'offset' => $offset,
        );
        if ($postsPerPage != null) {
            $args['posts_per_page'] = $postsPerPage;
        }

        $query = new WP_Query($args);

        $posts = [];
        if ($query->have_posts()) {
            $tq = $query->found_posts;
            while ($query->have_posts()) {
                $query->the_post();
                $thePost = Post::getPost(null, null);
                array_push($posts, $thePost);
            }
        }

        return
            json_decode('{
                "posts" : ' . json_encode($posts) . ',' .
                '"posts_count" : ' .  $query->found_posts .
                '}');
    }

    // function getPostBySlug( $slug, $post_type = "post" ) {
    //     $query = new WP_Query(
    //         array(
    //             'name'   => $slug,
    //             'post_type'   => $post_type,
    //             'numberposts' => 1,
    //             'fields'      => 'ids',
    //         ) );
    //     $posts = $query->get_posts();
    //     return array_shift( $posts );
    // }
}
