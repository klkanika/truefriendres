<?php
$defaultImage = get_theme_file_uri() . "/assets/images/img-default.jpg";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= the_title() ?></title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
</head>

<body class="w-full">
  <?php
  $currentPostId = $post->ID;
  include 'truefriend-header.php';
  require_once('custom-classes/class-posts.php');
  $categories = get_the_category();
  $cat_ID = [];
  foreach ($categories as $category) :
    array_push($cat_ID, $category->cat_ID);
  endforeach;
  $thisLink = get_permalink();

  ?>
  <style>
    #headder {
      background: #262145;
    }

    .noImg {
      background-color: #D3D3D3 !important;
      width: 150px !important;
      height: 150px !important;
    }
  </style>
  <!-- Set up your HTML -->
  <section class="relative w-full">
    <div class="lg:pl-12 pl-4 lg:pr-12 pr-4 lg:pb-10 pb-6 pt-28 text-center" style="background-color: #262145;">
      <div class="flex flex-wrap justify-center mb-6">
        <?php
        foreach (get_the_category() as $category) : ?>
          <a href="<?= get_category_link($category->cat_ID) ?>" class="select-none rounded-full text-center lg:w-44 w-32 p-2 m-1 lg:text-base text-sm" style="color:#262145;background-color:#FEDA52;"><?= $category->cat_name ?></a>
        <?php endforeach; ?>
      </div>
      <div class="text-white lg:text-3xl text-xl mx-auto"><?= the_title() ?></div>
      <div class="flex justify-center mt-2">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($thisLink) ?>" class="mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode($thisLink) ?>" class="mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
        <div copytoclipboard="<?= $thisLink ?>" class="btn-copytoclipboard mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></div>
      </div>
    </div>
    <?php

    var_dump(get_the_post_thumbnail_url());
    var_dump(@getimagesize(get_the_post_thumbnail_url()));
    if (!empty(get_the_post_thumbnail_url())) :
      $image = $defaultImage;
      if (@getimagesize(get_the_post_thumbnail_url())) {
        $image = get_the_post_thumbnail_url();
      }
    ?>
      <div class="relative">
        <img class="object-cover w-full h-full" src="<?= $image ?>" />
      </div>
    <?php endif ?>
  </section>
  <!-- overflow-hidden max-h-screen -->
  <section class="w-full lg:p-20 px-4 py-8 relative max-h-screen overflow-hidden" style="color: #062241;" id="content-section">
    <div class="flex lg:flex-row flex-col lg:gap-10">
      <div class="lg:w-3/4 flex-1 text-base flex flex-col gap-4"><?= the_content() ?></div>
      <div class="lg:w-1/4 flex flex-col gap-8 lg:mt-0 mt-16 lg:block hidden">
        <?php include 'truefriend-sponsored.php'; ?>
      </div>
    </div>
    <div class="bg-white text-center text-xs p-24 absolute bottom-0 left-1/2 w-full" id="pop-section" style="transform:translate(-50%,0%);background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #FFFFFF 40%);">
      <button class="rounded-full text-white py-3 lg:px-28 px-14" style="background-color: #262145;" id="readnext">READ NEXT</button>
    </div>
  </section>

  <div class="w-full flex lg:flex-row flex-col lg:px-20 px-8 py-10 justify-between items-center" style="background-color: #F2F2F2; color: #062241;">
    <span class="text-xl">Share this article</span>
    <div class="flex items-center justify-center flex-wrap gap-4 lg:pr-20 lg:mt-0 mt-8">
      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($thisLink) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
      <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode($thisLink) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
      <div class="relative bg-white rounded-full w-80 pl-4 pr-12 py-3 shadow-lg overflow-hidden">
        <img copytoclipboard="<?= $thisLink ?>" class="btn-copytoclipboard w-6 h-6 absolute right-0 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt="" onclick="copyToClipboard('<?= the_permalink(); ?>')">
        <div class="truncate"><?= $thisLink ?></div>
      </div>
    </div>
  </div>
  <section class="bg-white lg:pt-20 lg:pb-8 lg:px-0 lg:mx-8 border-b pl-4 py-16 pr-0">
    <div class="flex items-center justify-between mb-4">
      <span class="text-2xl font-semibold">Related Content</span>
      <div class="gap-10 lg:flex hidden">
        <img class="w-2 h-4 cursor-pointer toTheLeft" src="<?= get_theme_file_uri() ?>/assets/images/left.png" referTo="relatedSlider" />
        <img class="w-2 h-4 cursor-pointer toTheRight" src="<?= get_theme_file_uri() ?>/assets/images/right.png" referTo="relatedSlider" />
      </div>
    </div>
    <!-- grid grid-cols-3 gap-4  -->
    <div id="relatedSlider" class="owl-carousel">
      <?php
      $related = Post::getPostsByCategory('post', $categories[0]->cat_ID, null, 0, [$currentPostId]);
      if ($related) foreach ($related->posts as $key => $category) :
        $image = $defaultImage;
        if (@getimagesize($category->featuredImage)) {
          $image = $category->featuredImage;
        }
      ?>
        <a href="<?= $category->link ?>" class="block">
          <div style="height:250px;" class="mb-2">
            <img class="object-cover w-full h-full rounded" src="<?= $image ?>" />
          </div>
          <span class="text-sm"><?= $category->title ?></span>
        </a>
      <?php endforeach;
      wp_reset_postdata(); ?>
    </div>
  </section>
  <?php include 'truefriend-restaurant101.php'; ?>
  <div class="lg:hidden py-8 px-4">
    <?php include 'truefriend-sponsored.php'; ?>
  </div>
  <!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script type="text/javascript">
    const copyToClipboard = str => {
      const el = document.createElement('textarea');
      el.value = str;
      document.body.appendChild(el);
      el.select();
      document.execCommand('copy');
      document.body.removeChild(el);
    };

    $(document).ready(function() {
      $("img").on("error", function() {
        $(this).addClass('noImg');
      });

      $("#relatedSlider").owlCarousel({
        items: $(window).width() < 1024 ? 1.3 : 3,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 2,
        margin: 20,
        dots: false,
      });
      $(".toTheLeft").click(function() {
        let carousel = $(this).attr('referTo')
        $(`#${carousel}`).trigger('prev.owl.carousel');
      });

      $(".toTheRight").click(function() {
        let carousel = $(this).attr('referTo')
        $(`#${carousel}`).trigger('next.owl.carousel');
      });

      $(".tab-button").click(function() {
        $(".tab-button").removeClass('tab-button-active')
        $(this).addClass('tab-button-active')
      })

      $("#readnext").click(() => {
        $("#content-section").removeClass("overflow-hidden")
        $("#content-section").removeClass("max-h-screen")
        $("#pop-section").remove()
      })
    })
  </script>
  <?php
  $footerbgcolor = '#262145';
  $footercolor = 'white';
  $footerheadercolor = 'rgba(255,255,255,0.5)';
  $footerlogo = get_theme_file_uri() . '/assets/images/logo-white.svg';
  ?>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>