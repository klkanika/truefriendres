<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ลงทะเบียน</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

</head>

<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$knowledgePosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'register-courses',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <style>
    /* Tab content - closed */
    .tab-content {
      max-height: 0;
      -webkit-transition: max-height .35s;
      -o-transition: max-height .35s;
      transition: max-height .35s;
      border-top-left-radius: 0rem;
      border-top-right-radius: 0rem;
    }

    /* :checked - resize to full height */
    .tab input:checked~.tab-content {
      max-height: 100vh;
    }

    /* Label formatting when open */
    .tab input:checked+label {
      /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
      /* font-size: 1.25rem; */
      /*.text-xl*/
      padding: 1.25rem;
      /*.p-5*/
      /* border-left-width: 2px; */
      border-bottom-width: 1px;
      /*.border-l-2*/
      /* border-color: #6574cd; */
      /*.border-indigo*/
      /* background-color: #FFFFFF; */
      /*.bg-gray-100 */
      /* color: #6574cd; */
      border-color: #DCDCDC;
      border-bottom-left-radius: 0rem;
      border-bottom-right-radius: 0rem;
      /*.text-indigo*/
    }

    /* Icon */
    .tab label::after {
      float: right;
      right: 0;
      top: 0;
      display: block;
      width: 1.5em;
      height: 1.5em;
      line-height: 1.5;
      /* font-size: 1.25rem; */
      text-align: center;
      -webkit-transition: all .35s;
      -o-transition: all .35s;
      transition: all .35s;
    }

    /* Icon formatting - closed */
    .tab input[type=checkbox]+label::after {
      content: "\25BE";
      font-weight: bold;
      /*.font-bold*/
      /* border-width: 1px; */
      /*.border*/
      /* border-radius: 9999px; */
      /*.rounded-full */
      /* border-color: #b8c2cc; */
      /*.border-grey*/
    }

    /* Icon formatting - open */
    .tab input[type=checkbox]:checked+label::after {
      transform: rotate(180deg);
      /* background-color: #6574cd; */
      /*.bg-indigo*/
      /* color: #f8fafc; */
      /*.text-grey-lightest*/
    }

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
  </style>
  <section id="register-courses" class="flex items-center justify-center md:px-12 pt-32 pb-4 w-screen" style="background-color: #F2F2F2; color:#262145;">
    <div class="w-3/4">
      <div class="flex text-base md:text-2xl pb-2">
        <div class="font-light pr-2">ลงทะเบียน</div>
        <div class="font-bold">สมัครลงคอร์ส</div>
      </div>
      <p class="text-xl md:text-6xl font-bold pb-2">บริหารร้านอาหารให้โตแบบก้าวกระโดด</p>
      <p class="text-sm md:text-base">หลังจากที่แอดมินได้ Approve แล้วข้อมูลของคุณจะลงไปที่ Website</p>
      <div class="block md:flex font-bold py-10">
        <div class="flex">
          <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" />
          <p class="pl-2 pr-4">ขยายฐานลูกค้า</p>
        </div>
        <div class="flex">
          <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" />
          <p class="pl-2 pr-4">สมัครฟรี</p>
        </div>
        <div class="flex">
          <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" />
          <p class="pl-2 pr-4">ได้ SEO ไปในตัว</p>
        </div>
      </div>

      <div class="shadow-md mb-6">
        <div class="tab w-full overflow-hidden">
          <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs">
          <label class="flex p-5 bg-white leading-normal cursor-pointer rounded-lg" for="tab-multi-one">
            <div class="flex w-11/12">
              <svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                <g opacity="0.5">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 19.6875C12.9367 19.6875 15.2736 18.7195 16.9965 16.9965C18.7195 15.2736 19.6875 12.9367 19.6875 10.5C19.6875 8.06332 18.7195 5.72645 16.9965 4.00346C15.2736 2.28047 12.9367 1.3125 10.5 1.3125C8.06332 1.3125 5.72645 2.28047 4.00346 4.00346C2.28047 5.72645 1.3125 8.06332 1.3125 10.5C1.3125 12.9367 2.28047 15.2736 4.00346 16.9965C5.72645 18.7195 8.06332 19.6875 10.5 19.6875ZM10.5 21C13.2848 21 15.9555 19.8938 17.9246 17.9246C19.8938 15.9555 21 13.2848 21 10.5C21 7.71523 19.8938 5.04451 17.9246 3.07538C15.9555 1.10625 13.2848 0 10.5 0C7.71523 0 5.04451 1.10625 3.07538 3.07538C1.10625 5.04451 0 7.71523 0 10.5C0 13.2848 1.10625 15.9555 3.07538 17.9246C5.04451 19.8938 7.71523 21 10.5 21Z" fill="black" />
                  <path d="M11.7206 8.64697L8.71494 9.02366L8.60731 9.52241L9.19794 9.63135C9.58381 9.72322 9.65994 9.86235 9.57594 10.2469L8.60731 14.7987C8.35269 15.976 8.74512 16.5298 9.66781 16.5298C10.3831 16.5298 11.2139 16.1991 11.5906 15.745L11.7061 15.199C11.4436 15.43 11.0604 15.5218 10.8057 15.5218C10.4448 15.5218 10.3136 15.2685 10.4067 14.8223L11.7206 8.64697Z" fill="black" />
                  <path d="M10.5 7.21875C11.2249 7.21875 11.8125 6.63112 11.8125 5.90625C11.8125 5.18138 11.2249 4.59375 10.5 4.59375C9.77513 4.59375 9.1875 5.18138 9.1875 5.90625C9.1875 6.63112 9.77513 7.21875 10.5 7.21875Z" fill="black" />
                </g>
              </svg>
              <p class="pl-2 font-bold">ข้อมูลทั่วไป</p>
            </div>
          </label>
          <div class="tab-content overflow-hidden border-l-2 bg-white leading-normal rounded-lg">
            <form action="#" class="px-6 pt-6 pb-2 text-sm flex flex-col flex-1 flex-grow gap-3 items-center justify-center">
              <div class="w-3/4 grid md:grid-cols-5 gap-y-4 gap-x-8 mb-8">
                <div class="hidden md:flex justify-end">
                  ชื่อ - นามสกุล
                </div>
                <input name="name" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="ชื่อ - นามสกุล">
                <div class="hidden md:flex justify-end">
                  เพศ
                </div>
                <select id="sex" name="sex" class="rounded-lg border border-gray-500 px-4 py-auto h-10 w-2/5 col-span-4" placeholder="เพศ">
                  <option value="">เพศ</option>
                  <option value="M">ชาย</option>
                  <option value="F">หญิง</option>
                </select>
                <div class="hidden md:flex justify-end">
                  อีเมล
                </div>
                <input name="email" type="email" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="อีเมล">

                <div class="hidden md:flex justify-end">
                  เบอร์โทรศัพท์
                </div>
                <input name="phone" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="เบอร์โทรศัพท์">

                <div class="hidden md:flex justify-end">
                  Line ID
                </div>
                <input name="line" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="Line ID">

              </div>
              <button type="submit" class="h-14 w-full flex items-center justify-center border-t-2 p-2 font-bold hover:bg-gray-50 focus:outline-none">
                ถัดไป
                <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" />
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="shadow-md mb-6">
        <div class="tab w-full overflow-hidden">
          <input class="absolute opacity-0 " id="tab-multi-two" type="checkbox" name="tabs">
          <label class="flex p-5 bg-white leading-normal cursor-pointer rounded-lg" for="tab-multi-two">
            <div class="flex w-11/12">
              <svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                <g opacity="0.5">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 19.6875C12.9367 19.6875 15.2736 18.7195 16.9965 16.9965C18.7195 15.2736 19.6875 12.9367 19.6875 10.5C19.6875 8.06332 18.7195 5.72645 16.9965 4.00346C15.2736 2.28047 12.9367 1.3125 10.5 1.3125C8.06332 1.3125 5.72645 2.28047 4.00346 4.00346C2.28047 5.72645 1.3125 8.06332 1.3125 10.5C1.3125 12.9367 2.28047 15.2736 4.00346 16.9965C5.72645 18.7195 8.06332 19.6875 10.5 19.6875ZM10.5 21C13.2848 21 15.9555 19.8938 17.9246 17.9246C19.8938 15.9555 21 13.2848 21 10.5C21 7.71523 19.8938 5.04451 17.9246 3.07538C15.9555 1.10625 13.2848 0 10.5 0C7.71523 0 5.04451 1.10625 3.07538 3.07538C1.10625 5.04451 0 7.71523 0 10.5C0 13.2848 1.10625 15.9555 3.07538 17.9246C5.04451 19.8938 7.71523 21 10.5 21Z" fill="black" />
                  <path d="M11.7206 8.64697L8.71494 9.02366L8.60731 9.52241L9.19794 9.63135C9.58381 9.72322 9.65994 9.86235 9.57594 10.2469L8.60731 14.7987C8.35269 15.976 8.74512 16.5298 9.66781 16.5298C10.3831 16.5298 11.2139 16.1991 11.5906 15.745L11.7061 15.199C11.4436 15.43 11.0604 15.5218 10.8057 15.5218C10.4448 15.5218 10.3136 15.2685 10.4067 14.8223L11.7206 8.64697Z" fill="black" />
                  <path d="M10.5 7.21875C11.2249 7.21875 11.8125 6.63112 11.8125 5.90625C11.8125 5.18138 11.2249 4.59375 10.5 4.59375C9.77513 4.59375 9.1875 5.18138 9.1875 5.90625C9.1875 6.63112 9.77513 7.21875 10.5 7.21875Z" fill="black" />
                </g>
              </svg>
              <p class="pl-2 font-bold">ข้อมูลร้าน</p>
            </div>
          </label>
          <div class="tab-content overflow-hidden border-l-2 bg-white leading-normal rounded-lg">
            <form action="#" class="px-6 pt-6 pb-2 text-sm flex flex-col flex-1 flex-grow gap-3 items-center justify-center">
              <div class="w-3/4 grid md:grid-cols-5 gap-y-4 gap-x-8 mb-8">
                <div class="hidden md:flex justify-end">
                  ชื่อร้าน<span class="text-red-600">*</span>
                </div>
                <input name="name" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="ชื่อร้าน*">

                <div class="hidden md:flex justify-end">
                  ที่ตั้งร้าน<span class="text-red-600">*</span>
                </div>
                <input name="email" type="email" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="ที่ตั้งร้าน*">

                <div class="hidden md:flex justify-end">
                  ประเภทร้าน<span class="text-red-600">*</span>
                </div>
                <input name="phone" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="ประเภทร้าน*">

                <div class="hidden md:flex justify-end">
                  จำนวนที่นั่งในร้าน
                </div>
                <input name="line" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="จำนวนที่นั่งในร้าน">
                <div class="hidden md:flex justify-end">
                  ยอดขายต่อเดือน<span class="text-red-600">*</span>
                </div>
                <select id="sex" name="sex" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="ยอดขายต่อเดือน*">
                  <option value="">ยอดขายต่อเดือน*</option>
                  <option value="01">10,000 - 50,000 บาท</option>
                </select>
              </div>
              <button type="submit" class="h-14 w-full flex items-center justify-center border-t-2 p-2 font-bold hover:bg-gray-50 focus:outline-none">
                ถัดไป
                <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" />
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="shadow-md mb-6">
        <div class="tab w-full overflow-hidden">
          <input class="absolute opacity-0 " id="tab-multi-three" type="checkbox" name="tabs">
          <label class="flex p-5 bg-white leading-normal cursor-pointer rounded-lg" for="tab-multi-three">
            <div class="flex w-11/12">
              <svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                <g opacity="0.5">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 19.6875C12.9367 19.6875 15.2736 18.7195 16.9965 16.9965C18.7195 15.2736 19.6875 12.9367 19.6875 10.5C19.6875 8.06332 18.7195 5.72645 16.9965 4.00346C15.2736 2.28047 12.9367 1.3125 10.5 1.3125C8.06332 1.3125 5.72645 2.28047 4.00346 4.00346C2.28047 5.72645 1.3125 8.06332 1.3125 10.5C1.3125 12.9367 2.28047 15.2736 4.00346 16.9965C5.72645 18.7195 8.06332 19.6875 10.5 19.6875ZM10.5 21C13.2848 21 15.9555 19.8938 17.9246 17.9246C19.8938 15.9555 21 13.2848 21 10.5C21 7.71523 19.8938 5.04451 17.9246 3.07538C15.9555 1.10625 13.2848 0 10.5 0C7.71523 0 5.04451 1.10625 3.07538 3.07538C1.10625 5.04451 0 7.71523 0 10.5C0 13.2848 1.10625 15.9555 3.07538 17.9246C5.04451 19.8938 7.71523 21 10.5 21Z" fill="black" />
                  <path d="M11.7206 8.64697L8.71494 9.02366L8.60731 9.52241L9.19794 9.63135C9.58381 9.72322 9.65994 9.86235 9.57594 10.2469L8.60731 14.7987C8.35269 15.976 8.74512 16.5298 9.66781 16.5298C10.3831 16.5298 11.2139 16.1991 11.5906 15.745L11.7061 15.199C11.4436 15.43 11.0604 15.5218 10.8057 15.5218C10.4448 15.5218 10.3136 15.2685 10.4067 14.8223L11.7206 8.64697Z" fill="black" />
                  <path d="M10.5 7.21875C11.2249 7.21875 11.8125 6.63112 11.8125 5.90625C11.8125 5.18138 11.2249 4.59375 10.5 4.59375C9.77513 4.59375 9.1875 5.18138 9.1875 5.90625C9.1875 6.63112 9.77513 7.21875 10.5 7.21875Z" fill="black" />
                </g>
              </svg>
              <p class="pl-2 font-bold">ข้อมูลอื่นๆ</p>
            </div>
          </label>
          <div class="tab-content overflow-hidden border-l-2 bg-white leading-normal rounded-lg">
            <form action="#" class="px-6 pt-6 pb-2 text-sm flex flex-col flex-1 flex-grow gap-3 items-center justify-center">
              <div class="w-3/4 grid md:grid-cols-5 gap-y-4 gap-x-8 mb-8">
                <div class="hidden md:flex justify-end">
                  ชื่อ นามสกุล ผู้สมัครร่วม
                </div>
                <input name="name" type="text" class="rounded-lg border border-gray-500 px-4 py-auto h-10 col-span-4" placeholder="ชื่อ - นามสกุล">
                <div class="md:col-end-6 col-span-4">
                  <button class="rounded-lg border-2 w-full flex items-center justify-center p-2 font-bold hover:bg-gray-50 focus:outline-none">
                    + เพิ่มผู้สมัครร่วม
                  </button>
                </div>
                <div class="hidden md:flex justify-end">
                  ชำระเงิน
                </div>
                <div class="col-span-4 p-4 items-center justify-center border-2 rounded-lg">
                  <div class="md:grid md:grid-cols-2 gap-2">
                    <div class="flex items-center justify-center">
                      <img class="w-36 h-36 md:w-48 md:h-48" src="<?= get_theme_file_uri() ?>/assets/images/qrcode.png" />
                    </div>
                    <div>
                      <img class="hidden md:flex w-10 h-10 mb-4" src="<?= get_theme_file_uri() ?>/assets/images/bank-logo.png" />
                      <p class="font-bold text-lg">ธนาคารไทยพาณิชย์</p>
                      <p class="text-sm mb-4">บริษัท เพื่อนแท้ร้านอาหาร</p>
                      <p class="font-bold">เลขบัญชี 987654321</p>
                      <p class="font-bold text-lg">10,000 บาท</p>
                    </div>
                  </div>
                </div>
                <div class="hidden md:flex justify-end">
                  แจ้งชำระเงิน
                </div>
                <div class="col-span-4">
                  <button class="w-full md:w-1/2 p-2 md:p-4 block items-center justify-center border-2 rounded-lg hover:bg-gray-50 focus:outline-none">
                    <div class="flex items-center justify-center">
                      <img class="w-4 h-4 md:w-6 md:h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-upload.svg" />
                    </div>
                    <p class="my-2">อัพโหลดสลิป</p>
                  </button>
                </div>
                <div class="md:col-end-6 col-span-4">
                  <button class="h-10 rounded-full w-full flex items-center justify-center p-2 font-bold hover:bg-gray-50 focus:outline-none" style="background-color:#262145; color: #DBDBDB;">
                    ชำระภายหลัง
                  </button>
                </div>
              </div>

              <button type="submit" class="h-14 w-full flex items-center justify-center border-t-2 p-2 font-bold hover:bg-gray-50 focus:outline-none">
                ถัดไป
                <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" />
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="flex items-center justify-center">
        <button type="submit" class="h-14 w-full md:w-1/3 rounded-full p-4" style="background-color:#FFD950; color: #262145;">ลงทะเบียน</button>
      </div>
    </div>
  </section>
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