<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Franchise Register</title>
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css" />
	<link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">

	<script>
		// Initialize and add the map
		let map;
		let marker;
		let markerAddress;

		function initMap() {
			const myLatlng = {
				lat: 13.736717,
				lng: 100.523186
			};
			const map = new google.maps.Map(document.getElementById("map"), {
				zoom: 15,
				center: myLatlng,
			});
			const geocoder = new google.maps.Geocoder();

			map.addListener('click', function(e) {
				const latlng = JSON.parse(JSON.stringify(e.latLng, null, 2));
				geocoder.geocode({
					'latLng': e.latLng
				}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						if (results[0]) {
							setAddressMarker({
								'address': results[0].formatted_address,
								'lat': latlng.lat,
								'lng': latlng.lng
							});
						} else {
							setAddressMarker({
								'address': '',
								'lat': latlng.lat,
								'lng': latlng.lng
							});
						}
					} else {
						setAddressMarker({
							'address': '',
							'lat': latlng.lat,
							'lng': latlng.lng
						});
					}
				});
				placeMarker(e.latLng, map);
			});
		}

		function placeMarker(position, map) {
			if (marker) {
				marker.setPosition(position);
			} else {
				marker = new google.maps.Marker({
					position: position,
					map: map
				});
			}
			map.panTo(position);
		}

		function setAddressMarker(position) {
			$('[name=general_info-map]').val(JSON.stringify(position));
		}
	</script>
</head>
<?php
require_once('custom-classes/class-posts.php');
require_once('custom-classes/class-provinces.php');
$country_options = get_field_object('field_60259abbdd155')['choices'];
$facilities_options = get_field_object('field_60465ea42bdeb')['choices'];
$startPrice_options = get_field_object('field_60465e5e2bde9')['choices'];
$endPrice_options = get_field_object('field_60465e7c2bdea')['choices'];

$terms = get_terms(array(
	'taxonomy' => 'franchise_type',
	'hide_empty' => false,
));
$resTypeOptions = [];
$facilitiesOptions = [];
$startPriceOptions = [];
$endPriceOptions = [];
$countryOptions = [];

// echo '<pre>';
foreach ($terms as $key) {
	array_push($resTypeOptions, [
		"value" => $key->term_id,
		"name" => $key->name
	]);
}
foreach ($facilities_options as $key) {
	array_push($facilitiesOptions, [
		"value" => $key,
		"name" => $key
	]);
}
foreach ($startPrice_options as $key) {
	array_push($startPriceOptions, [
		"value" => $key,
		"name" => $key
	]);
}
foreach ($endPrice_options as $key) {
	array_push($endPriceOptions, [
		"value" => $key,
		"name" => $key
	]);
}
foreach ($country_options as $key) {
	array_push($countryOptions, [
		"value" => $key,
		"name" => $key
	]);
}
// print_r($facilitiesOptions);
// print_r($terms);
$form = [
	[
		"icon" => "info",
		"label" => "ข้อมูลทั่วไป",
		"form" => [
			[
				"name" 				=> "general_info-franchise_type",
				"label" 			=> "ประเภทกิจการ",
				"placeholder" 		=> "",
				"type"				=> "select",
				"options"			=> $resTypeOptions,
				"required"			=> true
			],
			[
				"name" 				=> "general_info-franchise_style",
				"label" 			=> "ลักษณะกิจการ",
				"placeholder" 		=> "",
				"type"				=> "select",
				"options"			=> $resTypeOptions,
				"required"			=> true
			],
			[
				"name" 				=> "general_info-name",
				"label" 			=> "ชื่อธุรกิจ",
				"placeholder" 		=> "ชื่อ",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-franchise_product",
				"label" 			=> "ลักษณะสินค้าและบริการ",
				"placeholder" 		=> "",
				"type"				=> "selectTag",
				"options"			=> $resTypeOptions,
				"required"			=> true
			],
			[
				"type" 				=> "hr",
			],
			[
				"name" 				=> "general_info-year_begin",
				"label" 			=> "ปีที่ก่อตั้ง",
				"placeholder" 		=> "พ.ศ.",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-year_franchise",
				"label" 			=> "ปีที่เริ่มขายเฟรนไชส์",
				"placeholder" 		=> "พ.ศ.",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-franchise_about",
				"label" 			=> "แนะนำธุรกิจ",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-franchise_history",
				"label" 			=> "ความเป็นมา",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-country",
				"label" 			=> "ประเทศ",
				"placeholder" => "",
				"type"				=> "select",
				"options"			=> $countryOptions,
				"required"		=> false
			],
			[
				"name" 				=> "general_info-franchise_price",
				"label" 			=> "ค่าแฟรนไชส์ต่อปี",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-franchise_license_price",
				"label" 			=> "ค่าไลเซนส์",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-contract_period",
				"label" 			=> "ระยะเวลาสัญญา",
				"placeholder" 		=> "1 ปี",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-royalty_fee",
				"label" 			=> "ค่า Royalty Free",
				"placeholder" 		=> "",
				"type"				=> "fee",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-marketing_fee",
				"label" 			=> "ค่า Marketing Free",
				"placeholder" 		=> "",
				"type"				=> "fee",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-bail",
				"label" 			=> "เงินประกัน",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-funds",
				"label" 			=> "งบการลงทุน",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-cashflow",
				"label" 			=> "เงินทุนหมุนเวียนต่อปี",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"type" 				=> "hr",
			],
			[
				"name" 				=> "general_info-branch_policy",
				"label" 			=> "นโยบาย การขยายสาขา",
				"placeholder" 		=> "",
				"type"				=> "multiCheck",
				"options" 			=> $facilitiesOptions,
				"checkFor"		=> "branch_policy",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-branch_amount",
				"label" 			=> "จำนวนสาขาสำนักงานใหญ่",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-branch_list",
				"label" 			=> "รายชื่อสาขาสำนักงานใหญ่",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-franchise_c_amount",
				"label" 			=> "จำนวน Franchise C",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-franchise_c_list",
				"label" 			=> "รายชื่อสาขา Franchise C",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-scale_rate",
				"label" 			=> "อัตราการขยายสาขา ( 5 ปีย้อนหลัง )",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-investment",
				"label" 			=> "การลงทุน",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-payback",
				"label" 			=> "ระยะเวลาคืนทุน",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "general_info-qualification",
				"label" 			=> "คุณสมบัติผู้ลงทุน",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-franchise_c_benefit",
				"label" 			=> "สิ่งที่ Franchise C จะได้รับ",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "general_info-other",
				"label" 			=> "อื่นๆ",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			// [
			// 	"name" 				=> "general_info-images",
			// 	"label" 			=> "รูปภาพ",
			// 	"placeholder" 		=> "",
			// 	"type"				=> "textarea",
			// 	"required"			=> false
			// ],
		],
	],
	[
		"icon" => "info",
		"label" => "แผนที่สำนักงานใหญ่",
		"form" => [
			[
				"name" 				=> "head_office-name",
				"label" 			=> "ชื่อบริษัท",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "head_office-address",
				"label" 			=> "ที่อยู่",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "head_office-region",
				"label" 			=> "ภาค",
				"placeholder" 		=> "",
				"type"				=> "select",
				"options"			=> [
					["value" => "center", "name" => "กลาง"],
					["value" => "north", "name" => "เหนือ"],
					["value" => "south", "name" => "ใต้"],
					["value" => "east", "name" => "ตะวันออก"],
					["value" => "west", "name" => "ตะวันตก"],
					["value" => "northeast", "name" => "ภาคกลาง"],
				],
				"required"			=> false
			],
			[
				"name" 				=> "head_office-province",
				"label" 			=> "จังหวัด",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "head_office-district",
				"label" 			=> "อำเภอ",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "head_office-sub_district",
				"label" 			=> "ตำบล",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "head_office-map",
				"label" 			=> "ปักหมุดแผนที่",
				"placeholder" 		=> "",
				"type"				=> "map",
				"required"			=> false
			],
		],
	],
	[
		"icon" => "info",
		"label" => "ติดต่อเจ้าของแฟรนไชส์",
		"form" => [
			[
				"name" 				=> "contact-name",
				"label" 			=> "ชื่อ",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "contact-tel",
				"label" 			=> "เบอร์โทร",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "contact-email",
				"label" 			=> "Email",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "contact-facebook",
				"label" 			=> "Facebook",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "contact-line",
				"label" 			=> "Line",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "contact-twitter",
				"label" 			=> "Twitter",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "contact-instagram",
				"label" 			=> "Instagram",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
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
			<h2 class="lg:text-2xl text-sm mb-2">ลงทะเบียน Franchise</h2>
			<h1 class="lg:text-6xl text-5xl font-bold tracking-tighter mb-4">Register Franchise</h1>
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
			<form action="<?= get_site_url() ?>/wp-admin/admin-post.php" id="form" method="post" novalidate>
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
									<?php if ($input['type'] === "hr") : ?>
										<hr class="lg:-mx-24 -mx-4 mt-16">
									<?php endif; ?>
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
														<?php foreach ($input['options'] as $option) : ?>
															<option value="<?= $option['value'] ?>"><?= $option['name'] ?></option>
														<?php endforeach; ?>
													</select>
												<?php break;
												case "input": ?>
													<input value="" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
												<?php break;
												case "textarea": ?>
													<textarea rows="4" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?>></textarea>
												<?php break;
												case "number": ?>
													<input type="number" value="" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
												<?php break;
												case "fee": ?>
													<input type="number" value="" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-3/5" <?= $input['required'] ? "required" : "" ?> />
													<select class="py-2 px-4 border rounded-lg w-1/5">
														<option value="">ต่อปี</option>
													</select>
												<?php break;
												case "price-duration": ?>
													<div class="flex">
														<select value="" name="other_info-price-price_start" class="py-2 px-4 mr-2 border rounded-lg" style="min-width: 50%;" <?= $input['required'] ? "required" : "" ?>>
															<option value="">เลือก</option>
															<?php foreach ($startPriceOptions as $option) : ?>
																<option value="<?= $option['value'] ?>"><?= $option['name'] ?></option>
															<?php endforeach; ?>
														</select>
														<!-- <input type="number" value="" name="other_info-price-price_start" class="py-2 px-4 border rounded-lg" <?= $input['required'] ? "required" : "" ?>/> -->
														-
														<select value="" name="other_info-price-price_end" class="py-2 px-4 ml-2 border rounded-lg" style="min-width: 50%;" <?= $input['required'] ? "required" : "" ?>>
															<option value="">เลือก</option>
															<?php foreach ($endPriceOptions as $option) : ?>
																<option value="<?= $option['value'] ?>"><?= $option['name'] ?></option>
															<?php endforeach; ?>
														</select>
														<!-- <input type="number" value="" name="other_info-price-price_end" class="py-2 px-4 border rounded-lg" <?= $input['required'] ? "required" : "" ?>/> -->
													</div>
												<?php break;
												case "social": ?>
													<input value="" name="other_info-social-facebook" placeholder="Facebook Page" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
													<input value="" name="other_info-social-line" placeholder="Line" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
													<input value="" name="other_info-social-website" placeholder="Website" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
													<input value="" name="other_info-social-instragram" placeholder="Instagram" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required" : "" ?> />
												<?php break;
												case "multiCheck": ?>
													<div class="flex flex-wrap border rounded-lg">
														<?php foreach ($input['options'] as $option) { ?>
															<div class="flex items-center p-4" style="border-color:rgba(0, 0, 0, 0.08);">
																<input type="checkbox" name="<?= $input['name'] ?>" value="<?= $option['value'] ?>" class="mr-3">
																<label for="<?= $input['checkFor'] ?>"><?= $option['name'] ?></label>
															</div>
														<?php } ?>
													</div>
												<?php break;
												case "selectTag": ?>
													<select multiple="multiple" id="<?= $input['name'] ?>" value="" name="<?= $input['name'] ?>[]" style="min-width: 50%;" <?= $input['required'] ? "required" : "" ?>>
														<option value="">เลือก</option>
														<?php foreach ($input['options'] as $option) : ?>
															<option value="<?= $option['value'] ?>"><?= $option['name'] ?></option>
														<?php endforeach; ?>
													</select>
												<?php break;
												case "map": ?>
													<div id="map" style="background-color:#C4C4C4;" class="flex items-center justify-center h-96"></div>
													<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3pXEQOhjrbzcdYXvB-K6T336pRJx0XJ0&callback=initMap&libraries=&v=weekly" async></script>
													<input type="hidden" id="general_info-map" name="general_info-map" />
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
				<div class="my-6 text-center">
					<input type="hidden" name="action" value="restaurant_register" />
					<input type="hidden" name="id" value="" />
					<input type="hidden" name="title" value="ชื่อ" />
					<input type="hidden" name="post_type" value="restaurant_register" />
					<input type="hidden" name="redirect" value="restaurant-hub" />
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

	//focus on required field
	$("#form").on('submit', function() {
		const fields = $(this).serializeArray()
		let requiredField = $(":input[required]").filter(function() {
			return !this.value || this.value === "";
		}).first();

		if (requiredField.length > 0) {
			$('.collapse').removeClass('open')
			requiredField.closest('.collapse').addClass('open')
			requiredField.focus()
			return false
		}
	});

	$(":input").change(() => {
		$(".collapse").each(function() {
			let fields = $(this).find(':input[required]').filter(function() {
				return !this.value || this.value === "";
			})

			if (fields.length === 0) {
				$(this).find('.status').attr('src', '<?= get_theme_file_uri() ?>/assets/images/icon-check.svg')
			} else {
				$(this).find('.status').attr('src', '<?= get_theme_file_uri() ?>/assets/images/icon-info.svg')
			}
		});
	});

	$(document).ready(function() {
		$('#general_info-franchise_product').selectize({
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
	});
</script>