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
$supplier = Post::getPostsByCategory('suppliers', null, 1, 0, null);
$restaurant = Post::getPostsByCategory('restaurants', null, 1, 0, null);
$franchise = Post::getPostsByCategory('franchises', null, 1, 0, null);
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full flex items-center flex-col" style="background-color:#f2f2f2;color:#262145;">
    <h2 class="text-2xl mb-4">คลังแสงของคนอยากเปิดร้านอาหาร</h2>
    <h1 class="text-6xl font-black tracking-tighter mb-6">Infohub</h1>
    <h3 class="text-base">รวมข้อมูลต่างๆที่เป็นประโยชน์ในการทำธุรกิจร้านอาหาร</h3>
    <div class="flex justify-center w-full mt-16 mb-12">
      <a href="#" class="w-1/5 flex items-center justify-center flex-col h-72 relative ml-2 mr-2 rounded-md" style="background-color:#FFD950">
        <h1 class="text-3xl font-black tracking-tighter mb-3">Supplier</h1>
        <h2 class="text-sm text-center">รวมข้อมูล Supplier ทั่วประเทศไทย <br />กว่า 600 บริษัทในประเทศไทย</h2>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <p>ดูข้อมูล</p>
          <div class="flex items-center"><?= $supplier->posts_count ?>+ <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right-blue.svg" alt="" /></div>
        </div>
      </a>
      <a href="#" class="w-1/5 flex items-center justify-center flex-col h-72 relative text-white ml-2 mr-2 rounded-md" style="background-color:#262145">
        <h1 class="text-3xl font-black tracking-tighter mb-3">Restaurant</h1>
        <h2 class="text-sm text-center">รวมข้อมูลร้านอาหารต่างๆ<br />กว่า 600 ธุรกิจในประเทศไทย</h2>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <p>ดูข้อมูล</p>
          <div class="flex items-center"><?= $restaurant->posts_count ?>+ <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" alt="" /></div>
        </div>
      </a>
      <a href="#" class="w-1/5 flex items-center justify-center flex-col h-72 relative bg-white ml-2 mr-2 rounded-md" style="color:#251D5C">
        <h1 class="text-3xl font-black tracking-tighter mb-3">Franchise</h1>
        <h2 class="text-sm text-center">ศูนย์รวมข้อมูลเฟรนชายกว่า<br />600 เฟรนชายในประเทศไทย</h2>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <p>ดูข้อมูล</p>
          <div class="flex items-center"><?= $franchise->posts_count ?>+ <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right-blue.svg" alt="" /></div>
        </div>
      </a>
    </div>
    <div class="flex items-center justify-center flex-wrap gap-4 mb-6">
      <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt="" /></a>
      <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt="" /></a>
      <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt="" /></a>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>