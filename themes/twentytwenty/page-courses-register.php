<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ลงทะเบียน</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

</head>

<?php
$revenue_options = get_field_object('field_6044a32b41884')['choices'];
$courseId = $_GET['courseId'];
if (isset($courseId)) {
  $coursePost = get_post($courseId);
  if ($coursePost) {
    $endDate = get_field('วันปิดรับสมัคร', $courseId);
    if (date("Y-m-d") > $endDate) {
      header("location: " . get_site_url() . '/' . 'courses');
      exit(0);
    }
  } else {
    header("location: " . get_site_url() . '/' . 'courses');
    exit(0);
  }
} else {
  header("location: " . get_site_url() . '/' . 'courses');
  exit(0);
}

require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$CoursesRegisterPosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'courses-register',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});

$form = [
  [
    "icon" => "check",
    "label" => "ข้อมูลทั่วไป",
    "form" => [
      [
        "name"         => "general_info-name",
        "label"       => "ชื่อ - นามสกุล",
        "placeholder" => "ชื่อ - นามสกุล",
        "type"        => "input",
        "required"    => false
      ],
      [
        "name"         => "general_info-gender",
        "label"       => "เพศ",
        "placeholder" => "",
        "type"        => "select",
        "options"      => ["ชาย", "หญิง"],
        "required"    => false
      ],
      [
        "name"         => "general_info-email",
        "label"       => "อีเมล",
        "placeholder" => "อีเมล",
        "type"        => "input",
        "required"    => false
      ],
      [
        "name"         => "general_info-tel",
        "label"       => "เบอร์โทรศัพท์",
        "placeholder" => "เบอร์โทรศัพท์",
        "type"        => "input",
        "required"    => false
      ],
      [
        "name"         => "general_info-line_id",
        "label"       => "Line ID",
        "placeholder" => "Line ID",
        "type"        => "input",
        "required"    => false
      ],
    ],
  ],
  [
    "icon" => "info",
    "label" => "ข้อมูลร้าน",
    "form" => [
      [
        "name"        => "restaurant_info-name",
        "label"       => "ชื่อร้าน",
        "placeholder" => "ชื่อร้าน",
        "type"        => "input",
        "required"    => true
      ],
      [
        "name"         => "restaurant_info-location",
        "label"       => "ที่ตั้งร้าน",
        "placeholder" => "ที่ตั้งร้าน",
        "type"        => "input",
        "required"    => true
      ],
      [
        "name"         => "restaurant_info-type",
        "label"       => "ประเภทร้าน",
        "placeholder" => "ประเภทร้าน",
        "type"        => "input",
        "required"    => true
      ],
      [
        "name"         => "restaurant_info-seat",
        "label"       => "จำนวนที่นั่งในร้าน",
        "placeholder" => "จำนวนที่นั่งในร้าน",
        "type"        => "input",
        "required"    => false
      ],
      [
        "name"         => "restaurant_info-revenue",
        "label"       => "ยอดขายต่อเดือน",
        "placeholder" => "",
        "type"        => "select",
        "options"      => array_values($revenue_options),
        "values"     => array_keys($revenue_options),
        "required"    => true
      ],
    ],
  ],
  [
    "icon" => "check",
    "label" => "ข้อมูลอื่นๆ",
    "form" => [
      [
        "name"         => "other_info-coregistrator-name[]",
        "label"       => "ชื่อ นามสกุล ผู้สมัครร่วม",
        "placeholder" => "ชื่อ นามสกุล",
        "type"        => "input",
        "required"    => false,
        "id" => "co-field"
      ],
      [
        "name"         => "",
        "label"       => "",
        "placeholder" => "",
        "type"        => "btn-add-applicants",
        "required"    => false
      ],
      [
        "name"         => "",
        "label"       => "ชำระเงิน",
        "placeholder" => "",
        "type"        => "payment-detail",
        "required"    => false
      ],
      [
        "name"         => "other_info-payment_slip",
        "label"       => "แจ้งชำระเงิน",
        "placeholder" => "",
        "type"        => "upload-slip",
        "required"    => false
      ],
      [
        "name"         => "",
        "label"       => "",
        "placeholder" => "",
        "type"        => "btn-pay-later",
        "required"    => false
      ],
    ],
  ]
];
?>

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

    .collapse .collapse-content {
      display: none;
    }

    .collapse.open .collapse-icon {
      transform: rotate(180deg);
    }

    .collapse.open .collapse-content {
      display: block;
    }
  </style>
  <section id="register-courses" class="flex items-center justify-center md:px-12 pt-32 pb-4 w-screen" style="background-color: #F2F2F2; color:#262145;">
    <div class="w-5/6	lg:w-3/4">
      <div class="flex text-base md:text-2xl pb-2">
        <div class="font-light pr-2">ลงทะเบียน</div>
        <div class="font-bold">สมัครลงคอร์ส</div>
      </div>
      <p class="text-3xl md:text-6xl font-bold pb-2"><?= get_field('ชื่อ', $courseId) ?></p>
      <p class="text-sm md:text-base">หลังจากที่แอดมินได้ Approve แล้วข้อมูลของคุณจะลงไปที่ Website</p>
      <div class="block md:flex font-bold py-8 lg:py-10">
        <div class="flex mb-4 lg:mb-0">
          <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" />
          <p class="pl-2 pr-4">ขยายฐานลูกค้า</p>
        </div>
        <div class="flex mb-4 lg:mb-0">
          <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" />
          <p class="pl-2 pr-4">สมัครฟรี</p>
        </div>
        <div class="flex">
          <img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" />
          <p class="pl-2 pr-4">ได้ SEO ไปในตัว</p>
        </div>
      </div>

      <form action="<?= get_site_url() ?>/wp-admin/admin-post.php" id="form" method="post" novalidate>
        <?php foreach ($form as $i => $f) : ?>
          <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-4 collapse <?= $i === 0 ? "open" : ""; ?>" collapse="<?= $i ?>">
            <div class="py-6 px-6 lg:px-8 flex justify-between cursor-pointer" onclick="showStep(<?= $i ?>)">
              <div class="flex w-full">
                <img class="mr-4 status" src="<?= get_theme_file_uri() ?>/assets/images/icon-<?= $f['icon'] ?>.svg" />
                <div class="font-semibold">
                  <?= $f['label'] ?>
                </div>
              </div>
              <img src="<?= get_theme_file_uri() ?>/assets/images/collapse.svg" class="collapse-icon" />
            </div>
            <div class="collapse-content">
              <hr />
              <div class="p-4 lg:py-12 lg:px-24">
                <?php foreach ($f['form'] as $input) : ?>
                  <div class="flex flex-wrap mb-4">
                    <div class="lg:w-4/12 w-full pr-12 lg:text-right text-gray-500 py-2">
                      <?= $input['label'] ?>
                      <?php if ($input['required'] === true) { ?>
                        <span class="text-red-600">*</span>
                      <?php } ?>
                    </div>
                    <div class="lg:w-8/12 w-full">
                      <?php switch ($input['type']):
                        case "select": ?>
                          <select value="" name="<?= $input['name'] ?>" class="py-2 px-4 border rounded-lg w-full lg:w-auto" style="min-width: 50%;" <?= $input['required'] ? "required" : "" ?>>
                            <option value="">เลือก</option>
                            <?php foreach ($input['options'] as $key => $option) : ?>
                              <option value="<?= $input['values'][$key] ? $input['values'][$key] : $option ?>"><?= $option ?></option>
                            <?php endforeach; ?>
                          </select>
                        <?php break;
                        case "input": ?>
                          <input value="" id="<?= $input['id'] ?>" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
                        <?php break;
                        case "textarea": ?>
                          <textarea rows="4" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?>></textarea>
                        <?php break;
                        case "btn-add-applicants": ?>
                          <button type="button" id="addco" class="rounded-lg border-2 w-full flex items-center justify-center p-2 font-bold hover:bg-gray-50 focus:outline-none">
                            + เพิ่มผู้สมัครร่วม
                          </button>
                        <?php break;
                        case "payment-detail": ?>
                          <div class="p-4 items-center justify-center border-2 rounded-lg">
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
                        <?php break;
                        case "upload-slip": ?>
                          <button type="button" class="w-full md:w-1/2 p-2 md:p-4 block items-center justify-center border-2 rounded-lg hover:bg-gray-50 focus:outline-none">
                            <div class="flex items-center justify-center">
                              <img class="w-4 h-4 md:w-6 md:h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-upload.svg" />
                            </div>
                            <p class="my-2">อัพโหลดสลิป</p>
                          </button>
                        <?php break;
                        case "btn-pay-later": ?>
                          <button class="h-10 rounded-full w-full flex items-center justify-center p-2 font-bold hover:bg-gray-50 focus:outline-none" style="background-color:#262145; color: #DBDBDB;">
                            ชำระภายหลัง
                          </button>
                      <?php break;
                        default:
                      endswitch; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <?php if ($i < count($form) - 1) : ?>
                <hr class="mx-4 lg:mx-8" />
                <div type="next" class="p-3 lg:px-8 lg:py-6 flex justify-center w-full font-semibold cursor-pointer" onclick="showStep(<?= $i + 1 ?>)">
                  ถัดไป
                  <img src="<?= get_theme_file_uri() ?>/assets/images/right.svg" class="ml-4" />
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
        <hr class="mx-8">
        <div class="flex items-center justify-center">
          <input type="hidden" name="action" value="courses_register">
          <input type="hidden" name="course" value="<?= $courseId ?>">
          <button type="submit" class="h-14 w-full md:w-1/3 rounded-full p-4" style="background-color:#FFD950; color: #262145;">ลงทะเบียน</button>
        </div>
      </form>

    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>


</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.min.js"></script>
<script>
  function showStep(step) {
    $('.collapse').removeClass('open')
    $(`.collapse[collapse=${step}]`).addClass('open')
  }

  //focus on required field
  $("#form").on('submit', function() {
    const fields = $(this).serializeArray()
    let requiredField = $(":input[required]").filter(function() {
      return !this.value;
    }).first();

    if (requiredField.length > 0) {
      $('.collapse').removeClass('open')
      requiredField.closest('.collapse').addClass('open')
      requiredField.focus()
      return false
    }
  })

  $("#addco").click(function() {
    $("#co-field").parent().append(`<input value="" name="other_info-coregistrator-name[]" placeholder="ชื่อ นามสกุล" class="py-2 px-4 mt-2 border rounded-lg w-full">`)
  })

  $(":input").change(() => {
    $(".collapse").each(function() {
      let fields = $(this).find(':input[required]').filter(function() {
        return !this.value;
      })

      if (fields.length === 0) {
        $(this).find('.status').attr('src', '<?= get_theme_file_uri() ?>/assets/images/icon-check.svg')
      } else {
        $(this).find('.status').attr('src', '<?= get_theme_file_uri() ?>/assets/images/icon-info.svg')
      }
    });
  });

  $(document).ready(function() {
    Snackbar.show({
      text: 'Example notification text.'
    });
  });
</script>