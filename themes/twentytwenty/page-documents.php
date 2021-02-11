<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

</head>

<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$documentsPosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'documents',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});
echo '<script>console.log("PHP error: ' . $knowledgePosts . '")</script>';
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <style>
    #headder {
      background: transparent;
    }

    .burger-bar,
    .balloon-chat {
      fill: #262145;
    }

    .logo {
      color: #262145;
    }

    #documents {
      background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b.svg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: 100%;
    }

    @media (max-width: 992px) {
      #documents {
        background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b-mobile.svg');
      }
    }
  </style>
  <section id="documents" class="text-white pt-32 w-full flex items-center flex-col" style="background-color: #F2F2F2; color:#262145;">
    <div class="flex text-base md:text-2xl pb-2">
      <div class="font-light pr-2">คลังแสงของคนอยากเปิดร้านอาหาร</div>
    </div>
    <p class="text-xl md:text-6xl font-bold pb-2">Document</p>
    <p class="text-sm md:text-base">รวมข้อมูลต่างๆที่เป็นประโยชน์ในการทำธุรกิจร้านอาหาร</p>
    <div class="flex mt-10 z-20">
      <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
      <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
    </div>

    <div class="flex justify-center flex-wrap w-full md:w-3/4 mt-16 mb-12 grid md:grid-cols-3 gap-y-4 gap-x-8">
      <div class="w-full flex lg:items-center lg:justify-center flex-col lg:h-72 h-40 relative lg:mb-0 mb-4 bg-white rounded-md" style="color:#251D5C">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">สูตรคำนวณ<br class="hidden lg:block" />การใช้วัตถุดิบ</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">สูตรคำนวณการใช้วัตถุดิบให้พอดี<br class="hidden lg:block" />ป้องกันสต็อกขาด สต็อกบวม</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <a href="">Download Excel</a>
          <div class="flex items-center">
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
            <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="w-full flex lg:items-center lg:justify-center flex-col lg:h-72 h-40 relative lg:mb-0 mb-4 bg-white rounded-md" style="color:#251D5C">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">สูตรบริหารต้นทุน</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">สูตรบริหารต้นทุนให้ร้านอาหารทำกำไร</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <a href="">Download Doc</a>
          <div class="flex items-center">
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
            <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="w-full flex lg:items-center lg:justify-center flex-col lg:h-72 h-40 relative lg:mb-0 mb-4 bg-white rounded-md" style="color:#251D5C">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">สูตรหาจุดคุ้มทุน</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">สูตรหาจุดคุ้มทุน<br class="hidden lg:block" />ให้ร้านอาหารทำกำไร (ซักทีเถอะ!)</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <a href="">Download PDF</a>
          <div class="flex items-center">
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
            <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="w-full flex lg:items-center lg:justify-center flex-col lg:h-72 h-40 relative lg:mb-0 mb-4 bg-white rounded-md" style="color:#251D5C">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">สูตรหาจุดคุ้มทุน</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">สูตรหาจุดคุ้มทุน<br class="hidden lg:block" />ให้ร้านอาหารทำกำไร (ซักทีเถอะ!)</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <a href="">Download PDF</a>
          <div class="flex items-center">
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
            <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="w-full flex lg:items-center lg:justify-center flex-col lg:h-72 h-40 relative lg:mb-0 mb-4 bg-white rounded-md" style="color:#251D5C">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">สูตรหาจุดคุ้มทุน</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">สูตรหาจุดคุ้มทุน<br class="hidden lg:block" />ให้ร้านอาหารทำกำไร (ซักทีเถอะ!)</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <a href="">Download PDF</a>
          <div class="flex items-center">
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
            <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="w-full flex lg:items-center lg:justify-center flex-col lg:h-72 h-40 relative lg:mb-0 mb-4 bg-white rounded-md" style="color:#251D5C">
        <div class="lg:text-center px-4 pt-4 lg:pb-10">
          <h1 class="text-3xl font-black tracking-tighter lg:mb-3 mb-2">สูตรหาจุดคุ้มทุน</h1>
          <h2 class="text-xs lg:text-sm lg:text-center">สูตรหาจุดคุ้มทุน<br class="hidden lg:block" />ให้ร้านอาหารทำกำไร (ซักทีเถอะ!)</h2>
        </div>
        <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
          <a href="">Download PDF</a>
          <div class="flex items-center">
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
            <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
            <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
          </div>
        </div>
      </div>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
      items: $(window).width() < 1024 ? 1.3 : 4,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 2,
      margin: 16,
      dots: false,
    });
  });
</script>