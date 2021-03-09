<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Suppliers Register</title>
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css" />
	<link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>
<?php
$country_options = get_field_object('field_60259abbdd155')['choices'];
require_once('custom-classes/class-posts.php');
require_once('custom-classes/class-provinces.php');
$args = array(
	'taxonomy' => 'suppliertypes',
	'orderby' => 'name',
	'order'   => 'ASC',
	'hide_empty' => false,
);
$suppliertypes = get_categories($args);
$supplierOptions = [];
foreach ($suppliertypes as $st) {
	array_push($supplierOptions, $st->name);
}
$restaurantCategoriesObject = acf_get_field('restaurant_101_category');
$restaurantCategories = $restaurantCategoriesObject['choices'];

$suppliersObject = Post::getPostsByCategory('suppliers', null, 10, 0, null);
$suppliers = $suppliersObject->posts;

$terms = get_terms(array(
	'taxonomy' => 'suppliergoods',
	'hide_empty' => false,
));

$suppliergoods = [];

foreach ($terms as $key) {
	array_push($suppliergoods, [
		"value" => $key->term_id,
		"name" => $key->name
	]);
}
$form = [
	[
		"icon" => "info",
		"label" => "ข้อมูลทั่วไป",
		"form" => [
			[
				"name" 				=> "taxonomy-suppliertypes",
				"label" 			=> "ประเภทกิจการ",
				"placeholder" => "",
				"type"				=> "select",
				"options"			=> $supplierOptions,
				"required"		=> true
			],
			[
				"name" 				=> "ชื่อธุรกิจ",
				"label" 			=> "ชื่อธุรกิจ",
				"placeholder" => "ชื่อธุรกิจ",
				"type"				=> "input",
				"required"		=> true
			],
			[
				"name" 				=> "taxonomy-suppliergoods",
				"label" 			=> "สินค้าที่จำหน่าย",
				"placeholder" 		=> "",
				"type"				=> "selectTag",
				"options"			=> $suppliergoods,
				"required"			=> true
			],
			[
				"name" 				=> "แนะนำธุรกิจ",
				"label" 			=> "แนะนำธุรกิจ",
				"placeholder" => "",
				"type"				=> "textarea",
				"required"		=> false
			],
			[
				"name" 				=> "ประเทศ",
				"label" 			=> "ประเทศ",
				"placeholder" => "",
				"type"				=> "select",
				"options"			=> $country_options,
				"required"		=> false
			],
			[
				"name" 				=> "รูปภาพ",
				"label" 			=> "รูปภาพ",
				"placeholder" => "",
				"type"				=> "upload",
				"required"		=> false
			],
		],
	],
	[
		"icon" => "info",
		"label" => "การจัดส่ง",
		"form" => [
			[
				"name" 				=> "สถานที่จัดส่ง",
				"label" 			=> "สถานที่จัดส่ง",
				"placeholder" => "",
				"type"				=> "delivery-place",
				"required"		=> false
			],
			[
				"name"         => "",
				"label"			=> "แหล่งจัดส่ง Supplier",
				"btn-label"       => "เพิ่มแหล่งจัดส่ง",
				"icon"        => get_theme_file_uri() . "/assets/images/plus-icon.svg",
				"placeholder" => "",
				"type"        => "button",
				"required"    => true
			],
			[
				"name" 				=> "",
				"label" 			=> "",
				"placeholder" => "",
				"type"				=> "supplier-repeater",
				"required"		=> true
			],
		],
	],
	[
		"icon" => "check",
		"label" => "โซเชียลมีเดีย",
		"form" => [
			[
				"name" 				=> "โซเชียลมีเดีย-facebook",
				"label" 			=> "Facebook",
				"placeholder" => "Facebook ของ Supplier",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "โซเชียลมีเดีย-line",
				"label" 			=> "Line",
				"placeholder" => "Line ของ Supplier",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "โซเชียลมีเดีย-twitter",
				"label" 			=> "Twitter",
				"placeholder" => "Twitter ของ Supplier",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "โซเชียลมีเดีย-instagram",
				"label" 			=> "Instagram",
				"placeholder" => "Instagram ของ Supplier",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "โซเชียลมีเดีย-website",
				"label" 			=> "Website",
				"placeholder" => "Website ของ Supplier",
				"type"				=> "input",
				"required"		=> false
			],
		],
	],
	[
		"icon" => "info",
		"label" => "รายละเอียดเจ้าของธุรกิจ",
		"form" => [
			[
				"name" 				=> "รายละเอียดเจ้าของธุรกิจ-ชื่อ",
				"label" 			=> "ชื่อ",
				"placeholder" => "ชื่อ",
				"type"				=> "input",
				"required"		=> true
			],
			[
				"name" 				=> "รายละเอียดเจ้าของธุรกิจ-เบอร์โทร",
				"label" 			=> "เบอร์โทร",
				"placeholder" => "เบอร์โทร",
				"type"				=> "input",
				"required"		=> true
			],
			[
				"name" 				=> "รายละเอียดเจ้าของธุรกิจ-email",
				"label" 			=> "Email",
				"placeholder" => "Email",
				"type"				=> "input",
				"required"		=> true
			],
			[
				"name" 				=> "รายละเอียดเจ้าของธุรกิจ-facebook",
				"label" 			=> "Facebook",
				"placeholder" => "Facebook",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "รายละเอียดเจ้าของธุรกิจ-line",
				"label" 			=> "Line",
				"placeholder" => "Line",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "รายละเอียดเจ้าของธุรกิจ-twitter",
				"label" 			=> "Twitter",
				"placeholder" => "Twitter",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "รายละเอียดเจ้าของธุรกิจ-instagram",
				"label" 			=> "Instagram",
				"placeholder" => "Instagram",
				"type"				=> "input",
				"required"		=> false
			],
		],
	]
];
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
	<section class="text-white pt-32 lg:pb-20 lg:px-48 px-4 w-full" style="background: #F2F2F2;color:var(--primary);">
		<section class="w-full flex flex-col px-6 lg:px-0">
			<h2 class="lg:text-2xl text-sm mb-2">ลงทะเบียน Supplier</h2>
			<h1 class="lg:text-6xl text-5xl font-bold tracking-tighter mb-4">Register Supplier</h1>
			<p class="lg:text-base">หลังจากที่แอดมินได้ Approve แล้วข้อมูลของคุณจะลงไปที่ Website</p>
			<div class="flex flex-wrap mt-8 mb-16">
				<div class="font-bold text-lg flex items-center mb-3 w-full lg:w-auto lg:mb-0 lg:mr-8">
					<img class="w-8 h-8 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
					ขยายฐานลูกค้า
				</div>
				<div class="font-bold text-lg flex items-center mb-3 w-full lg:w-auto lg:mb-0 lg:mr-8">
					<img class="w-8 h-8 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
					สมัครฟรี
				</div>
				<div class="font-bold text-lg flex items-center w-full lg:w-auto">
					<img class="w-8 h-8 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
					ได้ SEO ไปในตัว
				</div>
			</div>

		</section>
		<section>
			<form action="<?= get_site_url() ?>/wp-admin/admin-post.php" method="post" id="form" novalidate enctype="multipart/form-data">
				<input type="file" accept="image/*" class="file-upload hidden" name="fileToUpload[]" multiple onchange="upload(event)">
				<?php foreach ($form as $i => $f) : ?>
					<div class="bg-white rounded-xl shadow-lg overflow-hidden mb-4 collapse <?= $i === 0 ? "open" : ""; ?>" collapse="<?= $i ?>">
						<div class="py-6 px-6 lg:px-8 flex justify-between cursor-pointer" onclick="showStep(<?= $i ?>)">
							<div class="flex w-full">
								<img class="mr-4 status" src="<?= get_theme_file_uri() ?>/assets/images/icon-<?= $f['icon'] ?>.svg" />
								<div class="font-semibold"><?= $f['label'] ?></div>
							</div>
							<img src="<?= get_theme_file_uri() ?>/assets/images/collapse.svg" class="collapse-icon" />
						</div>
						<div class="collapse-content">
							<hr />
							<div class="p-4 lg:py-12 lg:px-24">
								<?php foreach ($f['form'] as $input) : ?>
									<div class="flex flex-wrap mb-4 <?= $input['type'] === 'button' ? 'items-center' : '' ?>">
										<div class="<?= $input['type'] === 'delivery-place' ? 'lg:w-2/12' : 'lg:w-4/12' ?> w-full pr-12 lg:text-right text-gray-500 py-2">
											<?= $input['label'] ?>
											<?php if ($input['label'] && $input['required'] === true) { ?>
												<span class="text-red-600">*</span>
											<?php } ?>
										</div>
										<div class="<?= $input['type'] === 'delivery-place' ? 'lg:w-10/12' : 'lg:w-8/12' ?> w-full">
											<?php switch ($input['type']):
												case "select": ?>
													<select value="" name="<?= $input['name'] ?>" class="py-2 px-4 border rounded-lg w-full lg:w-auto" style="min-width: 50%;" <?= $input['required'] ? "required" : "" ?>>
														<option value="">เลือก</option>
														<?php foreach ($input['options'] as $option) : ?>
															<option value="<?= $option ?>"><?= $option ?></option>
														<?php endforeach; ?>
													</select>
												<?php break;
												case "input": ?>
													<input value="" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
												<?php break;
												case "textarea": ?>
													<textarea rows="4" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?>></textarea>
												<?php break;
												case "button": ?>
													<button type="button" id="addbox" class="flex items-center text-base font-bold"><?= isset($input['icon']) ? '<img class="w-5 h-5 mr-3" src="' . $input['icon'] . '" />' : '' ?> <?= $input['btn-label'] ?></button>
												<?php break;
												case "delivery-place": ?>
													<div class="flex flex-wrap" style="border-radius:4px;box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25);">
														<div class="flex items-center border-b w-full p-4" style="border-color:rgba(0, 0, 0, 0.08);"><input type="checkbox" id="delivery-place" value="all" class="mr-3 delivery-place"> <label for="delivery-place"> จัดส่งทั่วประเทศ </label></div>
														<?php foreach ($provinces as $key => $sector) { ?>
															<div class="flex flex-wrap justify-between w-full items-center px-8 pt-4 border-b sector-tab cursor-pointer" style="border-color:rgba(0, 0, 0, 0.08);">
																<div class="flex justify-between w-full items-center mb-4 province-collapse">
																	<div class="flex items-center">
																		<input type="checkbox" id="<?= $key ?>" value="<?= $key ?>" class="mr-3 sector delivery-place"> <label for="<?= $key ?>"> <?= $key ?> </label>
																	</div>
																	<img class="cursor-pointer transform" src="<?= get_theme_file_uri() . "/assets/images/collapse.svg" ?>" />
																</div>
																<div class="flex flex-wrap w-full px-8 sector-collapse hidden">
																	<?php foreach ($sector as $province) { ?>
																		<div class="flex items-center w-1/3 mb-4" style="border-color:rgba(0, 0, 0, 0.08);">
																			<input type="checkbox" name="สถานที่จัดส่ง[]" id="<?= $province ?>" sector="<?= $key ?>" value="<?= $province ?>" class="mr-3 <?= $key ?> delivery-place province"> <label for="<?= $province ?>"> <?= $province ?> </label>
																		</div>
																	<?php } ?>
																</div>
															</div>
														<?php } ?>
													</div>
												<?php break;
												case "supplier-repeater": ?>
													<p id="supplier-repeater"></p>
												<?php break;
												case "selectTag": ?>
													<select multiple="multiple" id="selectize" value="" name="<?= $input['name'] ?>[]" style="min-width: 50%;" <?= $input['required'] ? "required" : "" ?>>
														<option value="">กรอกลักษณะสินค้า</option>
														<?php foreach ($input['options'] as $option) : ?>
															<option value="<?= $option['name'] ?>"><?= $option['name'] ?></option>
														<?php endforeach; ?>
													</select>
												<?php break;
												case "upload": ?>
													<div class="flex flex-wrap" id="showpic">
														<button type="button" class="w-full mb-3 md:w-1/3 h-24 p-2 md:p-4 block items-center justify-center border-2 rounded-lg hover:bg-gray-50 focus:outline-none" id="uploadimg">
															<div class="flex items-center justify-center">
																<img class="w-4 h-4 md:w-6 md:h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-upload.svg" />
															</div>
															<p class="my-2">เพิ่มรูปภาพ</p>
														</button>
													</div>
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
				<!-- <div class="py-6 px-8">
					<label class="checkbox font-semibold">
						<input type="checkbox" name="send-email">
						<span class="checkmark"></span>
						รับข่าวสารเพิ่มเติมทาง Email
					</label>
				</div> -->
				<hr class="mx-8">
				<div class="my-6 text-center">
					<input type="hidden" name="action" value="common_register" />
					<input type="hidden" name="title" value="ชื่อธุรกิจ" />
					<input type="hidden" name="post_type" value="suppliers" />
					<input type="hidden" name="redirect" value="supplier-hub" />
					<button type="submit" class="rounded-full px-8 py-3 px-28 bg-white text-lg" style="background: #FFD950;">ลงทะเบียน</button>
				</div>
			</form>
		</section>
	</section>
	<?php include 'truefriend-footer.php'; ?>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js></script>
<script>
	function showStep(step) {
		$('.collapse').removeClass('open')
		$(`.collapse[collapse=${step}]`).addClass('open')
	}

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

	setInterval(function() {
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
	}, 1000)

	$(".delivery-place").click(function() {
		const selectedSector = $(this).attr('id');
		const checked = $(this).prop('checked');
		$(`.${selectedSector}`).prop("checked", checked);

		const sector = $(this).attr('sector')
		if (sector) {
			$(`input[sector="${sector}"]`).each(function() {
				if (!$(this).prop('checked')) {
					$(`#${sector}`).prop('checked', false);
					return false;
				} else {
					$(`#${sector}`).prop('checked', true);
				}
			})

			$(".province").each(function() {
				if (!$(this).prop('checked')) {
					$("#delivery-place").prop('checked', false);
					return false;
				} else {
					$("#delivery-place").prop('checked', true);
				}
			})
		} else {
			$(`.sector`).each(function() {
				if (!$(this).prop('checked')) {
					$("#delivery-place").prop('checked', false);
					return false;
				} else {
					$("#delivery-place").prop('checked', true);
				}
			})
		}
	});

	let boxIdx = 0;

	function generateSupplier() {
		$("#supplier-repeater").append(`
			<div class="flex flex-wrap p-8 mb-8 relative" style="border-radius:4px;box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25);">
				<div class="absolute right-0 top-0 -mr-2 -mt-2 cursor-pointer deletebox"><img src="<?= get_theme_file_uri() ?>/assets/images/circle-cross.svg" alt=""></div>
				<div class="w-full mb-2">ชื่อ</div>
				<input required value="" name="แหล่งจัดส่ง-ชื่อ[${boxIdx}]" class="py-2 px-4 border rounded-lg w-full mb-3" />
				<div class="w-full mb-2">ที่อยู่</div>
				<input required value="" name="แหล่งจัดส่ง-ที่อยู่[${boxIdx}]" class="py-2 px-4 border rounded-lg w-full mb-3" />
				<div class="flex items-center mt-2">
					<input type="hidden" value="0" name="แหล่งจัดส่ง-สถานที่จัดส่งหลัก[${boxIdx}]" class="mr-3">
					<input type="checkbox" value="1" name="แหล่งจัดส่ง-สถานที่จัดส่งหลัก[${boxIdx}]" class="mr-3" id="${boxIdx}"> <label for="${boxIdx++}"> สถานที่จัดส่งหลัก </label>
				</div>
			</div>
		`)
	}

	generateSupplier();

	$("#addbox").click(function() {
		generateSupplier();
	});

	$("p").on('click', '.deletebox', function() {
		$(this).parent().remove();
	});

	$("div").on('click', '.deletepic', function() {
		$("#form").append(`<input name="fileNotToUpload[]" type="number" value="${$(this).attr('imgIndex')}" class="hidden" >`);
		$(this).parent().remove();
	})

	$(".sector-tab").click(function() {
		$(this).find('.sector-collapse').toggleClass('hidden');
		$(this).find('.transform').toggleClass('rotate-180');
	});

	let imgIndex = 0;

	function upload(event) {
		const files = event.target.files;
		for (let i = 0; i < event.target.files.length; i++) {
			let src = URL.createObjectURL(event.target.files[i]);
			$("#showpic").append(`
				<div class="w-1/3 h-24 px-3 mb-3 l-2 relative">
					<img src="${src}" class="w-full h-full object-cover rounded-lg" />
					<div class="absolute top-0 right-0 mr-1 -mt-2 cursor-pointer deletepic" imgIndex="${imgIndex++}"><img src="<?= get_theme_file_uri() ?>/assets/images/circle-cross.svg" alt=""></div>
				</div>
			`);
		}
		$("#form").append('<input type="file" accept="image/*" class="file-upload hidden" name="fileToUpload[]" onchange="upload(event)" multiple>');
	}

	$(document).ready(function() {
		$('#selectize').selectize({
			plugins: ['remove_button'],
			delimiter: ',',
			persist: false,
			create: function(input) {
				return {
					value: input,
					text: input
				}
			}
		});

		$("#uploadimg").click(function() {
			$(".file-upload:last").trigger('click');
		});
	});
</script>