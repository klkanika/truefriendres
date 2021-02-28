<?php
$currentPostId = $post->ID;
$currentPost = get_post($currentPostId);
$adsObjects = Post::getPostsByCategory('advertisement', null, null, 0, null);
$adsPosts = array_values(array_filter($adsObjects->posts, function ($p) {
  return in_array(
    is_front_page() ? 'Home' : 'Franchise hub',
    array_map(function ($c) {
      return $c;
    }, $p->adsDisplayAt)
  );
}));
$adsPostCount = count($adsPosts);
$randomAds = rand(0, ($adsPostCount-1)); 
?>
<div class="w-full h-36 bg-gray-300 flex items-center justify-center rounded-lg	mt-6">
  <?php if($adsPosts && $adsPostCount > 0) {?>
    <a href="<?= $adsPosts[$randomAds]->adsLink ?>" target="_blank">
    <img class="hidden md:flex w-full h-36 object-cover rounded-lg" src="<?=  $adsPosts[$randomAds]->adsImage ?>" alt="">
    <img class="md:hidden w-full h-36 object-cover rounded-lg" src="<?=  $adsPosts[$randomAds]->adsMobileImage ?>" alt="">
    </a>
  <?php } ?>
</div>
