<?php
$currentPostId = $post->ID;
$currentPost = get_post($currentPostId);
$adsObjects = Post::getPostsByCategory('advertisement', null, null, 0, null);
$adsPosts = array_values(array_filter($adsObjects->posts, function ($p) {
  return in_array(
    'Post content',
    array_map(function ($c) {
      return $c;
    }, $p->adsDisplayAt)
  );
}));
$adsPostCount = count($adsPosts);
$randomAds = rand(0, ($adsPostCount-1)); 
?>
<div class="mb-8">
  <div class="border-b pb-2 mb-4 font-semibold tracking-wide">Sponsored by</div>
  <?php if($adsPosts && $adsPostCount > 0) {?>
    <a href="<?= $adsPosts[$randomAds]->adsLink ?>" target="_blank">
      <img class="hidden md:flex rounded w-full" src="<?=  $adsPosts[$randomAds]->adsImage ?>" alt="">
      <img class="md:hidden rounded w-full" src="<?=  $adsPosts[$randomAds]->adsMobileImage ?>" alt="">
    </a>
  <?php } ?>
</div>
<div class="mb-8">
  <div class="border-b pb-2 mb-4 font-semibold tracking-wide">Related Category</div>
  <div class="flex flex-col gap-4">
    <?php foreach (get_categories() as $key => $category) :
      if ($category->count > 0 && $key < 5) : ?>
        <a href="/category/<?= $category->slug ?>" class="flex justify-between items-center font-thin">
          <span><?= $category->name ?></span>
          <img src="<?= get_theme_file_uri() ?>/assets/images/right.png" class="cursor-pointer w-2" />
        </a>
    <?php endif;
    endforeach; ?>
  </div>
</div>
<?php
$relatedPosts = Post::getPostsByCategory('post', $cat_ID, 6, 0, [$postId])->posts;
if (count($relatedPosts) < 6) {
  $exceptPostId = [];
  foreach ($relatedPosts as $key => $thePost) :
    array_push($exceptPostId, $thePost->id);
  endforeach;

  $relatedPosts = array_merge($relatedPosts, Post::getPostsByCategory('post', null, 6 - count($relatedPosts), 0, array_merge([$postid], $exceptPostId))->posts);
}
// //set back
$time=strtotime($currentPost->post_date);
$day=date("d",$time);
$month=date("m",$time);
$year=date("Y",$time);
$hour=date("H",$time);
$minute=date("i",$time);
$second=date("s",$time) + 1;
$args = array(
  'date_query' => array(
      array(
          'after'     => array(
            'year'  => $year,
            'month' => $month,
            'day'   => $day,
            'hour'  => $hour,
            'minute' => $minute,
            'second' => $second,
          ),
          'inclusive' => true,
      ),
  ),
  'posts_per_page' => 7,
  'orderby'   => 'post_date',
  'order'     => 'ASC',
);

$query = new WP_Query( $args );
$queryPosts = [];
if ($query->have_posts()) {
    
  $tq = $query->posts;
  foreach ($tq as $key => $thePost) :
    array_push($queryPosts, $thePost);
  endforeach;
}
  
?>
<div class="mb-8">
  <div class="border-b pb-2 mb-2 font-semibold tracking-wide">Read next</div>
  <div class="flex flex-col">
    <?php foreach ($queryPosts as $key => $thePost) : ?>
      <?php
        $thumbnailId = get_post_thumbnail_id($thePost);
        $image = wp_get_attachment_url($thumbnailId, 'thumbnail');
        $link = get_permalink($thePost);
        $postDate = date_format(date_create($thePost->post_date),"d/m/Y");
      ?>
      <a href="<?=$link?>" class="border-b py-4 <?= $key > 2 ? 'flex gap-5 items-center' : '' ?>">
        <img class="object-cover rounded <?= $key > 2 ? 'w-20 h-20' : 'w-full h-40' ?>" src="<?= $image ?>" alt="">
        <div>
          <div class="mt-2 mb-1"><?= $thePost->post_title ?></div>
          <div class="text-gray-500 text-xs" style="color: rgba(6, 34, 65, 0.5);"><?= $postDate ?></div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>