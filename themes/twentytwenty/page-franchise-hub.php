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
$stickyPosts = Post::getStickyPosts('franchises', 5);
$mostHitFranchisesObject = Post::getPostsByCategory('franchises', null, 10, 0, null, 'จำนวน_franchise_c', 'DESC');
$mostHitFranchises = $mostHitFranchisesObject->posts;
$newFranchisesObject = Post::getPostsByCategory('franchises', null, 10, 0, null);
$newFranchises = $newFranchisesObject->posts;
$franchisesObject = Post::getPostsByCategory('franchises', null, 10, 0, null);
$franchises = $newFranchisesObject->posts;
$defaultImage = get_theme_file_uri() . "/assets/images/img-default.jpg";
?>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <style>

    #content {
      max-width: 1000px;
      margin: 0 auto;
    }

    .noImg {
      background-color: #D3D3D3 !important;
      width: 150px !important;
      height: 150px !important;
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
      <?php foreach ($stickyPosts as $franchise) : ?>
        <a href="<?= $franchise->link ?>" class="swiper-slide banner">
          <img class="object-cover w-full h-full" src="<?= $franchise->featuredImage ?>" onerror="this.src='<?= $defaultImage ?>';"/>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="absolute w-full h-full bottom-0 pointer-events-none" style="z-index: 9; background: linear-gradient(rgba(0,0,0,0), rgba(255,255,255,0.3));"></div>
    <div class="absolute w-full left-0 bottom-0 z-10 banner__title pointer-events-none">

      <div class="md:ml-12 ml-5 md:mr-12 mr-32 md:mb-5 mb-6">
        <div class="text-xl font-light">เฟรนชายยอดนิยม</div>
        <div class="md:text-2xl text-xl font-semibold">Most Hit Franchise</div>
      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next pointer-events-auto"></div>
      <div class="swiper-button-prev pointer-events-auto"></div>
    </div>
  </section>

  <!-- hilite -->
  <section id="hilite" class="text-white py-12 md:pl-16 pl-0" style="background-color: #23212e;">
    <div class="swiper-container cat-swiper mb-8">
      <div class="swiper-wrapper pl-4 md:pl-0">
        <div style="width:auto;" class="swiper-slide hit-tab hit-tab-active rounded-full px-8 py-1 cursor-pointer" value="">ทั้งหมด</div>
        <?php foreach ($franchise_type as $type) : ?>
          <div style="width: auto;" class="swiper-slide hit-tab rounded-full px-8 py-1 ml-4 cursor-pointer" value="<?= $type->term_id ?>"><?= $type->name ?></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div id="hilite-franchise" class="swiper-container franchise">
      <div class="swiper-wrapper" id="mosthit-wrapper">
        <!-- will be generate by js -->
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
        <div style="width: auto;" class="swiper-slide new-type tab tab-active rounded-full px-8 py-1 cursor-pointer" value="">ทั้งหมด</div>
        <?php foreach ($franchise_type as $type) : ?>
          <div style="width: auto;" class="swiper-slide new-type tab rounded-full px-8 py-1 ml-4 cursor-pointer" value="<?= $type->term_id ?>"><?= $type->name ?></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div id="new-franchise" class="swiper-container franchise franchise-normal">
      <div class="swiper-wrapper md:px-16 px-0" id="new-wrapper">
        <!-- will be generate by js -->
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
        <div style="width: auto;" class="swiper-slide new-type2 tab tab-active rounded-full px-8 py-1 cursor-pointer" value="">ทั้งหมด</div>
        <?php foreach ($franchise_type as $type) : ?>
          <div style="width: auto;" class="swiper-slide new-type2 tab rounded-full px-8 py-1 ml-4 cursor-pointer" value="<?= $type->term_id ?>"><?= $type->name ?></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="swiper-container franchise franchise-normal" id="new-franchise2">
      <div class="swiper-wrapper md:px-16 px-0" id="new-wrapper2">
        <!-- will be generate by js -->
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
            <select class="bg-transparent w-full filterable" id="type">
              <option value="">ประเภทธุรกิจ</option>
              <?php foreach ($franchise_type as $type) { ?>
                <option value="<?= $type->term_id ?>"><?= $type->name ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="ml-2 border border-gray-300 rounded-full px-2 py-1 w-32">
            <select class="bg-transparent w-full filterable" id="price">
              <option value="">ค่าเปิด</option>
              <option value="<=10000">&lt; 10,000</option>
              <option value=">=10001,<=50000">10,001 ~ 50,000</option>
              <option value=">=50001,<=100000">50,001 ~ 100,000</option>
              <option value=">=100001">&gt; 100,001</option>
            </select>
          </div>
        </div>
        <div class="lg:ml-auto lg:w-auto lg:my-0 my-4 w-full flex items-center bg-transparent border border-gray-300 rounded-full px-4 py-1">
          <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/search-blue.svg" alt="">
          <input type="text" class="bg-transparent focus:outline-none filterable" placeholder="ค้นหาชื่อ Franchise" id="keyword">
        </div>
      </div>
      <div class="py-8 lg:px-0 px-4">
        <table id="resTable" class="w-full restaurant-table">
          <tbody class="cursor-pointer">
          </tbody>
        </table>
      </div>
      <div class="flex items-center justify-center py-8">
        <button id="loadmore" class="rounded-full py-3 px-24 text-xs" style="background-color: #262145; color: white;">LOAD MORE</button>
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
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {

    let fracnhiseType = '';
    var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
    let allPosts = <?= $franchisesObject->posts_count ? $franchisesObject->posts_count : 0 ?>;
    let currentPosts = 10;
    let postsPerPage = 10;
    let loadMoreBtn = $("#loadmore");
    let type = '';
    let price = '';
    let keyword = '';
    const franchises = <?= json_encode($franchises) ?>;

    if (allPosts > currentPosts) {
      loadMoreBtn.show();
    } else {
      loadMoreBtn.hide()
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
    });

    let hilite_franchise = new Swiper('#hilite-franchise', {
      slidesPerView: 'auto',
      spaceBetween: 10,
      freeMode: true,
    });

    let new_franchise = new Swiper('#new_franchise', {
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

    let new_franchise2 = new Swiper('#new_franchise2', {
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

    $(".hit-tab").click(function() {
      $(".hit-tab").removeClass('hit-tab-active');
      $(this).addClass('hit-tab-active');
      const value = $(this).attr('value');
      var request = {
        'action': 'get_posts_by_cat_json_ajax',
        'postType': 'franchises',
        'postsPerPage': 10,
        'offset': 0,
        'categoryNo': value,
        'orderBy': 'จำนวน_franchise_c',
        'order': 'DESC'
      };

      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: request,
        async: false,
        dataType: "json",
        success: function(postsObject) {
          postsObject && postsObject.posts && generateFranchises(postsObject.posts, '#mosthit-wrapper', '#hilite-franchise', true);
        }
      })
    });

    $(".new-type").click(function() {
      $(".new-type").removeClass('tab-active');
      $(this).addClass('tab-active');
      const value = $(this).attr('value');
      var request = {
        'action': 'get_posts_by_cat_json_ajax',
        'postType': 'franchises',
        'postsPerPage': 10,
        'offset': 0,
        'categoryNo': value,
      };

      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: request,
        async: false,
        dataType: "json",
        success: function(postsObject) {
          postsObject && postsObject.posts && generateFranchises(postsObject.posts, '#new-wrapper', '#new-franchise', false);
        }
      })
    });

    $(".new-type2").click(function() {
      $(".new-type2").removeClass('tab-active');
      $(this).addClass('tab-active');
      const value = $(this).attr('value');
      var request = {
        'action': 'get_posts_by_cat_json_ajax',
        'postType': 'franchises',
        'postsPerPage': 10,
        'offset': 0,
        'categoryNo': value,
      };

      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: request,
        async: false,
        dataType: "json",
        success: function(postsObject) {
          postsObject && postsObject.posts && generateFranchises(postsObject.posts, '#new-wrapper2', '#new-franchise2', false);
        }
      })
    });

    const generateFranchises = (franchises, DOMObjectName, slideName, firstObjectMatters) => {
      const DOMObject = $(`${DOMObjectName}`);
      DOMObject.html('');
      franchises.map((franchise, index) => {
        DOMObject.append(`
        <div class="swiper-slide">
            ${firstObjectMatters ? `<div class="top-0 left-0 ${index === 0 ? 'w-12 h-12 text-xl' : 'w-10 h-10 text-base'} font-bold rounded-full flex justify-center items-center absolute ml-4" style=" ${index === 0 ? 'color:var(--primary);background-color:#dfdfdf;' : 'color:white;background-color:#464356;'}">#${index + 1}</div>` : ``}
            <a class="p-2 rounded-xl block" style="border: 1px solid #CFCFCF;${index === 0 || !firstObjectMatters ? '' : 'background-color:#464356;'}" href="${franchise.link}">
              ${index === 0 && '<?= !wp_is_mobile() ?>' == 1 && firstObjectMatters ? `
                <div class="flex gap-x-3 h-80">
                  <div style="flex:4;">
                    <img src="${franchise.รูปภาพ[0] && franchise.รูปภาพ[0].image ? franchise.รูปภาพ[0].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';">
                  </div>
                  <div class="flex flex-col flex-1 gap-y-2 h-full">
                    <div class="h-full overflow-hidden"><img src="${franchise.รูปภาพ[1] && franchise.รูปภาพ[1].image ? franchise.รูปภาพ[1].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
                    <div class="h-full overflow-hidden"><img src="${franchise.รูปภาพ[2] && franchise.รูปภาพ[2].image ? franchise.รูปภาพ[2].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
                    <div class="h-full overflow-hidden"><img src="${franchise.รูปภาพ[3] && franchise.รูปภาพ[3].image ? franchise.รูปภาพ[3].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
                    <div class="h-full overflow-hidden relative">
                      <div class="w-full h-full bg-black opacity-50 absolute text-white text-xl flex items-center justify-center ${franchise.รูปภาพ.length > 5 ? '' : 'hidden'}">${franchise.รูปภาพ.length - 5}+</div>
                      <div class="w-full h-full absolute text-white text-xl flex items-center justify-center ${franchise.รูปภาพ.length > 5 ? '' : 'hidden'}">${franchise.รูปภาพ.length - 5}+</div>
                      <img src="${franchise.รูปภาพ[4] && franchise.รูปภาพ[4].image ? franchise.รูปภาพ[4].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';">
                    </div>
                  </div>
                </div>
                <div class="flex justify-center gap-x-12 items-center text-base h-20">
                  <div>สาขา<br /><b class="text-xl">${franchise.จำนวนสาขา}</b></div>
                  <div><b class="text-2xl">${franchise.ชื่อธุรกิจ}</b></div>
                  <div>ค่าสมัคร<br /><b class="text-xl">${franchise.ค่าสมัคร}</b></div>
                </div>`
                :
                `<div class="flex flex-wrap ${firstObjectMatters ? '' : 'flex-wrap-reverse'}">
                  <div class="flex flex-wrap">
                    <div class="flex w-full h-60">
                      <img src="${franchise.รูปภาพ[0] && franchise.รูปภาพ[0].image ? franchise.รูปภาพ[0].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full pb-2" alt="" onerror="this.src='<?= $defaultImage ?>';">
                    </div>
                    <div class="flex h-20 gap-x-1">
                      <div class="h-full w-1/4 overflow-hidden"><img src="${franchise.รูปภาพ[1] && franchise.รูปภาพ[1].image ? franchise.รูปภาพ[1].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
                      <div class="h-full w-1/4 overflow-hidden"><img src="${franchise.รูปภาพ[2] && franchise.รูปภาพ[2].image ? franchise.รูปภาพ[2].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
                      <div class="h-full w-1/4 overflow-hidden"><img src="${franchise.รูปภาพ[3] && franchise.รูปภาพ[3].image ? franchise.รูปภาพ[3].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
                      <div class="h-full w-1/4 overflow-hidden relative">
                        <div class="w-full h-full bg-black opacity-50 absolute text-white text-xl flex items-center justify-center ${franchise.รูปภาพ.length > 5 ? '' : 'hidden'}">${franchise.รูปภาพ.length - 5}+</div>
                        <div class="w-full h-full absolute text-white text-xl flex items-center justify-center ${franchise.รูปภาพ.length > 5 ? '' : 'hidden'}">${franchise.รูปภาพ.length - 5}+</div>
                        <div class="h-full w-full overflow-hidden">
                          <img src="${franchise.รูปภาพ[4] && franchise.รูปภาพ[4].image ? franchise.รูปภาพ[4].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex justify-between items-center text-base h-20 mx-2 w-full">
                    <div><b class="text-xl">${franchise.ชื่อธุรกิจ}</b></div>
                    <div class="flex justify-between gap-x-8">
                      <div>สาขา<br /><b class="text-xl">${franchise.จำนวนสาขา}</b></div>
                      <div>ค่าสมัคร<br /><b class="text-xl">${franchise.ค่าสมัคร}</b></div>
                    </div>
                  </div>
                </div>`}
            </a>
          </div>
        `);
      });
      if (firstObjectMatters) {
        new Swiper(slideName, {
          slidesPerView: 'auto',
          spaceBetween: 10,
          freeMode: true,
        });
      } else {
        new Swiper(slideName, {
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
      }
    }

    generateFranchises(<?= json_encode($mostHitFranchises) ?>, "#mosthit-wrapper", "#hilite-franchise", true);
    generateFranchises(<?= json_encode($newFranchises) ?>, "#new-wrapper", "#new-franchise", false);
    generateFranchises(<?= json_encode($newFranchises) ?>, "#new-wrapper2", "#new-franchise2", false);

    const fetchFranchise = (destroy, offset) => {
      const request = {
        'action': 'get_posts_by_acf_field_json_ajax',
        'postType': 'franchises',
        'postsPerPage': 10,
        'offset': offset
      };

      const acf_fields = [];

      if (type) {
        request['taxonomies'] = [{
          taxonomy: 'franchise_type',
          field: 'id',
          terms: type,
        }]
      };

      if (keyword) {
        acf_fields.push({
          field: 'ชื่อธุรกิจ',
          compare: 'LIKE',
          value: keyword,
        })
      }

      if (price) {
        const prices = price.split(',');
        prices.map((d, i) => {
          acf_fields.push({
            field: 'franchise_price',
            compare: d.substr(0, 2),
            value: d.substr(2),
          })
        });
      }

      if (acf_fields.length > 0) {
        request['acf_fields'] = acf_fields;
      }

      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: request,
        async: false,
        dataType: "json",
        success: function(postsObject) {
          if (destroy) {
            currentPosts = postsObject.length;
          } else {
            currentPosts += postsObject.length;
          }

          allPosts = postsObject && postsObject[0] ? postsObject[0].total : 0
          generateTable(postsObject, destroy)
        },
      });
    }

    const data = [];
    $(".filterable").change(function() {
      type = $("#type").val();
      price = $("#price").val();
      keyword = $("#keyword").val();
      loadMoreBtn.hide();
      fetchFranchise(true, 0)
      if (allPosts > currentPosts) {
        loadMoreBtn.show();
      }
    });

    $.extend($.fn.dataTable.defaults, {
      searching: false,
      ordering: true
    });

    let theTable = $('#resTable').DataTable({
      order: [
        [4, "desc"]
      ],
      paging: false,
      info: false,
      responsive: true,
      columns: [{
          title: "ชื่อ",
          render: function(data) {
            return `<b>${data}</b>`;
          },
          width: "40%",
          className: 'text-left'
        },
        {
          title: "ประเภทธุรกิจ",
          width: "20%",
          className: 'text-left',
          render: function(data) {
            return data ? data : '-'
          }
        },
        {
          title: "จำนวนสาขา",
          render: function(data) {
            return data ? data + ' สาขา' : '-';
          },
          width: "20%",
          className: 'text-left'
        },
        {
          title: "ค่าเปิด",
          render: function(data) {
            return data ? data + ' บาท' : '-';
          },
          width: "20%",
          className: 'text-left'
        },
        {
          title: "",
          render: function(data) {
            return `<img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">`;
          }
        }
      ],
    });

    const generateTable = (franchises, destroy = false) => {

      if (destroy) {
        theTable.clear()
      }

      franchises.map((d, i) => {
        const row = theTable.row.add([
          d['ชื่อธุรกิจ'],
          d['ประเภทธุรกิจ'],
          parseInt(d['จำนวนสาขา']),
          parseFloat(d['ค่าสมัคร']),
          d['link'] || d['guid'],
        ])
        row.child(`
        <a href="${d['link'] || d['guid']}" class="flex gap-x-2 pb-6 mb-4 pt-4 border-b" style="border-color:rgba(0,0,0,0.12)">
          <div class="lg:w-1/5 w-1/4 lg:h-36 h-20 overflow-hidden rounded-xl">
            <img class="object-cover w-full h-full" src="${d['รูปภาพ'] && d['รูปภาพ'][0]?d['รูปภาพ'][0].image :'<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" onerror="this.src='<?= $defaultImage ?>';"/>
          </div>
          <div class="lg:w-1/5 w-1/4 lg:h-36 h-20 overflow-hidden rounded-xl"><img class="object-cover w-full h-full" src="${d['รูปภาพ'] && d['รูปภาพ'][1]?d['รูปภาพ'][1].image :'<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" onerror="this.src='<?= $defaultImage ?>';"/></div>
          <div class="lg:w-1/5 w-1/4 lg:h-36 h-20 overflow-hidden rounded-xl relative">
            <div class="w-full h-full bg-black opacity-50 absolute text-white text-xl flex items-center justify-center lg:hidden ${d['รูปภาพ'].length > 3 ? '' : 'hidden'}">${d['รูปภาพ'].length - 3}+</div>
            <div class="w-full h-full absolute text-white text-xl flex items-center justify-center lg:hidden ${d['รูปภาพ'].length > 3 ? '' : 'hidden'}">${d['รูปภาพ'].length - 3}+</div>
            <div class="h-full w-full overflow-hidden"><img src="${d['รูปภาพ'][2] && d['รูปภาพ'][2].image ? d['รูปภาพ'][2].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
          </div>
          <div class="lg:w-1/5 w-1/4 h-36 lg:block hidden overflow-hidden rounded-xl"><img class="object-cover w-full h-full" src="${d['รูปภาพ'] && d['รูปภาพ'][3]?d['รูปภาพ'][3].image :'<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" onerror="this.src='<?= $defaultImage ?>';"/></div>
          <div class="h-full lg:w-1/5 w-1/4 lg:h-36 rounded-xl overflow-hidden relative lg:block hidden">
            <div class="w-full h-full bg-black opacity-50 absolute text-white text-xl flex items-center justify-center ${d['รูปภาพ'].length > 5 ? '' : 'hidden'}">${d['รูปภาพ'].length - 5}+</div>
            <div class="w-full h-full absolute text-white text-xl flex items-center justify-center ${d['รูปภาพ'].length > 5 ? '' : 'hidden'}">${d['รูปภาพ'].length - 5}+</div>
            <div class="h-full w-full overflow-hidden"><img src="${d['รูปภาพ'][4] && d['รูปภาพ'][4].image ? d['รูปภาพ'][4].image : '<?= get_theme_file_uri() ?>' + '/assets/images/gray.png'}" class="object-cover h-full w-full" alt="" onerror="this.src='<?= $defaultImage ?>';"></div>
          </div>
        </a>
        ${(i+1) % 5 === 0 ? ` <div class="pb-6 mb-4 border-b" style="border-color:rgba(0,0,0,0.12)"><?php include 'truefriend-advertisement-small.php'; ?></div>` : ''}
        `).show()
      });

      theTable.draw(destroy)
    };

    $('#resTable tbody').on('click', 'tr', function() {
      var data = theTable.row(this).data();
      location.href = data[4];
    });

    generateTable(franchises, true);

    loadMoreBtn.click(() => {
      loadMoreBtn.hide();
      fetchFranchise(false, currentPosts)
      if (allPosts > currentPosts) {
        loadMoreBtn.show();
      }
    });

    <?php
    if (isset($_GET['type'])) {
    ?>
      $("#type").val("<?= $_GET['type'] ?>");
      $("#type").trigger('change');
    <?php
    }
    ?>
    $("img").on("error", function() {
      $(this).attr('src', "<?= $defaultImage ?>");
    });
  });
</script>

</html>