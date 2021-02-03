<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interview</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>
<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$knowledgePosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'knowledge',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;background-color: #19181F;" class="text-white w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="w-full pt-16">
    <div class="relative interview-cover">
      <div class="absolute bottom-0 w-full lg:px-40 px-8 lg:w-1/2 lg:pb-16">
        <div class="mb-16">
          <p class="text-xl">สัมภาษณ์</p>
          <p class="text-5xl font-bold mt-2">Interview</p>
        </div>
        <div>
          <p class="border-b border-white pb-4 text-xl font-light">ล่าสุด</p>
          <div class="flex items-center py-4">
            <img src="<?= get_theme_file_uri() ?>/assets/images/interview-cover.png" alt="" class="w-10 h-10 rounded-full">
            <p class="ml-2">Potato corner</p>
          </div>
          <p class="text-2xl">ความสำเร็จของ "Potato Corner" จนต่อคิวซื้อเฟรนช์ฟรายส์</p>
        </div>
      </div>
    </div>
  </section>
  <section class="grid lg:grid-cols-4 grid-cols-1 lg:px-5 px-4 gap-5 pb-12 pt-16">
    <?php
    foreach ([0, 0, 0, 0, 0, 0, 0, 0] as $item) {
    ?>
      <div class="relative cursor-pointer" onclick="window.open('#','_blank')">
        <div class="interview-card">
          <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/interview-cover.png" />
        </div>
        <div class="absolute top-3 left-3" style="width:45px;height:45px;">
          <img class="object-cover w-full h-full rounded-full" src="<?= get_theme_file_uri() ?>/assets/images/interview-cover.png" />
        </div>
        <div class="absolute left-0 bottom-0" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6));">
          <div class="ml-6 mb-6 mr-6">
            <p class="font-bold text-white text-base mb-2">Potato Corner</p>
            <p class="text-white text-base">Title</p>
          </div>
        </div>
      </div>
    <?php
    }
    ?>


  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<style>
  .interview-card {
    height: 80vh;
  }

  .interview-cover {
    background: url('<?= get_theme_file_uri() ?>/assets/images/interview-page-cover.png') no-repeat;
    background-size: auto 100%;
    background-position: top right;
    height: 80vh
  }

  @media (min-width: 1024px) {
    .interview-cover {
      background-size: 100% auto;
      background-position: top right;
      height: 80vh
    }

    .interview-card {
      height: 60vh;
    }
  }
</style>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>