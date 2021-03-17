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

</html>

<style>
  input:focus {
    outline: none;
  }

  .contact-topic {
    margin-bottom: 10px;
  }

  .contact-topic label {
    font-size: .875rem;
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
  }

  .contact-topic ul {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -5px;
  }

  .contact-topic ul li {
    display: block;
    width: 50%;
  }

  .contact-topic ul input[type="radio"] {
    display: none;
  }

  .contact-topic ul label {
    border: 1px solid #262145;
    color: #262145;
    flex-grow: 1;
    font-weight: normal;
    padding: .75rem 1rem;
    text-align: center;
    border-radius: .5rem;
    display: block;
    margin: 0 5px;
    cursor: pointer;
  }

  .contact-topic ul input[type="radio"]:checked+label {
    background: #262145;
    color: white;
  }

  .wpforms-label-hide {
    display: none;
  }

  input,
  textarea {
    width: 100%;
    border-radius: .5rem;
    height: 3rem;
    padding: 0 1rem;
    border: 1px solid rgba(6, 34, 65, 0.2);
    background-color: transparent;
    margin-bottom: 10px;
  }

  textarea {
    height: 6rem;
    padding: 1rem;
  }

  .wpforms-submit {
    width: 100%;
    height: 2.5rem;
    background-color: #FFD950;
    color: #262145;
    border-radius: 20px;
    font-weight: 600;
  }

  @media (max-width: 1024px) {
    .text-contact {
      font-size: 12vw;
    }
  }
</style>