<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ติดต่อเรา</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>
<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <style>
    #headder{
      background: transparent;
    }
    .burger-bar,.balloon-chat{
      fill: #262145;
    }
    .logo{
      color: #262145;
    }
    #contact-us{
      background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b.svg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: 100%;
    }
    @media (max-width: 992px) {
      #contact-us {
        background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b-mobile.svg');
      }
    }
  </style>
  <!-- Set up your HTML -->
  <section id="contact-us" class="lg:h-screen px-12 lg:px-48 lg:pt-18 pt-32 flex items-center" style="background-color: #F2F2F2;">
    <div class="lg:flex w-full lg:justify-between flex-col lg:flex-row">
      <div class="flex flex-col gap-8 flex-1" style="color: #262145;">
        <div class="flex flex-col gap-1">
          <span class="text-xl" style="color: #262145;">ติดต่อเรา</span>
          <span class="lg:text-5xl text-contact font-extrabold" style="line-height: 1em;margin-top: 0.2em;">Contact Us</span>
          <span class="text-base">ติดต่อลงโฆษณา / ทำ Content หรืออื่นๆ</span>
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
        <button type="submit" class="h-10 rounded-full" style="background-color:#FFD950; color: #262145;">ส่งข้อความ</button>
      </form>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<style>
  input:focus{
    outline: none;
  }

  .contact-topic input[type="radio"] {
    display: none;
  }

  .contact-topic label {
    border: 1px solid #262145;
    color: #262145;
    flex-grow: 1;
  }

  .contact-topic input[type="radio"]:checked+label {
    background: #262145;
    color: white;
  }

  @media (max-width: 1024px) {
  .text-contact {
      font-size: 12vw;
    }
  }
</style>