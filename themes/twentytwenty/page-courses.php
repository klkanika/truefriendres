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

  <style>

  </style>
</head>

<?php
require_once('custom-classes/class-posts.php');
$CoursesPostsObject = Post::getPostsByCategory('post', get_category_by_slug('courses')->cat_ID, 12, 0, null);
$CoursesPosts = $CoursesPostsObject->posts;
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
      <button class="rounded-full text-black font-bold py-3 px-16" style="background-color: #FEDA52;">Register</button>
    </div>
    </div>
  </section>

  <!-- Lastest Courses -->
  <section id="lastestCourses" class="pt-8 lg:pl-8 pl-4 test" style="color:#062241;">
    <div class="lg:mb-4 mb-8 flex justify-between items-center">
      <p class="font-bold text-2xl">คอร์สเรียนล่าสุด</p>
    </div>

    <div id="lastestCoursesSlider" class="owl-carousel pb-16 border-red-900 border-b" style="border-color:#E9E9E9">
      <a href="">
        <div class="relative fourthSliderClass rounded-xl" style="background-color:#262145;">
          <!-- <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/img-default.jpg" /> -->
          <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-white text-xs font-bold">รายละเอียดคอร์ส</div>
          <div class="absolute top-5 left-5" style="width: 40px;"></div>
          <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0 text-white">
            <p class="lg:text-xs text-xs mb-1">online</p>
            <p class="lg:text-lg text-xs font-bold">บริหารร้านอาหารให้โตแบบก้าวกระโดด</p>
          </div>
        </div>
      </a>
      <a href="">
        <div class="relative fourthSliderClass rounded-xl" style="background-color:#262145;">
          <!-- <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/img-default.jpg" /> -->
          <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-white text-xs font-bold">รายละเอียดคอร์ส</div>
          <div class="absolute top-5 left-5" style="width: 40px;"></div>
          <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0 text-white">
            <p class="lg:text-xs text-xs mb-1">online</p>
            <p class="lg:text-lg text-xs font-bold">บัญชีอย่างง่ายเพื่อเจ้าของกิจการ</p>
          </div>
        </div>
      </a>
    </div>
  </section>
  <!-- Offine course -->
  <section class="md:pl-20 pt-20" style="background-color: #E5E5E5;color:#262145">
    <div class="md:flex pb-16">
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
        <div id="offlinePicSlider" class="md:hidden owl-carousel pl-6 md:pl-0 pb-16 border-red-900 border-b" style="border-color:#E9E9E9;color:#262145;">
          <div class="relative fourthSliderClass">
            <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/courses-offline-01.png" />
            <div class="absolute top-5 left-5" style="width: 40px;"></div>
          </div>
          <div class="relative fourthSliderClass">
            <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/courses-offline-02.png" />
            <div class="absolute top-5 left-5" style="width: 40px;"></div>
          </div>
          <div class="relative fourthSliderClass">
            <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/courses-offline-03.png" />
            <div class="absolute top-5 left-5" style="width: 40px;"></div>
          </div>
          <div class="relative fourthSliderClass">
            <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/courses-offline-04.png" />
            <div class="absolute top-5 left-5" style="width: 40px;"></div>
          </div>
        </div>

        <div class="px-6 md:px-0 mb-16">
          <p class="text-sm md:text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-sm md:text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <div class="px-6 md:px-0 mb-8 md:mb-16">
          <div class="font-bold mb-4">Our Client</div>
          <div class="flex">
            <div class="tooltip">
              <img class="w-12 h-12 object-cover" src="<?= get_theme_file_uri() ?>/assets/images/image 7.png" />
              <div class="tooltiptext">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
            </div>
            <div class="tooltip -ml-2">
              <img class="w-12 h-12 object-cover" src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" />
              <div class="tooltiptext">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
            </div>
          </div>
          <div class="md:hidden -mx-6">
            <div class="owl-carousel">
              <div class="slideClient">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
              <div class="slideClient">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="px-6 md:px-0 w-2/4 hidden md:flex items-center justify-center">
        <img src="<?= get_theme_file_uri() ?>/assets/images/courses-offline.png" />
      </div>
    </div>
    <!--Slider-->
    <div id="offlineCoursesSlider" class="owl-carousel pl-6 md:pl-0 pb-16 border-red-900 border-b" style="border-color:#E9E9E9;color:#262145;">
      <a href="">
        <div class="relative fourthSliderClass bg-gray-300 rounded-xl">
          <!-- <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/img-default.jpg" /> -->
          <div class="border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-xs font-bold" style="border-color:#262145;">รายละเอียดคอร์ส</div>
          <div class="absolute top-5 left-5" style="width: 40px;"></div>
          <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0">
            <p class="lg:text-xs text-xs mb-1">offline</p>
            <p class="lg:text-lg text-xs font-bold">บริหารร้านอาหารให้โตแบบก้าวกระโดด</p>
          </div>
        </div>
      </a>
      <a href="">
        <div class="relative fourthSliderClass bg-gray-300 rounded-xl">
          <!-- <img class="object-cover w-full h-full rounded-xl" src="<?= get_theme_file_uri() ?>/assets/images/img-default.jpg" /> -->
          <div class="border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-xs font-bold" style="border-color:#262145;">รายละเอียดคอร์ส</div>
          <div class="absolute top-5 left-5" style="width: 40px;"></div>
          <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0">
            <p class="lg:text-xs text-xs mb-1">offline</p>
            <p class="lg:text-lg text-xs font-bold">บัญชีอย่างง่ายเพื่อเจ้าของกิจการ</p>
          </div>
        </div>
      </a>
    </div>
  </section>

  <!-- Online Course -->
  <section class="md:pl-20 pt-6 md:pt-20 " style="background-color: #262145;color:#fff">
    <div class="px-6 md:px-0 md:flex pb-16">
      <div class="md:w-2/4">
        <p class="lg:text-left text-4xl font-bold">Online Course</p>
        <div class="my-12">
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
        <div class="mb-16">
          <p class="text-sm md:text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-sm md:text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <div class="mb-8 md:mb-16">
          <div class="font-bold mb-4">Our Client</div>
          <div class="flex">
            <div class="tooltip">
              <img class="w-12 h-12 object-cover" src="<?= get_theme_file_uri() ?>/assets/images/image 7.png" />
              <div class="tooltiptext">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
            </div>
            <div class="tooltip -ml-2">
              <img class="w-12 h-12 object-cover" src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" />
              <div class="tooltiptext">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
            </div>
          </div>
          <div class="md:hidden -mx-6">
            <div class="owl-carousel">
              <div class="slideClient">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
              <div class="slideClient">
                <div class="flex items-center mb-4">
                  <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
                  <div class="ml-4">
                    <div>พีท พัชระ</div>
                    <div class="font-bold">Potato corner</div>
                  </div>
                </div>
                <p>สุดยอดเลยครับ เห็นผลจริงรายได้ผมเพิ่ม 3 เท่า หลังจากได้เพื่อนแท้ร้านอาหารมา ช่วยปรึกษาเรื่องการตลาด แนะนำครับผม</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-2/4 hidden md:flex items-center justify-center pl-16">
        <img src="<?= get_theme_file_uri() ?>/assets/images/courses-online.png" />
      </div>
    </div>
    <!--Slider-->
    <div id="onlineCoursesSlider" class="owl-carousel pl-6 md:pl-0 pb-16 border-red-900 border-b" style="border-color:#E9E9E9;color:#262145;">
      <a href="">
        <div class="relative fourthSliderClass bg-gray-300 rounded-xl">
          <div class="border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-xs font-bold" style="border-color:#262145;">
            รายละเอียดคอร์ส
          </div>
          <div class="absolute top-5 left-5" style="width: 40px;"></div>
          <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0">
            <p class="lg:text-xs text-xs mb-1">offline</p>
            <p class="lg:text-lg text-xs font-bold">บริหารร้านอาหารให้โตแบบก้าวกระโดด</p>
          </div>
        </div>
      </a>
      <a href="">
        <div class="relative fourthSliderClass bg-gray-300 rounded-xl">
          <div class="border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-xs font-bold" style="border-color:#262145;">
            รายละเอียดคอร์ส
          </div>
          <div class="absolute top-5 left-5" style="width: 40px;"></div>
          <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0">
            <p class="lg:text-xs text-xs mb-1">offline</p>
            <p class="lg:text-lg text-xs font-bold">บัญชีอย่างง่ายเพื่อเจ้าของกิจการ</p>
          </div>
        </div>
      </a>
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
          <a href="/contact-us" class="inline-block rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</a>
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
        <a href="/contact-us" class="inline-block rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</a>
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
    width: 300px;
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

  .slideClient {
    padding: 15px;
    width: 100%;
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.15);
    margin: 14px;
    color: #262145;
  }
</style>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<script>
  $(window).resize(function() {
    // $("#tabSlider").trigger('destroy.owl.carousel');
    // $("#tabSlider").owlCarousel({
    //   items: $(window).width() < 1024 ? 3.5 : 7.5,
    //   margin: 10,
    //   slideBy: 1,
    //   dots: false,
    // });
    $("#lastestCoursesSlider").trigger('destroy.owl.carousel');
    $("#lastestCoursesSlider").owlCarousel({
      items: $(window).width() < 1024 ? 1.1 : 2.25,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 1,
      margin: 20,
      dots: false,
    });

    $("#offlinePicSlider").trigger('destroy.owl.carousel');
    $(window).width() < 768 ?
      $("#offlinePicSlider").owlCarousel({
        items: $(window).width() < 1024 ? 1.1 : 2.25,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 1,
        margin: 20,
        dots: false,
        checkVisible: true,
      }) :
      $("#offlinePicSlider").hide();

    $("#offlineCoursesSlider").trigger('destroy.owl.carousel');
    $("#offlineCoursesSlider").owlCarousel({
      items: $(window).width() < 1024 ? 1.1 : 2.25,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 1,
      margin: 20,
      dots: false,
    });

    $("#onlineCoursesSlider").trigger('destroy.owl.carousel');
    $("#onlineCoursesSlider").owlCarousel({
      items: $(window).width() < 1024 ? 1.1 : 2.25,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 1,
      margin: 20,
      dots: false,
      checkVisible: $(window).width() < 1024 ? 1.1 : 2.25,
    });

  });

  $(document).ready(function() {
    // $("#tabSlider").owlCarousel({
    //   items: $(window).width() < 1024 ? 3.5 : 7.5,
    //   margin: 10,
    //   slideBy: 0,
    //   dots: false,
    //   nav: false,
    // });
    $("#lastestCoursesSlider").owlCarousel({
      items: $(window).width() < 1024 ? 1.1 : 2.25,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 1,
      margin: 20,
      dots: false,
    });
    // const swiper = new Swiper('.swiper-container', {
    //   // Optional parameters
    //   loop: false,
    //   slidesPerView: 3.5,
    //   spaceBetween: 10,
    //   breakpoints: {
    //     1024: {
    //       slidesPerView: 7.5,
    //       spaceBetween: 10,
    //     },
    //   }
    // });
    $(window).width() < 768 ?
      $("#offlinePicSlider").owlCarousel({
        items: $(window).width() < 1024 ? 1.1 : 2.25,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 1,
        margin: 20,
        dots: false,
        checkVisible: true,
      }) :
      $("#offlinePicSlider").hide();

    $("#offlineCoursesSlider").owlCarousel({
      items: $(window).width() < 1024 ? 1.1 : 2.25,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 1,
      margin: 20,
      dots: false,
    });

    $("#onlineCoursesSlider").owlCarousel({
      items: $(window).width() < 1024 ? 1.1 : 2.25,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 1,
      margin: 20,
      dots: false,
    });
  });
</script>