<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infohub</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>
<?php
require_once('custom-classes/class-posts.php');
$supplier = Post::getPostsByCategory('suppliers', null, 1, 0, null);
$restaurant = Post::getPostsByCategory('restaurants', null, 1, 0, null);
$franchise = Post::getPostsByCategory('franchises', null, 1, 0, null);
?>

<body  class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <style>
    #infohub{
      background-color:#f2f2f2;
      color:#262145;
      background-image: url("<?= get_theme_file_uri() ?>/assets/images/B.svg");
      background-repeat: no-repeat;
      background-position: left center;
      position: relative;
      min-height: 100vh;
    }
    #infohub::after{
      content: '';
      display: block;
      position: absolute;
      width: 100%;
      height: 100%;
      background-image: url("<?= get_theme_file_uri() ?>/assets/images/-B.svg");
      background-repeat: no-repeat;
      background-position: right center;
      top: 0;
      pointer-events: none;
    }
    @media (max-width:992px) {
      #infohub::after{
        display: none;
      }
    }
  </style>
  <section id="infohub" class="text-white pt-40 w-full flex items-center flex-col text-en">
    <h2 class="xs:text-lg md:text-xl mb-4 font-light">คลังแสงของคนอยากเปิดร้านอาหาร</h2>
    <h1 class="text-6xl font-black tracking-tighter mb-6">Infohub</h1>
    <h3 class="xs:text-sm md:text-base">รวมข้อมูลต่างๆที่เป็นประโยชน์ในการทำธุรกิจร้านอาหาร</h3>
    <div class="flex items-center justify-center flex-wrap gap-4 mt-12 lg:hidden">
      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('infohub'))) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
      <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('infohub'))) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
      <div copytoclipboard="<?= get_permalink(get_page_by_path('infohub')) ?>" class="btn-copytoclipboard"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
    </div>
    <div class="flex justify-center flex-wrap w-full mt-16 mb-12">
      <a href="<?= get_site_url() ?>/supplier-hub" class="cursor-pointer lg:w-1/5 w-full flex lg:items-center lg:justify-center flex-col lg:h-64 h-40 relative lg:mb-0 mb-4 lg:ml-2 lg:mr-2 ml-4 mr-4 rounded-md" style="background-color:#FFD950">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">Supplier</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">รวมข้อมูล Supplier ทั่วประเทศไทย <br class="hidden lg:block" />กว่า 600 บริษัทในประเทศไทย</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <p>ดูข้อมูล</p>
          <div class="flex items-center"><?= $supplier->posts_count > 999 ? '999+' : $supplier->posts_count ?>+ <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right-blue.svg" alt="" /></div>
        </div>
      </a>
      <a href="<?= get_site_url() ?>/restaurant-hub" class="cursor-pointer lg:w-1/5 w-full flex lg:items-center lg:justify-center flex-col lg:h-64 h-40 relative lg:mb-0 mb-4 text-white lg:ml-2 lg:mr-2 ml-4 mr-4 rounded-md" style="background-color:#262145">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">Restaurant</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">รวมข้อมูลร้านอาหารต่างๆ<br class="hidden lg:block" />กว่า 600 ธุรกิจในประเทศไทย</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <p>ดูข้อมูล</p>
          <div class="flex items-center"><?= $restaurant->posts_count > 999 ? '999+' : $restaurant->posts_count ?>+ <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" alt="" /></div>
        </div>
      </a>
      <a href="<?= get_site_url() ?>/franchise-hub" class="cursor-pointer lg:w-1/5 w-full flex lg:items-center lg:justify-center flex-col lg:h-64 h-40 relative lg:mb-0 mb-4 bg-white lg:ml-2 lg:mr-2 ml-4 mr-4 rounded-md" style="color:#251D5C">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">Franchise</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">ศูนย์รวมข้อมูลเฟรนชายกว่า<br class="hidden lg:block" />600 เฟรนชายในประเทศไทย</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <p>ดูข้อมูล</p>
          <div class="flex items-center"><?= $franchise->posts_count > 999 ? '999+' : $franchise->posts_count ?>+ <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right-blue.svg" alt="" /></div>
        </div>
      </a>
    </div>
    <div class="flex items-center justify-center flex-wrap gap-4 mb-6 lg:flex hidden">
      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('infohub'))) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
      <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('infohub'))) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
      <div copytoclipboard="<?= get_permalink(get_page_by_path('infohub')) ?>" class="btn-copytoclipboard"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
    </div>
  </section>
  <?php
  $footerbgcolor = '#f2f2f2';
  $footercolor = '#19181F';
  $footerheadercolor = 'rgba(0,0,0,0.5)';
  $footerlogo = get_theme_file_uri() . '/assets/images/logo-blue.svg';
  ?>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>