<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Knowledge</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>
<?php
  require_once('custom-classes/class-posts.php');
  $recentPosts = Post::getPostsByCategory('post', null, 12, 0);
  $knowledgePosts = array_filter($recentPosts->posts,function($p){
    return in_array('knowledge', 
      array_map(function($c){return $c->slug;}, $p->categories)
    );
  });
?>
<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full" style="background-color: #262145;">
    <div class="flex flex-col my-8 lg:px-40 px-8">
      <span class="text-xl mb-2 font-thin">คลังความรู้</span>
      <span class="text-5xl font-extrabold">Knowledge</span>
    </div>
    <div class="border-t border-gray-500 lg:px-32 lg:mx-8 px-8 py-5 flex lg:justify-start justify-center gap-4">
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
    </div>
    <div class="bg-white">
      <div class="lg:px-8 px-4 grid lg:grid-cols-3 gap-x-4 gap-y-10 py-10" style="color: #062241;">
        <?php  foreach($knowledgePosts as $thePost):?>
        <a href="<?= $thePost->link?>" class="flex flex-col gap-4">
          <img class="rounded-lg object-cover w-full object-cover w-full" src="<?= $thePost->featuredImage?>" alt="">
          <div class="font-semibold text-lg"><?= $thePost->title?></div>
          <div class="" style="color: rgba(6, 34, 65, 0.4)"><?= $thePost->date?></div>
        </a>
        <?php endforeach;?>
      </div>
      <div class="bg-white text-center text-xs py-12">
        <button class="rounded-full text-white px-8 py-3 px-28" style="background-color: #262145;">LOAD MORE</button>
      </div>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>