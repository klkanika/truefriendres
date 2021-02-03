<div class="mb-8">
  <div class="border-b pb-2 mb-4 font-semibold tracking-wide">Sponsored by</div>
  <img class="rounded w-full" src="<?= get_theme_file_uri() ?>/assets/images/ads-ex.png" alt="">
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
$postId = $post->ID;
$relatedPosts = Post::getPostsByCategory('post', $cat_ID, 6, 0, [$postId])->posts;
if (count($relatedPosts) < 6) {
  $exceptPostId = [];
  foreach ($relatedPosts as $key => $thePost) :
    array_push($exceptPostId, $thePost->id);
  endforeach;

  $relatedPosts = array_merge($relatedPosts, Post::getPostsByCategory('post', null, 6 - count($relatedPosts), 0, array_merge([$postid], $exceptPostId))->posts);
}
// //set back
$post = get_post($postId);
?>
<div class="mb-8">
  <div class="border-b pb-2 mb-2 font-semibold tracking-wide">Read next</div>
  <div class="flex flex-col">
    <?php foreach ($relatedPosts as $key => $thePost) : ?>
      <a href="<?= $thePost->link ?>" class="border-b py-4 <?= $key > 2 ? 'flex gap-5 items-center' : '' ?>">
        <img class="object-cover rounded <?= $key > 2 ? 'w-20 h-20' : 'w-full h-40' ?> " src="<?= $thePost->featuredImage ?>" alt="">
        <div>
          <div class="mt-2 mb-1"><?= $thePost->title ?></div>
          <div class="text-gray-500 text-xs" style="color: rgba(6, 34, 65, 0.5);"><?= $thePost->numberDate ?></div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>