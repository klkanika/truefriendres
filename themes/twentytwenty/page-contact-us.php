<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ติดต่อเรา</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <style>
    #contact-us {
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
  <section id="contact-us" class="w-full  lg:py-18 py-32 flex items-center text-en" style="background-color: #F2F2F2;">
    <div class="xl:mx-56 md:mx-12 mx-4 lg:mb-4 lg:flex w-full flex-col lg:flex-row 2xl:flex-col">
      <div class="flex flex-col gap-8 flex-1" style="color: #262145;">
        <div class="flex flex-col gap-1">
          <span class="text-xl" style="color: #262145;">ติดต่อเรา</span>
          <span class="lg:text-7xl md:text-5xl text-4xl font-extrabold" style="line-height: 1em;margin-top: 0.2em;">Contact Us</span>
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
      <div class="text-sm flex flex-col flex-1 flex-grow gap-3 max-w-md lg:my-0 my-16 2xl:my-16">
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

</html>

<style>
  input:focus {
    outline: none !important;
  }
  .contact-us{
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
    width: 50% !important;
    margin-right: 0 !important;
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
  div.wpforms-container-full .wpforms-form .wpforms-field{
    padding: 0 !important;
  }
  .wpforms-field-limit-text{
    display: none !important;
  }

  @media (max-width: 1024px) {
    .text-contact {
      font-size: 12vw !important;
    }
  }
</style>