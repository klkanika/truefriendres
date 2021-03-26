
<?php 
	$defaultImage = get_theme_file_uri()."/assets/images/img-default.jpg";
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
      width: 250px !important;
      height: 250px !important;
    }
    
    .content_font {
      font-family:sans-serif;
      line-height:2.5rem;
      font-weight:100;
      letter-spacing:0.01em;
    }
  </style>
  <!-- Set up your HTML -->
  <section class="relative w-full text-en">
    <div class="lg:pl-12 pl-4 lg:pr-12 pr-4 lg:pb-10 pb-6 pt-28 text-center" style="background-color: #262145;">
      <div class="text-white lg:text-3xl text-xl mx-auto"><?= the_title() ?></div>
      <div class="flex justify-center mt-2">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($thisLink) ?>" class="mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode($thisLink) ?>" class="mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
        <div copytoclipboard="<?= $thisLink ?>" class="btn-copytoclipboard mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></div>
      </div>
      <div class="flex flex-wrap justify-center pt-6">
        <?php 
        foreach (get_the_category() as $category) : ?>
          <a href="<?= get_category_link( $category->cat_ID ) ?>" class="select-none rounded-full text-center w-auto py-2 px-8 m-1 lg:text-base text-sm" style="color:#262145;background-color:#FEDA52;"><?= $category->cat_name ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php if (!empty(get_the_post_thumbnail_url())) : ?>
      <div class="relative">
        <img class="object-cover w-full h-full" src="<?= get_the_post_thumbnail_url() ?>" onerror="this.src='<?= $defaultImage ?>'"/>
      </div>
    <?php endif ?>
  </section>
  <!-- overflow-hidden max-h-screen -->
  <section class="lg:flex w-full lg:p-20 px-4 py-8 relative content_font" style="color: #062241;max-width:1366px;" >
    <div class="flex w-full" id="content-main">
      <div class="w-full lg:w-3/4 lg:mr-4 relative overflow-hidden" id="content-section">
        <div>
          <?= the_content() ?>
        </div>
        <div class="bg-white text-center text-xs lg:p-24 absolute bottom-0 left-1/2 w-full light_theme" id="pop-section" style="transform:translate(-50%,0%);background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #FFFFFF 40%);">
          <button class="rounded-full text-white py-3 lg:px-28 px-14 text-en button_ghost hover:text-black" style="background-color: #262145;padding-left: 7rem!important;padding-right: 7rem!important;border-radius: 9999px!important;padding-top: .75rem!important;padding-bottom: .75rem!important;" id="readnext">READ NEXT</button>
        </div>
      </div>
      <div class="lg:w-1/4 flex lg:mt-0 mt-16 lg:block hidden">
        <div id="sponsored-section">
          <?php include 'truefriend-sponsored.php'; ?>
        </div>
      </div>
    </div>
  </section>

  <!--Share-->
  <div class="w-full lg:px-20 px-8 py-10 text-en" style="background-color: #F2F2F2; color: #062241;">
    <div class="bro-max-width justify-between items-center flex lg:flex-row flex-col">
      <span class="text-xl">Share this article</span>
      <div class="flex items-center justify-center flex-wrap gap-4 lg:mt-0 mt-8">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($thisLink) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode($thisLink) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
        <div class="relative bg-white rounded-full w-80 pl-4 pr-12 py-3 shadow-lg overflow-hidden">
          <img copytoclipboard="<?= $thisLink ?>" class="btn-copytoclipboard w-6 h-6 absolute right-0 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt="" onclick="copyToClipboard('<?= the_permalink(); ?>')">
          <div class="truncate"><?= $thisLink ?></div>
        </div>
      </div>
    </div>
  </div>
  
  <!--Related-->
  <?php
  $related = Post::getPostsByCategory('post', $categories[0]->cat_ID, null, 0, [$currentPostId]);
  ?>
  <?php if (!empty($related->posts_count)) : ?>
      <section class="overflow-hidden bg-white border-b">
          <div class="bro-max-width light_theme carousel-overflow">
              <section id="section-2ndSlider" class="pt-10 pb-20 " style="color:#062241">
                  <div class="mb-5 mt-10 flex justify-between">
                      <p style="letter-spacing:-0.1rem;" class="font-semibold text-4xl text-en">Related Content</p>
                      <!-- 2nd navigator -->
                      <div class="items-center justify-between  hidden lg:flex">
                          <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-left-blue.svg" referTo="relatedSlider" class="cursor-pointer button_ghost toTheLeft" />
                          <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right-blue.svg" referTo="relatedSlider" class="cursor-pointer button_ghost hilight toTheRight ml-2" />
                      </div>
                  </div>
                  <div id="relatedSlider" class="owl-carousel">
                      <?php
                      foreach ($related->posts as $thePost) {
                      ?>
                          <a  href="<?= $thePost->link ?>">
                              <div class="relative button_ghost" style="padding:0!important;">
                                  <div style="height:20rem">
                                      <img class="object-cover w-full h-full rounded" src="<?=  $thePost->featuredImage ?>" onerror="this.src='<?= $defaultImage ?>'" />
                                  </div>
                                  <div class="p-4 pb-6">
                                      <p class="text-sans-serift text-lg leading-relaxed"> <?= $thePost->title ?> </p>
                                      <p style="height:4.5rem;" class="mt-4 opacity-75 font-light overflow-hidden text-sans-serift leading-relaxed"> <?= $thePost->excerpt ?> </p>
                                  </div>
                              </div>
                          </a>
                      <?php
                      }
                      ?>
                  </div>
              </section>
          </div>
      </section>
  <?php endif; ?>
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

      var divHeight = $('#sponsored-section').height();
      if(divHeight > 0){
        $('#content-section').css('max-height', divHeight+'px');
      }else{
        $('#content-section').css('max-height', '100vh');
      }
      
      var parent = $('#content-main'),
      child = parent.children('#content-section');
      if (child.height() > parent.height()) {
          parent.height(child.height());
      }
      $("#readnext").click(() => {
        $("#content-section").removeClass("overflow-hidden")
        $('#content-section').css('max-height', 'none');
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