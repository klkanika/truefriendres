<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <style>

  </style>
</head>

<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$knowledgePosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'knowledge',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full" style="background-color: #262145;">
    <div class="flex flex-col my-8 lg:px-40 px-8">
      <span class="text-4xl text-center mb-2 font-thin">บริการของเรา</span>
      <span class="text-5xl text-center font-extrabold">Our Services</span>
    </div>
    <div class="star border-gray-500 lg:px-32 lg:mx-8 px-8 py-5 flex lg:justify-content-center justify-center gap-1">
      <a href=""><img class="w-24 md:w-auto " src="<?= get_theme_file_uri() ?>/assets/images/Ellipse 156.png" alt=""></a>
      <a href=""><img class="w-24 md:w-auto" src="<?= get_theme_file_uri() ?>/assets/images/Rectangle 349.png" alt=""></a>
      <a href=""><img class="w-24 md:w-auto" src="<?= get_theme_file_uri() ?>/assets/images/Star 3.png" alt=""></a>
    </div>
    <div class="flex flex-col lg:px-40 px-8">
      <span class="text-xl text-center mb-2 font-normal">นอกจากการเป็นคลังความรู้สำหรับธุรกิจร้านอาหารแล้ว</span>
      <span class="text-xl text-center mb-2 font-normal">เรายังมีบริการอื่นๆเพื่อช่วยผู้ประกอบการไปถึงฝั่งฝัน</span>
    </div>
    <div class="button border-gray-500 lg:px-32 lg:mx-8 px-8 py-5 pb-14  flex lg:justify-content-center justify-center gap-1">
      <button class="rounded-full text-black font-bold py-3 px-16" style="background-color: #FEDA52;">Read more</button>

    </div>
    <div class=" lg:px-32 lg:mx-8 px-8 py-5 flex lg:justify-content-center justify-center gap-4">
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
    </div>

    </div>
  </section>


  <div class="  flex-col  justify-start lg :pl-40 lg:px-32 px-4 grid-cols-2 " style="background-color: #E5E5E5;">
    <p class="lg:text-left text-black  text-4xl font-bold pt-20 ">PR & Marketing</p>

    <p class="text-left text-black text-xl font-bold pt-20 "></p>
    <div class=" flex space-x-4 ">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector.png" alt=""></a>
      <span class="lg:text-lg text-center text-black mb-2 font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
    </div>
    <div class=" flex space-x-4">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector.png" alt=""></a>
      <span class="lg:text-lg text-center text-black mb-2 font-bold">ลงมือทำสำเร็จ</span>
    </div>
    <div class=" flex space-x-4">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector.png" alt=""></a>
      <span class="lg:text-lg text-center text-black mb-2 font-bold">เห็นผลใน 1 เดือน</span>
    </div>
    <div class="grid grid-cols-2 gap-4 pt-14">
      <div class="flex flex-col ">
        <span class="text-lg text-left text-black mb-2 font-bold pb-8">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</span>
        <span class="text-lg text-left text-black mb-2 font-thin ">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</span>
        <div class=" flex space-x-4 pt-14">
          <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/image 7.png" alt=""></a>
          <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt=""></a>

          <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/uo.png" alt=""></a>


        </div>
        <div class=" flex space-x-4 pt-14">
          <button class="rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</button>
        </div>

      </div>
      <div class="flex lg:justify-content-center justify-center">
        <a href=""><img class="w-auto h-auto " src="<?= get_theme_file_uri() ?>/assets/images/Group 135.png" alt=""></a>
      </div>
    </div>






    <div class="flex flex-col lg:px-40 px-8 pt-20">
      <span class="lg:text-xl text-center text-black mb-2 font-bold">สอบถามรายละเอียด PR & MARKETING</span>
    </div>

    <div class=" flex space-x-4 ">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector 250.png" alt=""></a>
    </div>
    <div class=" flex space-x-4 flex lg:justify-content-center justify-center">
      <a href=""><img class="md :w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 317.png" alt=""></a>
      <a href=""><img class="md :w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 316.png" alt=""></a>
      <a href=""><img class="md :w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 277.png" alt=""></a>
      <a href=""><img class="md :w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/amanicha@gmail.com-1.png" alt=""></a>
    </div>

  </div>



  </section>


  <div class="  flex-col justify-start pl-40 grid-cols-2 " style="background-color: #262145;">
    <p class="text-left text-white text-4xl font-bold pt-20 ">Consultant</p>

    <p class="text-left text-black text-xl font-bold pt-20 "></p>
    <div class=" flex space-x-4">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector.png" alt=""></a>
      <span class="lg:text-lg text-center text-white mb-2 font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
    </div>
    <div class=" flex space-x-4">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector.png" alt=""></a>
      <span class="lg:text-lg text-center text-white mb-2 font-bold">ลงมือทำสำเร็จ</span>
    </div>
    <div class=" flex space-x-4">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector.png" alt=""></a>
      <span class="lg:text-lg text-center text-white mb-2 font-bold">เห็นผลใน 1 เดือน</span>
    </div>
    <div class="grid grid-cols-2 gap-4 pt-14">
      <div class="flex flex-col ">
        <span class="text-lg text-left text-white mb-2 font-bold pb-8">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</span>
        <span class="text-lg text-left text-white mb-2 font-thin ">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</span>
        <div class=" flex space-x-4 pt-14">
          <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/image 7.png" alt=""></a>
          <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt=""></a>
        </div>
        <div class=" flex space-x-4 pt-14">
          <button class="rounded-full text-black font-bold py-3 px-16" style="background-color: #D4BD7D;">Contact Us</button>
        </div>
      </div>
      <div class="flex lg:justify-content-center justify-center">
        <a href=""><img class="md:w-auto md:h-auto " src="<?= get_theme_file_uri() ?>/assets/images/Group 293.svg" alt=""></a>
      </div>
    </div>



    <div class="flex flex-col lg:px-40 px-8 pt-20">
      <span class="lg:text-xl text-center text-white mb-2 font-bold">สอบถามรายละเอียด PR & MARKETING</span>
    </div>

    <div class=" flex space-x-4 ">
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector 251.png" alt=""></a>
    </div>
    <div class=" flex space-x-4 flex lg:justify-content-center justify-center">
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 321.png" alt=""></a>
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 319.png" alt=""></a>
      <a href=""><img class="md:w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 320.png" alt=""></a>

    </div>
  </div>

  <div class="  flex-col justify-start pl-40 grid-cols-2 " style="background-color: #D4BD7D;">
    <p class="text-left text: #262145 text-4xl font-bold pt-20 ">Training</p>

    <p class="text-left text-black text-xl font-bold pt-20 "></p>
    <div class=" flex space-x-4">
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/VectorBlue.png" alt=""></a>
      <span class="text-lg text-center text: #262145 mb-2 font-bold">สอนตั้งแต่ขั้นพื้นฐาน</span>
    </div>
    <div class=" flex space-x-4">
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/VectorBlue.png" alt=""></a>
      <span class="text-lg text-center text: #262145 mb-2 font-bold">ลงมือทำสำเร็จ</span>
    </div>
    <div class=" flex space-x-4">
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/VectorBlue.png" alt=""></a>
      <span class="text-lg text-center text: #262145 mb-2 font-bold">เห็นผลใน 1 เดือน</span>
    </div>
    <div class="grid grid-cols-2 gap-4 pt-14">
      <div class="flex flex-col ">
        <span class="text-lg text-left text: #262145 mb-2 font-bold pb-8">“การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง</span>
        <span class="text-lg text-left text: #262145 mb-2 font-thin ">มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา</span>
        <div class=" flex space-x-4 pt-14">
          <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/image 7.png" alt=""></a>
          <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt=""></a>
        </div>
        <div class=" flex space-x-4 pt-14">
          <button class="rounded-full text-white font-bold py-3 px-16" style="background-color: #262145;">Contact Us</button>
        </div>
      </div>
      <div class="flex lg:justify-content-center justify-center">
        <a href=""><img class="w-auto h-auto " src="<?= get_theme_file_uri() ?>/assets/images/Group 294.png" alt=""></a>
      </div>
    </div>

    <div class="flex flex-col lg:px-40 px-8 pt-20">
      <span class="text-xl text-center text: #262145 mb-2 font-bold">สอบถามรายละเอียด PR & MARKETING</span>
    </div>

    <div class=" flex space-x-4 ">
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Vector 250.png" alt=""></a>
    </div>
    <div class=" flex space-x-4 flex lg:justify-content-center justify-center">
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 317.png" alt=""></a>
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 316.png" alt=""></a>
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/Group 277.png" alt=""></a>
      <a href=""><img class="w-24 md:w-auto pb-4" src="<?= get_theme_file_uri() ?>/assets/images/amanicha@gmail.com-1.png" alt=""></a>

    </div>
  </div>
  <section id="contact-us" class="lg:h-screen px-12 lg:px-48 lg:pt-18 flex items-center" style="background-color: #F2F2F2;">
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
      <form action="#" class="text-sm flex flex-col flex-1 flex-grow gap-3 max-w-md lg:my-0 my-16">
        <span class="text-sm font-semibold">ติดต่อเรื่อง</span>
        <div class="contact-topic flex gap-2 mb-4">
          <input id="topicMarketing" name="topic" type="radio" value="marketing" checked="checked">
          <label class="rounded-lg text-sm px-4 text-center py-3" for="topicMarketing">Marketing</label>

          <input id="topicConsult" name="topic" type="radio" value="consult">
          <label class="rounded-lg text-sm px-4 text-center py-3" for="topicConsult">Consult</label>
        </div>
        <input name="name" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10" style="background-color: #F2F2F2;" placeholder="ชื่อ">
        <input name="phone" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10" style="background-color: #F2F2F2;" placeholder="เบอร์โทรศัพท์">
        <input name="email" type="email" class="rounded-lg border border-gray-500 px-4 py-auto h-10" style="background-color: #F2F2F2;" placeholder="อีเมล">
        <input name="line" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10" style="background-color: #F2F2F2;" placeholder="Line ID">
        <textarea name="meaasge" rows="3" class="rounded-lg border border-gray-500 px-4 py-1" style="background-color: #F2F2F2;" placeholder="รายละเอียด"></textarea>
        <button type="submit" class="h-10 rounded-full" style="background-color:#262145; color: #DBDBDB;">ส่งข้อความ</button>
      </form>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>


</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>