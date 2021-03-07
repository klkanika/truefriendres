<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
</head>

<?php
$success = $_GET['success'];
if (isset($success)) {
  echo '<script>alert("สมัครเรียบร้อยแล้ว สนใจคอร์สเรียนอื่นเพิ่มเติม... บลาๆ (เดี๋ยวตรงนี้ใส่เป็น snackbar)")</script>';
}
$onlineClient = get_field('online_course_client', get_the_ID());
$offlineClient = get_field('offline_course_client', get_the_ID());

require_once('custom-classes/class-posts.php');
$onlineTermId = get_term_by('name', 'online', 'course_type')->term_id;
$offlineTermId = get_term_by('name', 'offline', 'course_type')->term_id;
$allPosts = Post::getPostsByCategory('courses', null, 20, 0, null);
$onlinePosts = Post::getPostsByCategory('courses', $onlineTermId, null, 0, null);
$offlinePosts = Post::getPostsByCategory('courses', $offlineTermId, null, 0, null);

$coursesPosts = [
  "บริหารร้านอาหารให้โตแบบก้าวกระโดด", "บัญชีอย่างง่ายเพื่อเจ้าของกิจการ", "บริหารร้านอาหารให้โตแบบก้าวกระโดด", "บัญชีอย่างง่ายเพื่อเจ้าของกิจการ"
]
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full bg-contain" style="background-color: #262145;background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-grid.svg')">
    <div class="flex flex-col my-8 lg:px-40 px-8">
      <span class="text-lg md:text-xl text-center mb-2 font-thin">คอร์สเรียนของเรา</span>
      <span class="text-3xl md:text-5xl text-center font-extrabold">Our Courses</span>
    </div>
    <img class="w-36 my-8 mx-auto" src="<?= get_theme_file_uri() ?>/assets/images/courses-img.svg" alt="">
    <div class="flex flex-col lg:px-40 px-8">
      <span class="text-sm md:text-xl text-center mb-2 font-normal">
        นอกจากการเป็นคลังความรู้สำหรับธุรกิจร้านอาหารแล้ว
        <br>เรายังมีบริการอื่นๆเพื่อช่วยผู้ประกอบการไปถึงฝั่งฝัน
      </span>
    </div>
    <div class="button border-gray-500 lg:px-32 lg:mx-8 px-8 py-5 pb-14  flex lg:justify-content-center justify-center gap-1">
      <a href="<?= get_permalink(get_page_by_path('courses-register')) ?>" class="rounded-full text-black font-bold py-3 px-16" style="background-color: #FEDA52;">Register</a>
    </div>
    </div>
  </section>

  <!-- Lastest Courses -->
  <section id="lastestCourses" class="pt-8" style="color:#062241;">
    <div class="md:pl-8 pl-4 md:mb-4 mb-8">
      <p class="font-bold text-2xl">คอร์สเรียนล่าสุด</p>
    </div>

    <div class="swiper-container lastestCoursesSlider w-full">
      <div class="swiper-wrapper md:pl-8 pl-4 pb-16">
        <!-- Slides -->
        <?php foreach ($allPosts->posts as $i => $thePost) : ?>
          <a href="<?= $thePost->link ?>" class="swiper-slide rounded-xl overflow-hidden banner-slide cursor-pointer" style="background-color:#262145;">
            <img class="object-cover w-full h-full rounded-xl opacity-50" src="<?= $thePost->featuredImage ?>" />
            <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-white text-xs font-bold">รายละเอียดคอร์ส</div>
            <div class="absolute top-5 left-5" style="width: 40px;"></div>
            <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0 text-white">
              <p class="lg:text-xs text-xs mb-1"><?= ($thePost->terms)[0]->name ?></p>
              <p class="lg:text-lg text-xs font-bold"><?= $thePost->ชื่อ ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

  </section>
  <!-- Offine course -->
  <section class="pt-6 md:pt-20" style="background-color: #E5E5E5;color:#262145">
    <div class="md:flex md:pl-20 pb-16">
      <div class="md:w-2/4">
        <p class="px-6 md:px-0 lg:text-left text-4xl font-bold">Offine course</p>
        <div class="px-6 md:px-0 my-12">
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-base md:text-xl font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
          </div>
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-base md:text-xl font-bold">ลงมือทำจริง</span>
          </div>
          <div class="flex mb-3 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-base md:text-xl font-bold">เห็นผลใน 1 เดือน</span>
          </div>
        </div>

        <!--Slider-->
        <div class="md:hidden swiper-container offlinePicSlider w-full ml-6 mb-16">
          <div class="swiper-wrapper pl-4">
            <!-- Slides -->
            <?php foreach (["/assets/images/courses-offline-01.png", "/assets/images/courses-offline-02.png", "/assets/images/courses-offline-03.png", "/assets/images/courses-offline-04.png"] as $thePost) : ?>
              <div class="swiper-slide rounded-xl overflow-hidden banner-slide cursor-pointer" style="background-color:#262145;">
                <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?><?= $thePost ?>" />
                <div class="absolute top-5 left-5" style="width: 40px;"></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="px-6 md:px-0 mb-16">
          <p class="text-sm md:text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-sm md:text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <?php if (!empty($offlineClient)) : ?>
          <div class="px-6 md:px-0">
            <div class="font-bold mb-4">Our Client</div>
            <div class="flex">
              <?php foreach ($offlineClient as $key => $thePost) : ?>
                <?php $margin = 0.5 * -1 * $key; ?>
                <div class="tooltip" style="margin-left: <?= $margin . "rem;" ?>">
                  <?php if (!empty($thePost['icon_image'])) : ?>
                    <img class="w-12 h-12 object-cover rounded-full" src="<?= $thePost['icon_image'] ?>" />
                  <?php else : ?>
                    <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
                  <?php endif; ?>
                  <div class="tooltiptext">
                    <div class="flex items-center mb-4">
                      <?php if (!empty($thePost['customer_image'])) : ?>
                        <img src="<?= $thePost['customer_image'] ?>" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                      <?php else : ?>
                        <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
                      <?php endif; ?>
                      <div class="ml-4">
                        <div><?= $thePost['customer_name'] ?></div>
                        <div class="font-bold"><?= $thePost['brand_name'] ?></div>
                      </div>
                    </div>
                    <p><?= $thePost['review'] ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="px-6 md:px-0 w-2/4 hidden md:flex items-center justify-center">
        <img src="<?= get_theme_file_uri() ?>/assets/images/courses-offline.png" />
      </div>
    </div>

    <div class="swiper-container offlineCoursesSlider w-full">
      <div class="swiper-wrapper pl-6 md:pl-20 pb-16">
        <!-- Slides -->
        <?php foreach ($offlinePosts->posts as $i => $thePost) : ?>
          <a href="<?= $thePost->link ?>" class="swiper-slide rounded-xl overflow-hidden banner-slide cursor-pointer bg-gray-300">
            <img class="object-cover w-full h-full rounded-xl opacity-30" src="<?= $thePost->featuredImage ?>" />
            <div class="border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-xs font-bold" style="border-color:#262145;">รายละเอียดคอร์ส</div>
            <div class="absolute top-5 left-5" style="width: 40px;"></div>
            <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0">
              <p class="lg:text-xs text-xs mb-1"><?= ($thePost->terms)[0]->name ?></p>
              <p class="lg:text-lg text-xs font-bold"><?= $thePost->ชื่อ ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

  </section>

  <!-- Online Course -->
  <section class="pt-6 md:pt-20" style="background-color: #262145;color:#fff">
    <div class="md:pl-20 pr-6 md:pr-0 md:flex pb-16">
      <div class="md:w-2/4">
        <p class="px-6 md:px-0 lg:text-left text-4xl font-bold">Online Course</p>
        <div class="px-6 md:px-0 my-12">
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-base md:text-xl font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
          </div>
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-base md:text-xl font-bold">ลงมือทำจริง</span>
          </div>
          <div class="flex mb-3 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-base md:text-xl font-bold">เห็นผลใน 1 เดือน</span>
          </div>
        </div>
        <div class="md:hidden items-center justify-center -mx-6 mb-6">
          <img src="<?= get_theme_file_uri() ?>/assets/images/courses-online.png" />
        </div>
        <div class="px-6 md:px-0 mb-16">
          <p class="text-sm md:text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-sm md:text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <?php if (!empty($onlineClient)) : ?>
          <div class="px-6 md:px-0">
            <div class="font-bold mb-4">Our Client</div>
            <div class="flex">
              <?php foreach ($onlineClient as $key => $thePost) : ?>
                <?php $margin = 0.5 * -1 * $key; ?>
                <div class="tooltip" style="margin-left: <?= $margin . "rem;" ?>">
                  <?php if (!empty($thePost['icon_image'])) : ?>
                    <img class="w-12 h-12 object-cover rounded-full" src="<?= $thePost['icon_image'] ?>" />
                  <?php else : ?>
                    <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
                  <?php endif; ?>
                  <div class="tooltiptext">
                    <div class="flex items-center mb-4">
                      <?php if (!empty($thePost['customer_image'])) : ?>
                        <img src="<?= $thePost['customer_image'] ?>" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                      <?php else : ?>
                        <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
                      <?php endif; ?>
                      <div class="ml-4">
                        <div><?= $thePost['customer_name'] ?></div>
                        <div class="font-bold"><?= $thePost['brand_name'] ?></div>
                      </div>
                    </div>
                    <p><?= $thePost['review'] ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="w-2/4 hidden md:flex items-center justify-center pl-16">
        <img src="<?= get_theme_file_uri() ?>/assets/images/courses-online.png" />
      </div>
    </div>

    <div class="swiper-container onlineCoursesSlider w-full" style="color:#262145;">
      <div class="swiper-wrapper pl-6 md:pl-20 pb-16">
        <!-- Slides -->
        <?php foreach ($onlinePosts->posts as $i => $thePost) : ?>
          <a href="<?= $thePost->link ?>" class="swiper-slide rounded-xl overflow-hidden banner-slide cursor-pointer bg-gray-300">
            <img class="object-cover w-full h-full rounded-xl opacity-50" src="<?= $thePost->featuredImage ?>" />
            <div class="border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-xs font-bold" style="border-color:#262145;">รายละเอียดคอร์ส</div>
            <div class="absolute top-5 left-5" style="width: 40px;"></div>
            <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0">
              <p class="lg:text-xs text-xs mb-1"><?= ($thePost->terms)[0]->name ?></p>
              <p class="lg:text-lg text-xs font-bold"><?= $thePost->ชื่อ ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Free Seminar -->
  <section class="py-20 flex items-center justify-center" style="background-color: #D4BD7D;color:#262145;">
    <div class="hidden md:flex" style="background-color: #D4BD7D;color:#262145;">
      <img class="object-cover" src="<?= get_theme_file_uri() ?>/assets/images/courses-free-seminar.svg" />
      <div class="absolute pt-12 pl-8 pr-16" style="width: 577px;height:691px;">
        <p class="lg:text-left text-4xl font-bold pt-2">Free Seminar</p>
        <div class="my-6">
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
            <span class="ml-4 text-xl font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
          </div>
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
            <span class="ml-4 text-xl font-bold">ลงมือทำจริง</span>
          </div>
          <div class="flex mb-3 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
            <span class="ml-4 text-xl font-bold">เห็นผลใน 1 เดือน</span>
          </div>
        </div>
        <div class="mb-8">
          <p class="text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <div>
          <a href="<?= get_permalink(get_page_by_path('courses-register')) ?>" class="inline-block rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</a>
        </div>
      </div>
    </div>
    <div class="md:hidden p-6">
      <p class="lg:text-left text-4xl font-bold">Free Seminar</p>
      <div class="my-6">
        <div class="flex mb-2 items-center">
          <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
          <span class="ml-4 text-base md:text-xl font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
        </div>
        <div class="flex mb-2 items-center">
          <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
          <span class="ml-4 text-base md:text-xl font-bold">ลงมือทำจริง</span>
        </div>
        <div class="flex mb-3 items-center">
          <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
          <span class="ml-4 text-base md:text-xl font-bold">เห็นผลใน 1 เดือน</span>
        </div>
      </div>
      <div class="mb-10">
        <p class="text-sm md:text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
        <p class="text-sm md:text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
      </div>
      <div>
        <a href="<?= get_permalink(get_page_by_path('courses-register')) ?>" class="inline-block rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</a>
      </div>
    </div>
  </section>



  <?php include 'truefriend-footer.php'; ?>


</body>
<style>
  .tooltip {
    position: relative;
    display: inline-block;
  }

  .tooltip .tooltiptext {
    visibility: hidden;
    width: 250px;
    background-color: #fff;
    border-radius: 6px;
    padding: 15px;
    position: absolute;
    z-index: 1;
    bottom: -10%;
    left: 110%;
    box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.15);
    color: #262145;
  }

  .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 10%;
    right: 99%;
    border-width: 15px;
    border-style: solid;
    border-color: transparent #fff transparent transparent;
  }

  .tooltip:hover .tooltiptext {
    visibility: visible;
  }

  .banner-slide {
    width: 40%;
    height: 18rem;
    background-color: #C4C4C4;
  }

  .swiper-container {
    padding: "auto";
  }

  @media (max-width:992px) {
    .banner-slide {
      height: 12rem;
      width: 80%;
    }
  }
</style>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    var lastestCoursesSlider = new Swiper('.lastestCoursesSlider', {
      slidesPerView: 'auto',
      spaceBetween: 15,
    });

    var offlinePicSlider = new Swiper('.offlinePicSlider', {
      slidesPerView: 'auto',
      spaceBetween: 15,
    });

    var offlineCoursesSlider = new Swiper('.offlineCoursesSlider', {
      slidesPerView: 'auto',
      spaceBetween: 15,
    });

    var onlineCoursesSlider = new Swiper('.onlineCoursesSlider', {
      slidesPerView: 'auto',
      spaceBetween: 15,
    });

  });
</script>