<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Knowledge</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <style>
    .grid-line {
      width: 33.33%;
    }

    @media (min-width: 1024px) {
      .grid-line {
        width: 14.285%
      }
    }
  </style>
</head>
<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0);
$knowledgePosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'knowledge',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white w-full" style="background-color: #262145;" id="banner">
    <section class="w-full relative overflow-hidden" id="banner">
      <!-- bg of banner -->
      <div class="w-full h-full flex flex-row absolute flex-wrap">
        <div class="w-full h-1/3 flex flex-column">
          <div class="h-full border-white border opacity-20 border-r-0 border-l-0 border-b-0 border-t-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
        </div>
        <div class="w-full h-1/3 flex flex-column">
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-l-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
        </div>
        <div class="w-full h-1/3 flex flex-column">
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-l-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
        </div>
      </div>
      <section class="flex items-center justify-center flex-col w-full pt-32" id="banner-wording">
        <h1 class="text-xl z-20">บทความที่ทุกร้านอาหารต้องอ่าน</h1>
        <h1 class="text-5xl font-black mt-3 z-20">Restaurant 101</h1>
        <img class="z-20" src="<?= get_theme_file_uri() ?>/assets/images/restaurant-101.svg" />
        <h2 class="z-20 text-base">นอกจากการเป็นคลังความรู้สำหรับธุรกิจร้านอาหารแล้ว <br /> เรายังมีบริการอื่นๆเพื่อช่วยผู้ประกอบการไปถึงฝั่งฝัน</h2>
        <div class="flex mt-10 z-20">
          <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
          <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
        </div>
      </section>
    </section>
    <section class="w-full lg:px-8 px-4 flex flex-row flex-wrap mt-16" id="card-list">
      <?php
      for ($i = 0; $i < 10; $i++) {
      ?>
        <div class="rounded-3xl p-6 mb-6" style="border:1px solid rgba(255,255,255,0.2);<?= wp_is_mobile() ? 'width:100%;' : 'width:49%;' ?><?= $i % 2 === 0 ? 'margin-right:1%' : 'margin-left:1%' ?>">
          <div class="w-full relative flex items-center h-48 lg:h-64">
            <div class="bg-center bg-contain bg-no-repeat h-36 lg:h-48 w-full" style="background-image:url('<?= get_theme_file_uri() ?>/assets/images/101-example.svg')"></div>
            <img class="absolute left-0 top-0" src="<?= get_theme_file_uri() ?>/assets/images/101.svg" />
            <div class="select-none cursor-pointer rounded-xl lg:px-8 lg:py-3 px-4 py-2 border-white border text-center absolute right-0 top-0 text-xs lg:text-base">อ่านต่อ</div>
            <div class="absolute left-0 bottom-0">
              <p class="text-xs">ทั่วไป</p>
              <p class="lg:text-base text-sm mt-2">ทำไมร้านอาหาร SME ส่วนใหญ่ ตั้งราคาขายผิด จน ขาดทุน</p>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </section>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>