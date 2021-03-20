<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
</head>

<?php
$marketingClient = get_field('pr_marketing_client', get_the_ID());
$consultantClient = get_field('consultant', get_the_ID());
$traningClient = get_field('training', get_the_ID());
$defaultImage = get_theme_file_uri() . "/assets/images/img-default.jpg";

?>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full bg-contain" style="background-color: #262145;background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-grid.svg')">
    <div class="flex flex-col my-8 lg:px-40 px-8">
      <span class="text-xl text-center mb-2 font-thin">บริการของเรา</span>
      <span class="text-5xl text-center font-extrabold">Our Services</span>
    </div>
    <img class="w-48 my-8 mx-auto" src="<?= get_theme_file_uri() ?>/assets/images/service-img.svg" alt="">
    <div class="flex flex-col lg:px-40 px-8">
      <span class="text-xl text-center mb-2 font-normal">นอกจากการเป็นคลังความรู้สำหรับธุรกิจร้านอาหารแล้ว<br>เรายังมีบริการอื่นๆเพื่อช่วยผู้ประกอบการไปถึงฝั่งฝัน</span>
    </div>
    <div class="button border-gray-500 lg:px-32 lg:mx-8 px-8 py-5 pb-14  flex lg:justify-content-center justify-center gap-1">
      <div scrollto="prmarketing" class="scrollto-item rounded-full text-black font-bold py-3 px-16" style="background-color: #FEDA52;">Read more</div>

    </div>
    <div class=" lg:px-32 lg:mx-8 px-8 py-5 flex lg:justify-content-center justify-center gap-4">
      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('services'))) ?>"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
      <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('services'))) ?>"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
      <a copytoclipboard="<?= get_permalink(get_page_by_path('services')) ?>" class="btn-copytoclipboard"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
    </div>

    </div>
  </section>

  <!-- PR & Marketing -->
  <section id="prmarketing" class="px-6 md:px-0 md:pl-20 pt-20" style="background-color: #E5E5E5;color:#262145">
    <div class="md:flex  pb-16">
      <div class="md:hidden items-center justify-center">
        <img src="<?= get_theme_file_uri() ?>/assets/images/PR&Marketing.png" />
      </div>
      <div class="md:w-2/4">
        <p class="lg:text-left text-4xl font-bold">PR & Marketing</p>
        <div class="my-12">
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-xl font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
          </div>
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-xl font-bold">ลงมือทำสำเร็จ</span>
          </div>
          <div class="flex mb-3 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-xl font-bold">เห็นผลใน 1 เดือน</span>
          </div>
        </div>
        <div class="mb-16">
          <p class="text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <?php if (!empty($marketingClient)) : ?>
          <div class="mb-8 md:mb-16">
            <div class="font-bold mb-4">Our Client</div>
            <div class="flex">
              <?php foreach ($marketingClient as $key => $thePost) : ?>
                <?php $margin = 0.5 * -1 * $key; ?>
                <div class="tooltip" style="margin-left: <?= $margin . "rem;" ?>">
                  <?php
                  $icon = $defaultImage;
                  if (!empty($thePost['icon_image'])) :
                    $icon = $thePost['icon_image'];
                  ?>
                    <img class="w-12 h-12 object-cover rounded-full" src="<?= $icon ?>" onerror="this.src='<?= $defaultImage ?>'" />
                  <?php else : ?>
                    <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
                  <?php endif; ?>
                  <div class="tooltiptext">
                    <div class="flex items-center mb-4">
                      <?php
                      $customerImage = $defaultImage;
                      if (!empty($thePost['customer_image'])) :
                        $customerImage = $thePost['customer_image'];
                      ?>
                        <img src="<?= $customerImage ?>" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;" onerror="this.src='<?= $defaultImage ?>'">
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
        <div>
          <a href="<?= get_permalink(get_page_by_path('contact-us')) ?>" class="inline-block rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</a>
        </div>
      </div>
      <div class="w-2/4 hidden md:flex items-center justify-center">
        <img src="<?= get_theme_file_uri() ?>/assets/images/PR&Marketing.png" />
      </div>
    </div>
    <div class="text-center mb-2 font-bold">สอบถามรายละเอียด PR & MARKETING</div>
    <div class="py-8 px-8 md:px-0 md:border-t md:border-gray-300 md:flex md:justify-center md:mr-20">
      <div class="mx-3 flex items-center mb-2 md:mb-0">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-call.svg" />
        <a href="tel:08276281927" class="ml-2 underline">08276281927 (คุณออม)</a>
      </div>
      <div class="mx-3 flex items-center mb-2 md:mb-0">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-line.svg" />
        <a href="https://line.me/ti/p/~@ormzins" target="_blank" class="ml-2 underline">@ormzin</a>
      </div>
      <div class="mx-3 flex items-center">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-mail.svg" />
        <a href="mailto:amanicha@gmail.com" class="ml-2 underline">amanicha@gmail.com</a>
      </div>
    </div>
  </section>

  <!-- Consultant -->
  <section class="px-6 md:px-0 md:pl-20 pt-6 md:pt-20 " style="background-color: #262145;color:#fff">
    <div class="md:flex  pb-16">
      <div class="md:hidden items-center justify-center -mx-6 mb-6">
        <img src="<?= get_theme_file_uri() ?>/assets/images/servive-consultant.png" />
      </div>
      <div class="md:w-2/4">
        <p class="lg:text-left text-4xl font-bold">Consultant</p>
        <div class="my-12">
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-xl font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
          </div>
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-xl font-bold">ลงมือทำสำเร็จ</span>
          </div>
          <div class="flex mb-3 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
            <span class="ml-4 text-xl font-bold">เห็นผลใน 1 เดือน</span>
          </div>
        </div>
        <div class="mb-16">
          <p class="text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <?php if (!empty($consultantClient)) : ?>
          <div class="mb-8 md:mb-16">
            <div class="font-bold mb-4">Our Client</div>
            <div class="flex">
              <?php foreach ($consultantClient as $key => $thePost) : ?>
                <?php $margin = 0.5 * -1 * $key; ?>
                <div class="tooltip" style="margin-left: <?= $margin . "rem;" ?>">
                  <?php
                  $icon = $defaultImage;
                  if (!empty($thePost['icon_image'])) :
                    $icon = $thePost['icon_image'];
                  ?>
                    <img class="w-12 h-12 object-cover rounded-full" src="<?= $icon ?>" onerror="this.src='<?= $defaultImage ?>'" />
                  <?php else : ?>
                    <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
                  <?php endif; ?>
                  <div class="tooltiptext">
                    <div class="flex items-center mb-4">
                      <?php
                      $customerImage = $defaultImage;
                      if (!empty($thePost['customer_image'])) :
                        $customerImage = $thePost['customer_image'];
                      ?>
                        <img src="<?= $customerImage ?>" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;" onerror="this.src='<?= $defaultImage ?>'">
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
        <div>
          <a href="<?= get_permalink(get_page_by_path('contact-us')) ?>" class="inline-block rounded-full font-bold py-3 px-16" style="background-color: #D4BD7D;color:#262145">Contact Us</a>
        </div>
      </div>
      <div class="w-2/4 hidden md:flex items-center justify-center px-16">
        <img src="<?= get_theme_file_uri() ?>/assets/images/servive-consultant.png" />
      </div>
    </div>
    <div class="text-center mb-2 font-bold">สอบถามรายละเอียด Consultant</div>
    <div class="py-8 px-8 md:px-0 md:border-t md:border-gray-100 md:flex md:justify-center md:mr-20">
      <div class="mx-3 flex items-center mb-2 md:mb-0">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-call-white.svg" />
        <a href="tel:08276281927" class="ml-2 underline">08276281927 (คุณออม)</a>
      </div>
      <div class="mx-3 flex items-center mb-2 md:mb-0">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-line-white.svg" />
        <a href="https://line.me/ti/p/~@ormzins" target="_blank" class="ml-2 underline">@ormzin</a>
      </div>
      <div class="mx-3 flex items-center">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-mail-white.svg" />
        <a href="mailto:amanicha@gmail.com" class="ml-2 underline">amanicha@gmail.com</a>
      </div>
    </div>
  </section>

  <!-- Training -->
  <section class="px-6 md:px-0 md:pl-20 pt-20 bg-contain" style="background-color: #D4BD7D;color:#262145;background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-grid.svg')">
    <div class="md:flex  pb-16">
      <div class="md:hidden items-center justify-center">
        <img src="<?= get_theme_file_uri() ?>/assets/images/service-training.png" />
      </div>
      <div class="md:w-2/4">
        <p class="lg:text-left text-4xl font-bold">Training</p>
        <div class="my-12">
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
            <span class="ml-4 text-xl font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
          </div>
          <div class="flex mb-2 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
            <span class="ml-4 text-xl font-bold">ลงมือทำสำเร็จ</span>
          </div>
          <div class="flex mb-3 items-center">
            <img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/service-check-blue.svg" alt="">
            <span class="ml-4 text-xl font-bold">เห็นผลใน 1 เดือน</span>
          </div>
        </div>
        <div class="mb-16">
          <p class="text-lg text-left mb-2 font-bold pb-4">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</p>
          <p class="text-lg text-left font-thin">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</p>
        </div>
        <?php if (!empty($traningClient)) : ?>
          <div class="mb-8 md:mb-16">
            <div class="font-bold mb-4">Our Client</div>
            <div class="flex">
              <?php foreach ($traningClient as $key => $thePost) : ?>
                <?php $margin = 0.5 * -1 * $key; ?>
                <div class="tooltip" style="margin-left: <?= $margin . "rem;" ?>">
                  <?php
                  $icon = $defaultImage;
                  if (!empty($thePost['icon_image'])) :
                    $icon = $thePost['icon_image'];
                  ?>
                    <img class="w-12 h-12 object-cover rounded-full" src="<?= $icon ?>" onerror="this.src='<?= $defaultImage ?>'" />
                  <?php else : ?>
                    <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
                  <?php endif; ?>
                  <div class="tooltiptext">
                    <div class="flex items-center mb-4">
                      <?php
                      $customerImage = $defaultImage;
                      if (!empty($thePost['customer_image'])) :
                        $customerImage = $thePost['customer_image'];
                      ?>
                        <img src="<?= $customerImage ?>" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;" onerror="this.src='<?= $defaultImage ?>'">
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
        <div>
          <a href="<?= get_permalink(get_page_by_path('contact-us')) ?>" class="inline-block rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</a>
        </div>
      </div>
      <div class="w-2/4 hidden md:flex items-center justify-center">
        <img src="<?= get_theme_file_uri() ?>/assets/images/service-training.png" />
      </div>
    </div>
    <div class="text-center mb-2 font-bold">สอบถามรายละเอียด Training</div>
    <div class="py-8 px-8 md:px-0 md:border-t md:border-gray-900 md:flex md:justify-center md:mr-20">
      <div class="mx-3 flex items-center mb-2 md:mb-0">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-call.svg" />
        <a href="tel:08276281927" class="ml-2 underline">08276281927 (คุณออม)</a>
      </div>
      <div class="mx-3 flex items-center mb-2 md:mb-0">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-line.svg" />
        <a href="https://line.me/ti/p/~@ormzins" target="_blank" class="ml-2 underline">@ormzin</a>
      </div>
      <div class="mx-3 flex items-center">
        <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-mail.svg" />
        <a href="mailto:amanicha@gmail.com" class="ml-2 underline">amanicha@gmail.com</a>
      </div>
    </div>
  </section>


  <section id="contact-us" class="py-16 px-8 lg:px-48 lg:pt-18" style="background-color: #F2F2F2;">
    <div class="lg:flex w-full lg:justify-between flex-col lg:flex-row">
      <div class="flex flex-col gap-8 flex-1" style="color: #262145;">
        <div class="flex flex-col gap-1">
          <span class="text-xl font-bold " style="color: #262145;">เกี่ยวกับเรา</span>

          <span class="text-base ">เราพร้อมเป็นส่วนร่วมเล็กๆ สนับสนุนให้คนทำร้านอาหารสำเร็จ </span>
          <span class="text-base ">เราพร้อมเป็นเพือนร่วมคิด ร่วมแก้ปัญหา เป็นที่ปรึกษา</span>
          <span class="text-base ">เป็นแหล่งวัตถุดิบความรู้ ในการบริการจัดการร้านให้สำเร็จ</span>
          <span class="text-base ">ทุกปัญหาเรื่องร้านอาหาร ปรึกษาเราได้ เพราะเราคือ "เพื่อนแท้ร้านอาหาร"</span>
        </div>
        <div class="flex flex-col gap-1 text-base">
          <span class="font-semibold">คุณป๊อปปี้</span>
          <div><a href="mailto:amanicha@gmail.com" class="inline-flex items-center"><img class="w-5 h-5 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/email-icon.svg" alt=""> amanicha@gmail.com</a></div>
          <div><a href="tel:08276281927" class="inline-flex items-center"><img class="w-5 h-5 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/phone-icon.svg" alt=""> 08276281927</a></div>
          <div><a href="https://line.me/ti/p/~@ormzins" target="_blank" class="inline-flex items-center"><img class="w-5 h-5 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/line-icon.svg" alt=""> @ormzins</a></div>
        </div>
        <div class="flex flex-col gap-1 text-base">
          <span class="font-semibold">คุณออม</span>
          <div><a href="mailto:amanicha@gmail.com" class="inline-flex items-center"><img class="w-5 h-5 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/email-icon.svg" alt=""> amanicha@gmail.com</a></div>
          <div><a href="tel:08276281927" class="inline-flex items-center"><img class="w-5 h-5 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/phone-icon.svg" alt=""> 08276281927</a></div>
          <div><a href="https://line.me/ti/p/~@ormzins" target="_blank" class="inline-flex items-center"><img class="w-5 h-5 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/line-icon.svg" alt=""> @ormzins</a></div>
        </div>
      </div>
      <div class="text-sm flex flex-col flex-1 flex-grow gap-3 max-w-md lg:my-0 my-16">
        <?= the_content() ?>
      </div>
    </div>
  </section>
  <?php
  $footerbgcolor = '#262145';
  $footercolor = 'white';
  $footerheadercolor = 'rgba(255,255,255,0.5)';
  $footerlogo = get_theme_file_uri() . '/assets/images/logo-white.svg';
  ?>
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

  input:focus {
    outline: none !important;
  }

  .contact-us {
    width: 100% !important;
  }

  .contact-topic {
    margin-bottom: 10px !important;
  }

  .contact-topic label {
    font-size: .875rem !important;
    font-weight: 600 !important;
    margin-bottom: 5px !important;
    display: block !important;
  }

  .contact-topic ul {
    display: flex !important;
    flex-wrap: wrap !important;
    margin: 0 -5px !important;
  }

  .contact-topic ul li {
    display: block !important;
    width: 33% !important;
    margin-bottom: 10px !important;
  }

  .contact-topic ul input[type="radio"] {
    display: none !important;
  }

  .contact-topic ul label {
    border: 1px solid #262145 !important;
    color: #262145 !important;
    flex-grow: 1 !important;
    font-weight: normal !important;
    padding: .75rem 1rem !important;
    text-align: center !important;
    border-radius: .5rem !important;
    display: block !important;
    margin: 0 5px !important;
    cursor: pointer !important;
  }

  .contact-topic ul input[type="radio"]:checked+label {
    background: #262145 !important;
    color: white !important;
  }

  .wpforms-label-hide {
    display: none !important;
  }

  input,
  textarea {
    width: 100% !important;
    border-radius: .5rem !important;
    height: 3rem !important;
    padding: 0 1rem !important;
    border: 1px solid rgba(6, 34, 65, 0.2) !important;
    background-color: transparent !important;
    margin-bottom: 10px !important;
  }

  textarea {
    height: 6rem !important;
    padding: 1rem !important;
  }

  .wpforms-submit {
    width: 100% !important;
    height: 2.5rem !important;
    background-color: #FFD950 !important;
    color: #262145 !important;
    border-radius: 20px !important;
    font-weight: 600 !important;
    border: 0 !important;
  }

  div.wpforms-container-full .wpforms-form .wpforms-list-inline ul li {
    margin-right: 0 !important;
  }

  div.wpforms-container-full .wpforms-form .wpforms-field {
    padding: 0 !important;
  }

  .wpforms-field-limit-text {
    display: none !important;
  }

  @media (max-width: 1024px) {
    .text-contact {
      font-size: 12vw !important;
    }

    .contact-topic ul li {
      width: 100% !important;
    }
  }
</style>

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