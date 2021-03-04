<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Franchise</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/franchise-hub.css">
</head>

<?php
require_once('custom-classes/class-posts.php');
$args = array(
  'taxonomy' => 'franchise_type',
  'orderby' => 'count',
  'order'   => 'DESC'
);
$franchise_type = get_categories($args);
$franchiseTypeId = isset($_GET['type']) ? $_GET['type'] : null;
if (!get_term_by('id', $franchiseTypeId, 'franchise_type')) {
  $franchiseTypeId = null;
}
$franchisesObject = Post::getPostsByCategory('franchises', null, 5, 0, null);
$franchises = $franchisesObject->posts

?>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <style>
    #headder {
      background: transparent;
      color: var(--primary);
    }

    #headder svg {
      fill: var(--primary);
    }

    #content {
      max-width: 1000px;
      margin: 0 auto;
    }
  </style>
  <!-- franchise hub title -->
  <section class="pt-32 w-full" style="color: #262145;">
    <div class="flex flex-col items-center justify-center border-b border-gray-300 pb-12">
      <div class="lg:text-2xl text-sm mb-2 font-light">รวมเบอร์ติดต่อ Franchise สำหรับทำธุรกิจไว้ที่นี่ที่เดียว</div>
      <div class="lg:text-6xl text-5xl font-bold tracking-tighter mt-2">Franchise hub</div>
      <div class="flex items-center justify-center flex-wrap mt-4">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('franchise-hub'))) ?>"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('franchise-hub'))) ?>"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
        <div copytoclipboard="<?= get_permalink(get_page_by_path('franchise-hub')) ?>" class="btn-copytoclipboard"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
      </div>
    </div>
  </section>
  <!-- banner -->
  <section id="banner" class="swiper-container relative">
    <div class="swiper-wrapper">
      <?php foreach (array_slice($franchises, 0, 5) as $franchise) : ?>
        <a href="<?= $franchise->link ?>" class="swiper-slide banner">
          <img class="object-cover w-full h-full" src="<?= $franchise->featuredImage ?>" />
        </a>
      <?php endforeach; ?>
    </div>

    <div class="absolute w-full h-full bottom-0" style="z-index: 9; background: linear-gradient(rgba(0,0,0,0), rgba(255,255,255,0.3));"></div>
    <div class="absolute w-full left-0 bottom-0 z-10 banner__title">

      <div class="md:ml-12 ml-5 md:mr-12 mr-32 md:mb-5 mb-6">
        <div class="text-xl font-light">เฟรนชายยอดนิยม</div>
        <div class="md:text-2xl text-xl font-semibold">Most Hit Franchise</div>
      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>

  <!-- hilite -->
  <section id="hilite" class="text-white py-12 md:pl-16 pl-0" style="background-color: #23212e;">
    <div class="swiper-container cat-swiper mb-8">
      <div class="swiper-wrapper pl-4 md:pl-0">
        <div style="width: auto;" class="swiper-slide hit-tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
        <?php foreach ($franchise_type as $type) : ?>
          <div style="width: auto;" class="swiper-slide hit-tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type->name ?></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div id="hilite-franchise" class="swiper-container franchise">
      <div class="swiper-wrapper">
        <?php foreach (array_slice($franchises, 0, 10) as $index => $franchise) : ?>
          <div class="swiper-slide">
            <div class="slide">
              <div class="number">#<?= $index + 1 ?></div>
              <div class="first-img">
                <?php if (count($franchise->รูปภาพ) > 0) : ?>
                  <img src="<?= $franchise->รูปภาพ[0]->รูป ?>" class="object-cover" />
                <?php else : ?>
                  <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" class="object-cover" />
                <?php endif ?>
              </div>
              <div class="others-img">
                <?php foreach (array_slice($franchise->รูปภาพ, 1, 4) as $img) { ?>
                  <img src="<?= $img->รูป ?>" class="object-cover" />
                <?php } ?>
                <?php foreach (count($franchise->รูปภาพ) < 5 ? range(0, 5 - count($franchise->รูปภาพ) - 1) : [] as $index) { ?>
                  <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" alt="">
                <?php } ?>
              </div>
              <div class="swiper-content">
                <div class="swiper-content-name"><?= $franchise->ชื่อธุรกิจ ?></div>
                <div class="swiper-content-label">สาขา<br />
                  <b>
                    <?= $franchise->จำนวนสาขา > 999 ? "999+" : $franchise->จำนวนสาขา ?>
                  </b>
                </div>
                <div class="swiper-content-label">ค่าสมัคร<br /><b><?= $franchise->ค่าสมัคร ?></b></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- New -->
  <section id="new" class="py-12">
    <div class="px-4 md:px-20 mb-8" style="color:#262145;">
      <div class="text-xl font-light">เฟรนชายเปิดใหม่</div>
      <div class="md:text-2xl text-xl font-semibold">Newly submitted Franchise</div>
    </div>
    <div class="swiper-container cat-swiper mb-8">
      <div class="swiper-wrapper md:pl-20 pl-4">
        <div style="width: auto;" class="swiper-slide new-type <?= !$franchiseTypeId ? 'tab-active' : 'tab' ?> rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
        <?php foreach ($franchise_type as $type) : ?>
          <div style="width: auto;" class="swiper-slide new-type <?= $franchiseTypeId == $type->term_id ? 'tab-active' : 'tab' ?> rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type->name ?></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div id="new-franchise" class="swiper-container franchise franchise-normal">
      <div class="swiper-wrapper md:px-16 px-0">
        <?php foreach (array_slice($franchises, 0, 10) as $index => $franchise) : ?>
          <div class="swiper-slide">
            <div class="slide">
              <div class="swiper-content">
                <div class="swiper-content-label">
                  <?= wp_get_post_terms($franchise->id, "franchise_type")[0]->name ?>
                  <br /><b><?= $franchise->ชื่อธุรกิจ ?></b>
                </div>
                <div class="swiper-content-label">สาขา<br />
                  <b>
                    <?= $franchise->จำนวนสาขา > 999 ? "999+" : $franchise->จำนวนสาขา ?>
                  </b>
                </div>
                <div class="swiper-content-label">ค่าสมัคร<br /><b><?= $franchise->ค่าสมัคร ?></b></div>
              </div>
              <div class="first-img">
                <?php if (count($franchise->รูปภาพ) > 0) : ?>
                  <img src="<?= $franchise->รูปภาพ[0]->รูป ?>" class="object-cover" />
                <?php else : ?>
                  <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" class="object-cover" />
                <?php endif ?>
              </div>
              <div class="others-img">
                <?php foreach (array_slice($franchise->รูปภาพ, 1, 4) as $img) { ?>
                  <img src="<?= $img->รูป ?>" class="object-cover" />
                <?php } ?>
                <?php foreach (count($franchise->รูปภาพ) < 5 ? range(0, 5 - count($franchise->รูปภาพ) - 1) : [] as $index) { ?>
                  <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" alt="">
                <?php } ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include 'truefriend-advertisement.php'; ?>

  <!-- Other category -->
  <section id="other" class="py-12">
    <div class="px-4 md:px-20 mb-8" style="color:#262145;">
      <div class="text-xl font-light">เฟรนชายเปิดใหม่</div>
      <div class="md:text-2xl text-xl font-semibold">Newly submitted Franchise</div>
    </div>
    <div class="swiper-container cat-swiper mb-8">
      <div class="swiper-wrapper md:pl-20 pl-4">
        <div style="width: auto;" class="swiper-slide tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
        <?php foreach ($franchise_type as $type) : ?>
          <div style="width: auto;" class="swiper-slide tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type->name ?></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div id="other-franchise" class="swiper-container franchise franchise-normal">
      <div class="swiper-wrapper md:px-16 px-0">
        <?php foreach ($franchises as $index => $franchise) : ?>
          <div class="swiper-slide">
            <div class="slide">
              <div class="swiper-content">
                <div class="swiper-content-label"><?= wp_get_post_terms($franchise->id, "franchise_type")[0]->name ?><br /><b><?= $franchise->ชื่อธุรกิจ ?></b></div>
                <div class="swiper-content-label">สาขา<br />
                  <b>
                    <?= $franchise->จำนวนสาขา > 999 ? "999+" : $franchise->จำนวนสาขา ?>
                  </b>
                </div>
                <div class="swiper-content-label">ค่าสมัคร<br /><b><?= $franchise->ค่าสมัคร ?></b></div>
              </div>
              <div class="first-img">
                <?php if (count($franchise->รูปภาพ) > 0) : ?>
                  <img src="<?= $franchise->รูปภาพ[0]->รูป ?>" class="object-cover" />
                <?php else : ?>
                  <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" class="object-cover" />
                <?php endif ?>
              </div>
              <div class="others-img">
                <?php foreach (array_slice($franchise->รูปภาพ, 1, 4) as $index => $img) { ?>
                  <img src="<?= $img->รูป ?>" class="object-cover" />
                <?php } ?>
                <?php foreach (count($franchise->รูปภาพ) < 5 ? range(0, 5 - count($franchise->รูปภาพ) - 1) : [] as $index) { ?>
                  <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" alt="">
                <?php } ?>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include 'truefriend-advertisement.php'; ?>

  <!-- lists -->
  <section id="lists" class="py-8 md:py-16" style="color: #262145;">
    <div class="max-w-screen-md	md:mx-auto">
      <div class="flex lg:flex-row flex-col-reverse mx-4 md:mx-0">
        <div class="flex items-center">
          <div class="border border-gray-300 rounded-full px-2 py-1 w-32">
            <select class="bg-transparent w-full">
              <option value="">ประเภทธุรกิจ</option>
              <?php foreach ($franchise_type as $type) { ?>
                <option value=""><?= $type->name ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="ml-2 border border-gray-300 rounded-full px-2 py-1 w-32">
            <select class="bg-transparent w-full">
              <option value="">ค่าเปิด</option>
            </select>
          </div>
        </div>
        <div class="lg:ml-auto lg:w-auto lg:my-0 my-4 w-full flex items-center bg-transparent border border-gray-300 rounded-full px-4 py-1">
          <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/search-blue.svg" alt="">
          <input type="text" class="bg-transparent focus:outline-none" placeholder="ค้นหาชื่อ Franchise">
        </div>
      </div>
      <div class="py-8">
        <div class="hidden md:flex items-center py-4">
          <div class="w-5/12">ชื่อ</div>
          <div class="w-2/12">ประเภทธุรกิจ</div>
          <div class="w-2/12">จำนวนสาขา</div>
          <div class="w-2/12">ค่าเปิด</div>
        </div>
        <?php foreach ($franchises as $index => $franchise) : ?>
          <div class="border-b border-gray-300 p-4 md:px-0 font-light">
            <a href="">
              <div class="flex flex-wrap items-center mb-4 text-base ">
                <div class="w-full md:w-5/12 text-2xl font-semibold"><?= $franchise->ชื่อธุรกิจ ?></div>
                <div class="w-4/12 md:w-2/12"><?= wp_get_post_terms($franchise->id, "franchise_type")[0]->name ?></div>
                <div class="w-4/12 md:w-2/12"><?= $franchise->จำนวนสาขา > 999 ? "999+" : $franchise->จำนวนสาขา ?> สาขา</div>
                <div class="w-4/12 md:w-2/12"><?= $franchise->ค่าสมัคร ?> บาท</div>
                <div class="hidden md:w-1/12 md:flex justify-end"><img class="w-4 h-4" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt=""></div>
              </div>
              <div class="lists-imgs">
                <?php foreach (array_slice($franchise->รูปภาพ, 0, 5) as $index => $img) : ?>
                  <div class="item <?= $index > 2 ? 'hidden md:block' : '' ?>">
                    <div class="item-more"><?= count($franchise->รูปภาพ) - 5 ?>+</div>
                    <img class="object-cover w-full h-full" src="<?= $img->รูป ?>" alt="">
                  </div>
                <?php endforeach; ?>
                <?php foreach (count($franchise->รูปภาพ) < 5 ? range(0, 5 - count($franchise->รูปภาพ) - 1) : [] as $index) { ?>
                  <div class="item">
                    <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" alt="">
                  </div>
                <?php } ?>
              </div>
            </a>
            <?php if (in_array($index, [1, 5])) : ?>
              <?php include 'truefriend-advertisement-small.php'; ?>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="flex items-center justify-center py-8">
        <button id="#loadmore" class="rounded-full py-3 px-24 text-xs" style="background-color: #262145; color: white;">LOAD MORE</button>
      </div>
    </div>
  </section>

  <!-- register -->
  <section class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
    <span class="text-3xl font-bold">
      ลงทะเบียน Franchise ฟรี
    </span>
    <a href="<?= get_site_url() ?>/franchise-register" class="rounded-full py-3 px-24 bg-white my-6">
      ลงทะเบียน
    </a>
  </section>

  <?php
  $footerbgcolor = '#f2f2f2';
  $footercolor = '#19181F';
  $footerheadercolor = 'rgba(0,0,0,0.5)';
  $footerlogo = get_theme_file_uri() . '/assets/images/logo-blue.svg';
  ?>
  <?php include 'truefriend-footer.php'; ?>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {

    let fracnhiseType = '';
    var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
    let allPosts = <?= $franchisesObject->posts_count ?>;
    let currentPosts = 10;
    let postsPerPage = 10;
    let loadMoreBtn = $("#loadmore");

    if (allPosts > currentPosts) {
      loadMoreBtn.show();
    } else {
      loadMoreBtn.hide()
    }

    $(".new-type").click(function() {
      if ($(this).attr('value') != fracnhiseType) {
        currentPosts = 0;
        fracnhiseType = $(this).attr('value');
        getPostByFranchiseType(false);
        if (allPosts > currentPosts) {
          loadMoreBtn.show();
        } else {
          loadMoreBtn.hide();
        }
      }
    });

    const getPostByFranchiseType = (append) => {
      var request = {
        'action': 'get_posts_by_cat_json_ajax',
        'postType': 'franchises',
        'postsPerPage': postsPerPage,
        'offset': currentPosts,
        'categoryNo': fracnhiseType,
      };

      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: request,
        async: false,
        dataType: "json",
        success: function(postsObject) {
          currentPosts += postsObject.posts.length;
          allPosts = postsObject.posts_count;
          const posts = postsObject.posts;
          if (!append) {
            $("#new-franchise .swiper-wrapper").html('');
          }
          if (posts.length > 0) {
            posts.map((supplier, i) => {
              console.log(supplier)
              // ตรงนี้น่าจะยังผิดอยู่
              $("#new-franchise .swiper-wrapper").append(`
              <div class="swiper-slide">
                <div class="slide">
                  <div class="swiper-content">
                    <div class="swiper-content-label">
                      <?= wp_get_post_terms($franchise->id, "franchise_type")[0]->name ?>
                      <br /><b><?= $franchise->ชื่อธุรกิจ ?></b>
                    </div>
                    <div class="swiper-content-label">สาขา<br />
                      <b>
                        <?= $franchise->จำนวนสาขา > 999 ? "999+" : $franchise->จำนวนสาขา ?>
                      </b>
                    </div>
                    <div class="swiper-content-label">ค่าสมัคร<br /><b><?= $franchise->ค่าสมัคร ?></b></div>
                  </div>
                  <div class="first-img">
                    <?php if (count($franchise->รูปภาพ) > 0) : ?>
                      <img src="<?= $franchise->รูปภาพ[0]->รูป ?>" class="object-cover" />
                    <?php else : ?>
                      <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" class="object-cover" />
                    <?php endif ?>
                  </div>
                  <div class="others-img">
                    <?php foreach (array_slice($franchise->รูปภาพ, 1, 4) as $img) { ?>
                      <img src="<?= $img->รูป ?>" class="object-cover" />
                    <?php } ?>
                    <?php foreach (count($franchise->รูปภาพ) < 5 ? range(0, 5 - count($franchise->รูปภาพ) - 1) : [] as $index) { ?>
                      <img src="<?= get_theme_file_uri() ?>/assets/images/gray.png" alt="">
                    <?php } ?>
                  </div>
                </div>
              </div>
                        `);
            })
          } else {
            $("#new-franchise .swiper-wrapper").html(`<div class="flex justify-center items-center">ไม่พบ Supplier ในประเภทธุรกิจนี้</div>`);
          }
        }
      })
    }

    var Banner = new Swiper('#banner', {
      loop: true,
      navigation: {
        nextEl: '#banner .swiper-button-next',
        prevEl: '#banner .swiper-button-prev',
      },
    });

    const catSwiper = new Swiper('.cat-swiper', {
      loop: false,
      slidesPerView: 'auto',
      spaceBetween: 10,
    });

    const hilite = new Swiper('#hilite-franchise', {
      slidesPerView: 'auto',
      spaceBetween: 10,
      freeMode: true,
    });

    const franchise = new Swiper('.franchise-normal', {
      spaceBetween: 0,
      breakpoints: {
        0: {
          slidesPerView: 1.1,
        },
        992: {
          slidesPerView: 2.7,
        },
      }
    });
  });
</script>

</html>