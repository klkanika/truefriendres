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
<section class="flex items-center justify-center font-bold text-2xl h-48 " id="banner-1" style="background-color:#F2F2F2;color:#062241;">
  <?php if($adsPosts && $adsPostCount > 0) {?>
      <a href="<?= $adsPosts[$randomAds]->adsLink ?>" target="_blank">
      <img class="hidden md:flex w-full h-48 object-cover" src="<?=  $adsPosts[$randomAds]->adsImage ?>" alt="">
      <img class="md:hidden w-full h-48 object-cover" src="<?=  $adsPosts[$randomAds]->adsMobileImage ?>" alt="">
      </a>
  <?php } ?>
</section>