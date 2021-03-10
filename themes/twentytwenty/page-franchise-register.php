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
			$('[name=ปักหมุดแผนที่]').val(JSON.stringify(position));
		}
	</script>
</head>
<?php
$facilities_options = get_field_object('field_60465ea42bdeb')['choices'];
require_once('custom-classes/class-posts.php');
require_once('custom-classes/class-provinces.php');

$franchiseType = array_map(function ($key) {
	return [
		"value" => $key->term_id,
		"name" => $key->name
	];
}, get_terms(array(
	'taxonomy' => 'franchise_type',
	'hide_empty' => false,
)));

$franchiseStyle = array_map(function ($key) {
	return [
		"value" => $key->term_id,
		"name" => $key->name
	];
}, get_terms(array(
	'taxonomy' => 'franchise_style',
	'hide_empty' => false,
)));

$franchiseProduct = array_map(function ($key) {
	return [
		"value" => $key->term_id,
		"name" => $key->name
	];
}, get_terms(array(
	'taxonomy' => 'franchise_product',
	'hide_empty' => false,
)));

$countryOptions = array_map(function ($key) {
	return [
		"value" => $key,
		"name" => $key
	];
}, get_field_object('field_60259abbdd155')['choices']);

// echo '<pre>';
$franchiseBranchPolicy = array_map(function ($key) {
	return [
		"value" => $key->term_id,
		"name" => $key->name
	];
}, get_terms(array(
	'taxonomy' => 'franchise_branch_policy',
	'hide_empty' => false,
)));

// print_r($facilitiesOptions);
// print_r($terms);
$form = [
	[
		"icon" => "info",
		"label" => "ข้อมูลทั่วไป",
		"form" => [
			[
				"name" 				=> "taxonomy-franchise_type",
				"label" 			=> "ประเภทกิจการ",
				"placeholder" 		=> "",
				"type"				=> "select",
				"options"			=> $franchiseType,
				"required"			=> true
			],
			[
				"name" 				=> "taxonomy-franchise_style",
				"label" 			=> "ลักษณะกิจการ",
				"placeholder" 		=> "",
				"type"				=> "select",
				"options"			=> $franchiseStyle,
				"required"			=> true
			],
			[
				"name" 				=> "ชื่อธุรกิจ",
				"label" 			=> "ชื่อธุรกิจ",
				"placeholder" 		=> "ชื่อ",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "taxonomy-franchise_product",
				"label" 			=> "ลักษณะสินค้าและบริการ",
				"placeholder" 		=> "",
				"type"				=> "selectTag",
				"options"			=> $franchiseProduct,
				"required"			=> true
			],
			[
				"type" 				=> "hr",
			],
			[
				"name" 				=> "ปีที่ก่อตั้ง",
				"label" 			=> "ปีที่ก่อตั้ง",
				"placeholder" 		=> "พ.ศ.",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "ปีที่เริ่มขายแฟรนชายส์",
				"label" 			=> "ปีที่เริ่มขายเฟรนไชส์",
				"placeholder" 		=> "พ.ศ.",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "แนะนำธุรกิจ",
				"label" 			=> "แนะนำธุรกิจ",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "ความเป็นมา",
				"label" 			=> "ความเป็นมา",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "ประเทศ",
				"label" 			=> "ประเทศ",
				"placeholder" => "",
				"type"				=> "select",
				"options"			=> $countryOptions,
				"required"		=> false
			],
			[
				"name" 				=> "franchise_price",
				"label" 			=> "ค่าแฟรนไชส์ต่อปี",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "ค่าไลเซนส์",
				"label" 			=> "ค่าไลเซนส์",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "ระยะเวลาสัญญา",
				"label" 			=> "ระยะเวลาสัญญา",
				"placeholder" 		=> "1 ปี",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "ค่า_royalty_fee",
				"label" 			=> "ค่า Royalty Free",
				"placeholder" 		=> "",
				"type"				=> "fee",
				"required"			=> true
			],
			[
				"name" 				=> "ค่า_marketing_fee",
				"label" 			=> "ค่า Marketing Free",
				"placeholder" 		=> "",
				"type"				=> "fee",
				"required"			=> true
			],
			[
				"name" 				=> "เงินประกัน",
				"label" 			=> "เงินประกัน",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "งบการลงทุน",
				"label" 			=> "งบการลงทุน",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "เงินทุนหมุนเวียนต่อปี",
				"label" 			=> "เงินทุนหมุนเวียนต่อปี",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"type" 				=> "hr",
			],
			[
				"name" 				=> "taxonomy-franchise_branch_policy",
				"label" 			=> "นโยบาย การขยายสาขา",
				"placeholder" 		=> "",
				"type"				=> "multiCheck",
				"options" 			=> $franchiseBranchPolicy,
				"checkFor"		=> "branch_policy",
				"required"			=> false
			],
			[
				"name" 				=> "จำนวนสาขาสำนักงานใหญ่",
				"label" 			=> "จำนวนสาขาสำนักงานใหญ่",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> false
			],
			[
				"name" 				=> "รายชื่อสาขาสำนักงานใหญ่",
				"label" 			=> "รายชื่อสาขาสำนักงานใหญ่",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "จำนวน_franchise_c",
				"label" 			=> "จำนวน Franchise C",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> false
			],
			[
				"name" 				=> "รายชื่อ_franchise_c",
				"label" 			=> "รายชื่อสาขา Franchise C",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "อัตราการขยายสาขา_5_ปีย้อนหลัง-จำนวนสาขา",
				"label" 			=> "อัตราการขยายสาขา ( 5 ปีย้อนหลัง )",
				"placeholder" 		=> "",
				"type"				=> "number",
				"required"			=> true
			],
			[
				"name" 				=> "การลงทุน",
				"label" 			=> "การลงทุน",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> true
			],
			[
				"name" 				=> "ระยะเวลาคืนทุน",
				"label" 			=> "ระยะเวลาคืนทุน",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "คุณสมบัติผู้ลงทุน",
				"label" 			=> "คุณสมบัติผู้ลงทุน",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "สิ่งที่_franchise_c_จะได้รับ",
				"label" 			=> "สิ่งที่ Franchise C จะได้รับ",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "อื่นๆ",
				"label" 			=> "อื่นๆ",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "รูปภาพ",
				"label" 			=> "รูปภาพ",
				"placeholder" 		=> "",
				"type"				=> "upload",
				"required"			=> true
			],
		],
	],
	[
		"icon" => "info",
		"label" => "แผนที่สำนักงานใหญ่",
		"form" => [
			[
				"name" 				=> "ชื่อบริษัท",
				"label" 			=> "ชื่อบริษัท",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "ที่อยู่",
				"label" 			=> "ที่อยู่",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "ภาค",
				"label" 			=> "ภาค",
				"placeholder" 		=> "",
				"type"				=> "select",
				"options"			=> [
					["value" => "ภาคกลาง", "name" => "ภาคกลาง"],
					["value" => "ภาคเหนือ", "name" => "ภาคเหนือ"],
					["value" => "ภาคใต้", "name" => "ภาคใต้"],
					["value" => "ภาคตะวันออก", "name" => "ภาคตะวันออก"],
					["value" => "ภาคตะวันตก", "name" => "ภาคตะวันตก"],
					["value" => "ภาคตะวันออกเฉียงเหนือ", "name" => "ภาคตะวันออกเฉียงเหนือ"],
				],
				"required"			=> false
			],
			[
				"name" 				=> "จังหวัด",
				"label" 			=> "จังหวัด",
				"placeholder" 		=> "",
				"type"				=> "province",
				"required"			=> false
			],
			[
				"name" 				=> "อำเภอ",
				"label" 			=> "อำเภอ",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "ตำบล",
				"label" 			=> "ตำบล",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "ปักหมุดแผนที่",
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
				"name" 				=> "ข้อมูลติดต่อ-ชื่อ",
				"label" 			=> "ชื่อ",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "ข้อมูลติดต่อ-เบอร์โทร",
				"label" 			=> "เบอร์โทร",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "ข้อมูลติดต่อ-email",
				"label" 			=> "Email",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "ข้อมูลติดต่อ-facebook",
				"label" 			=> "Facebook",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "ข้อมูลติดต่อ-line",
				"label" 			=> "Line",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "ข้อมูลติดต่อ-twitter",
				"label" 			=> "Twitter",
				"placeholder" 		=> "",
				"type"				=> "input",
				"required"			=> false
			],
			[
				"name" 				=> "ข้อมูลติดต่อ-instagram",
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
												case "province": ?>
													<select value="" name="<?= $input['name'] ?>" class="py-2 px-4 border rounded-lg w-full lg:w-auto" style="min-width: 50%;" <?= $input['required'] ? "required" : "" ?>>
														<option value="">เลือก</option>
														<?php foreach ($provinces as $sector) : ?>
															<?php foreach ($sector as $province) : ?>
																<option value="<?= $province ?>"><?= $province ?></option>
															<?php endforeach; ?>
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
													<input type="number" value="" name="<?= $input['name'] ?>-<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-3/5" <?= $input['required'] ? "required" : "" ?> />
													<select name="<?= $input['name'] ?>-หน่วย" class="py-2 px-4 border rounded-lg w-1/5">
														<option selected value="% ต่อปี">% ต่อปี</option>
														<option value="บาทต่อปี">บาทต่อปี</option>
													</select>
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
				<hr class="mx-8">
				<div class="my-6 text-center">
					<input type="hidden" name="action" value="common_register" />
					<input type="hidden" name="id" value="" />
					<input type="hidden" name="title" value="ชื่อธุรกิจ" />
					<input type="hidden" name="post_type" value="franchises" />
					<input type="hidden" name="redirect" value="franchise-hub" />
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

	$("div").on('click', '.deletepic', function() {
		$("#form").append(`<input name="fileNotToUpload[]" type="number" value="${$(this).attr('imgIndex')}" class="hidden" >`);
		$(this).parent().remove();
	})

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
		$('#taxonomy-franchise_product').selectize({
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