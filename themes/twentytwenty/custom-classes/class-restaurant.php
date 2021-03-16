<?php
class Restaurant
{
    var $id;
    var $title;
    var $link;
    var $categories;
    var $featuredImage;

    public static function getPostsByCategory($postType, $categoryNo, $postsPerPage, $offset, $except, $ชื่อร้าน, $startNum, $endNum)
    {
        $args = array(
            'post_type' => $postType,
            'offset' => $offset,
            'post_status' =>  'publish',
            'ignore_sticky_posts' => 1,
        );

        if ($postsPerPage != null) {
            $args['posts_per_page'] = $postsPerPage;
        }

        if ($categoryNo != null) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'restaurant_type',
                    'field' => 'term_id',
                    'terms' => $categoryNo
                )
            );
        }    

        if ($except != null) {
            $args['post__not_in'] = $except;
        }

        if ($ชื่อร้าน != null || $startNum != null) {

            $name = null;
            $startNumFilter = null;
            $endNumFilter = null;
            if($endNum == null && $startNum != null){
                $startNumFilter = array(
                    'key'		=> 'จำนวนสาขา',
                    'value'		=> $startNum,
                    'type'		=> 'NUMERIC',
                    'compare'	=> '>'
                );
            }else if($startNum != null && $endNum != null){
                $startNumFilter = array(
                    'key'		=> 'จำนวนสาขา',
                    'value'		=> $startNum,
                    'type'		=> 'NUMERIC',
                    'compare'	=> '>='
                );

                $endNumFilter = array(
                    'key'		=> 'จำนวนสาขา',
                    'value'		=> $endNum,
                    'type'		=> 'NUMERIC',
                    'compare'	=> '<='
                );
            }

            if($ชื่อร้าน != null){
                $name = array(
                    'key'	 	=> 'ชื่อร้าน',
                    'value'	  	=> $ชื่อร้าน,
                    'compare' 	=> 'LIKE',
                );
            }

            if($startNumFilter == null && $name != null){
                $args['meta_query'] = array(
                    'relation'		=> 'AND',
                    $name,
                );
            }else if($name == null){
                if($endNumFilter == null){
                    $args['meta_query'] = array(
                        'relation'		=> 'AND',
                        $startNumFilter,
                    );
                }else{
                    $args['meta_query'] = array(
                        'relation'		=> 'AND',
                        $startNumFilter,
                        $endNumFilter,
                    );
                }
            }else{
                $args['meta_query'] = array(
                    'relation'		=> 'AND',
                    $name,
                    $startNumFilter,
                    $endNumFilter,
                );
            }
        }

        $query = new WP_Query($args);

        $posts = [];
        if ($query->have_posts()) {
            $tq = $query->found_posts;
            while ($query->have_posts()) {
                $query->the_post();
                $thePost = Restaurant::getPost($postType, null);
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
        $thePost = new Restaurant();
        $thePost->id =  (get_the_ID());
        $thePost->title = get_the_title();
        $thePost->link = get_the_permalink();
        $thePost->categories = get_the_category();
        $thePost->featuredImage = get_the_post_thumbnail_url() && file_exists(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260';
        $thePost->date = get_the_date('d M Y');
        $thePost->numberDate = get_the_date('d/m/Y');
        $thePost->ชื่อร้าน = get_field('ชื่อร้าน');
        $restaurantTypes = wp_get_post_terms(get_the_ID(), 'restaurant_type');
        $thePost->typeId = $restaurantTypes[0]->term_id;
        $thePost->ประเภทธุรกิจ = $restaurantTypes[0]->name;
        $thePost->จำนวนสาขา = get_field('จำนวนสาขา');
        $thePost->จังหวัด = get_field('province');
        $thePost->เบอร์โทรศัพท์ = get_field('telInfo')['telNo'];

        return $thePost;
    }
}
