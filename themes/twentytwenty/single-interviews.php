<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interview</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
  <style>
    .interview-cover {
      background: url('<?= get_the_post_thumbnail_url() ?>') no-repeat;
      background-size: auto 100%;
      background-position: center;
      height: 80vh
    }

    @media (min-width: 1024px) {
      .interview-cover {
        background-size: 100% auto;
        height: 80vh
      }
    }
  </style>

</head>
<?php
$footerbgcolor = '#19181F';
require_once('custom-classes/class-posts.php');
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;background-color: #19181F;" class="text-white w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="w-full">
    <div class="relative interview-cover">
      <div class="absolute bottom-0 w-full block lg:flex justify-center lg:px-0 px-6 py-6">
        <div class="flex lg:flex-row flex-col lg:items-center lg:justify-between lg:border-t border-white py-4 lg:w-1/2">
          <span class="text-2xl font-medium">Interview</span>
          <div class="flex items-center lg:pt-0 pt-6">
            <?php
              $logo = get_field('intervieweeBusinessLogo');
              if(!empty($logo)) :
            ?>
              <img src="<?= get_field('intervieweeBusinessLogo') ?>" alt="" class="w-12 h-12 rounded-full object-cover">
            <?php else:?>
              <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
            <?php endif;?>
            <div class="flex flex-col ml-2">
              <span><?= get_field('interviewee') ?></span>
              <span><?= get_field('intervieweeBusiness') ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="relative w-full flex flex-col items-center">
    <div class="absolute right-0 hidden lg:flex flex-col mr-8" style="bottom: 50; transform: translate(0 ,50%);">
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5 mt-6" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5 mt-6" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
    </div>
    <div class="lg:w-1/2 lg:px-0 px-5">
      <div class="flex flex-col items-center py-8">
        <p class="lg:text-3xl text-xl text-center break-words">
          <?= get_the_title() ?>
        </p>
        <div class="lg:px-32 lg:mx-8 px-8 py-4 flex lg:justify-start justify-center gap-4">
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
        </div>
      </div>
      <div class="text-sm font-thin leading-8">
        <?= the_content() ?>
      </div>
    </div>
  </section>
  <section class="pt-14 pb-10 px-5 text-white">
    <?php include 'truefriend-interview.php'; ?>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {
    $("#3rdSlider").owlCarousel({
      items: $(window).width() < 1024 ? 1.3 : 4,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 2,
      margin: 20,
      dots: false,
    });
    $(window).resize(function() {
      $("#3rdSlider").trigger('destroy.owl.carousel');
      $("#3rdSlider").owlCarousel({
        items: $(window).width() < 1024 ? 1.3 : 4,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 2,
        margin: 20,
        dots: false,
      });
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>