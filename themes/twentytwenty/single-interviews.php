<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interview</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
</head>
<?php
require_once('custom-classes/class-posts.php');
require_once('custom-classes/class-suppliertypes.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$interviewPosts = Post::getPostsByCategory('interviews', null, 12, 0, null);
// echo "<pre>";
// print_r(Post::getPostBySlug('potato-corner','interviews'));
// exit;
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;background-color: #19181F;" class="text-white w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="w-full">
    <div class="relative interview-cover">
      <div class="absolute bottom-0 w-full block lg:flex justify-center lg:px-0 px-6 py-6" style="background-image: linear-gradient(180deg, rgba(0,0,0,0), rgba(0,0,0,0.3));">
        <div class="flex lg:flex-row flex-col lg:items-center lg:justify-between lg:border-t border-white py-4 lg:w-1/2" >
          <span class="text-2xl font-medium">Interview</span>
          <div class="flex items-center lg:pt-0 pt-6">
            <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-10 h-10 rounded-full">
            <div class="flex flex-col ml-4">
              <span>พีท พัชร</span>
              <span>Potato corner</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="relative w-full flex flex-col items-center">
  <div class="absolute right-0 h-full py-12">
    <div class="sticky top-0 items-end hidden lg:flex flex-col mr-8" style="top:50%">
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5 mt-6" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5 mt-6" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
    </div>
  </div>
    <div class="lg:w-1/2 lg:px-0 px-5">
      <div class="flex flex-col items-center py-8">
        <p class="lg:text-3xl text-xl text-center">
          ความสำเร็จของ "Potato Corner" <br> จนต่อคิวซื้อเฟรนช์ฟรายส์
        </p>
        <div class="lg:px-32 lg:mx-8 px-8 py-4 flex  gap-4">
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
        </div>
      </div>
      <div class="text-sm font-thin leading-8">
        <span>
          “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา
        </span>
        <div class="bg-gray-600 lg:h-96 h-48 lg:-mx-24 flex items-center justify-center my-12 rounded-xl">Video</div>
        <span>
          1 พนักงานมีเพียงพอแล้วหรือยัง :คงเคยเจอ ร้านอาหารบางร้านทำโปรโมชั่นที่แรงมากเช่น “มา 4 จ่าย 3” , “เมนูพิเศษลด 50%” ผลคือได้ลูกค้าเข้าเต็มร้าน แต่พนักงานไม่เพียงพอต่อการให้บริการ จนทำให้เกิดการบริการไม่ทั่วถึงการบริการล่าช้า ทำให้ลูกค้าเกิดความหงุดหงิด และเกิดการ complain บอกต่อในแง่ลบออกไปในโลกออนไลน์ นอกจากลูกค้าจะไม่พอใจแล้ว ผลกระทบอีกด้านคือ อาจทำให้พนักงานที่มีอยู่นั้นเหนื่อยล้ากับการทำงานเกิน เนื่องจากมีพนักงานไม่เพียงพอทำให้แต่ละคน ต้องทำ OT บ้างทำงานควบตำแหน่งบ้าง จนทำให้เกิดความรู้สึกว่าลาออกและหางานใหม่จะดีกว่าก็เป็นได้
        </span>
      </div>
    </div>
  </section>
  <!-- Related Interview -->
  <section class="pt-14 pb-10 md:px-5 text-white">
    <div class="mb-6 flex justify-between lg:px-0 px-4">
        <p class="font-bold text-2xl lg:mb-0 mb-2">Related Interview</p>
        <div class="flex items-center">
            <a href="interviews" target="_blank" class="lg:mr-6 lg:text-base text-xs font-bold">ดูทั้งหมด (<?= $interviewPosts->posts_count ?>)</a>
            <!-- 3rd navigator -->
            <div class="lg:flex items-center justify-between w-16 hidden">
                <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-left.svg" referTo="3rdSlider" class="cursor-pointer toTheLeft" />
                <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" referTo="3rdSlider" class="cursor-pointer toTheRight" />
            </div>
        </div>
    </div>
    <div id="3rdSlider" class="owl-carousel lg:pl-0 pl-4">
        <?php foreach ($interviewPosts->posts as $thePost): ?>
          <div class="relative cursor-pointer" onclick="window.open('<?= $thePost->link ?>','_blank')">
              <div style="height:60vh">
                  <img class="object-cover w-full h-full rounded-xl" src="<?= $thePost->featuredImage ?>" />
              </div>
              <?php if ($thePost->intervieweeBusinessLogo) : ?>
                  <div class="absolute top-3 left-3" style="width:45px;height:45px;">
                      <img class="object-cover w-full h-full rounded-full" src="<?= $thePost->intervieweeBusinessLogo ?>" />
                  </div>
              <?php endif; ?>
              <div class="absolute left-0 bottom-0 w-full rounded-b-xl" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.8));">
                  <div class="ml-6 mb-6 mr-6">
                      <p class="font-bold text-white text-base mb-2"><?= $thePost->intervieweeBusiness ? $thePost->intervieweeBusiness : $thePost->interviewee ?></p>
                      <p class="text-white text-base"><?= $thePost->title ?></p>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<style>
  .interview-cover {
    background: url('<?= get_theme_file_uri() ?>/assets/images/interview-cover.png') no-repeat;
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<script>
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
        $(".toTheLeft").click(function() {
            let carousel = $(this).attr('referTo')
            $('#' + carousel).trigger('prev.owl.carousel');
        });

        $(".toTheRight").click(function() {
            let carousel = $(this).attr('referTo')
            $('#' + carousel).trigger('next.owl.carousel');
        });

        $(".tab-button").click(function() {
            $(".tab-button").removeClass('tab-button-active')
            $(this).addClass('tab-button-active')
        })
    });
</script>