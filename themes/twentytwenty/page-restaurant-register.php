<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.default.css" />
	<link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
	
	<script>
    // Initialize and add the map
    let map;
	let marker;
	let markerAddress;

    function initMap() {
	 	const myLatlng = { lat: 13.736717, lng: 100.523186 };
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
						setAddressMarker({'address': results[0].formatted_address, 'lat': latlng.lat, 'lng': latlng.lng});
					}else{
						setAddressMarker({'address': '', 'lat': latlng.lat, 'lng': latlng.lng});
					}
				}else{
					setAddressMarker({'address': '', 'lat': latlng.lat, 'lng': latlng.lng});
				}
			}
		);
		placeMarker(e.latLng, map);
		});
    }
	
	function placeMarker(position, map) {
		if ( marker ) {
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
		console.log($('[name=ปักหมุดแผนที่]').val());
	}
  </script>
</head>
<?php
$province_options = get_field_object('field_5fdf438de276f')['choices'];
$restaurantDay_options = get_field_object('field_5fdf49967e0f6')['choices'];
$restaurantDeliveryDay_options = get_field_object('field_5fdf4b9e3090f')['choices'];

require_once('custom-classes/class-posts.php');
$terms = get_terms(array(
	'taxonomy' => 'restaurant_type',
	'hide_empty' => false,
));
$facilities_options = get_terms(array(
	'taxonomy' => 'restaurant_facility',
	'hide_empty' => false,
));
$product_options = get_terms(array(
	'taxonomy' => 'restaurant_product',
	'hide_empty' => false,
));
$resTypeOptions = [];
$facilitiesOptions = [];
$productOptions = [];
$provinceOptions = [];
$restaurantDayOptions = [];
$restaurantDeliveryDayOptions = [];

foreach ($terms as $key) {
	array_push($resTypeOptions, [
		"value" => $key->term_id,
		"name" => $key->name
	]);
}
foreach ($facilities_options as $key) {
	array_push($facilitiesOptions, [
		"value" => $key->term_id,
		"name" => $key->name
	]);
}
foreach ($product_options as $key) {
	array_push($productOptions, [
		"value" => $key->term_id,
		"name" => $key->name
	]);
}
foreach ($province_options as $key) {
	array_push($provinceOptions, [
		"value" => $key,
		"name" => $key
	]);
}
foreach ($restaurantDay_options as $key) {
	array_push($restaurantDayOptions, [
		"value" => $key,
		"name" => $key
	]);
}
foreach ($restaurantDeliveryDay_options as $key) {
	array_push($restaurantDeliveryDayOptions, [
		"value" => $key,
		"name" => $key
	]);
}
$form = [
	[
		"icon" => "info",
		"label" => "ข้อมูลทั่วไป",
		"form" => [
			[
				"name" 				=> "ชื่อ_นามสกุล",
				"label" 			=> "ชื่อ นามสกุล",
				"placeholder" 		=> "ชื่อ นามสกุล",
				"type"				=> "input",
				"required"			=> true
			],
			[
				"name" 				=> "ชื่อร้าน",
				"label" 			=> "ชื่อร้าน",
				"placeholder" 		=> "ชื่อร้าน",
				"type"				=> "input",
				"required"			=> true
			],
      		[
				"name" 				=> "taxonomy-restaurant_type",
				"label" 			=> "ประเภทร้าน",
				"placeholder" 		=> "",
				"type"				=> "selectTag",
				"options"			=> $resTypeOptions,
				"required"			=> true
			],
			[
				"name" 				=> "taxonomy-restaurant_product",
				"label" 			=> "สินค้า",
				"placeholder" 		=> "",
				"type"				=> "selectTag",
				"options"			=> $productOptions,
				"required"			=> false
			],
			[
				"name" 				=> "จำนวนสาขา",
				"label" 			=> "จำนวนสาขา",
				"placeholder" 		=> "จำนวนสาขา",
				"type"				=> "number",
				"required"			=> false
			],
			[
				"name" 				=> "branchCountLastUpdate",
				"label" 			=> "อัปเดตจำนวนสาขาล่าสุดเมื่อ",
				"placeholder" 		=> "อัปเดตจำนวนสาขาล่าสุดเมื่อ",
				"type"				=> "date",
				"required"			=> false
			],
			[
				"name" 				=> "รูปภาพ",
				"label" 			=> "รูปภาพ",
				"placeholder" 		=> "",
				"type"				=> "images",
				"required"			=> false
			],
			[
				"name" 				=> "ปักหมุดแผนที่",
				"label" 			=> "ปักหมุดแผนที่",
				"placeholder" 		=> "",
				"type"				=> "map",
				"required"			=> false
			],
			[
				"name"         	=> "",
				"label"			=> "เวลาเปิด-ปิดร้าน",
				"btn-label"     => "เพิ่มเวลาเปิด-ปิดร้าน",
				"icon"        	=> get_theme_file_uri() . "/assets/images/plus-icon.svg",
				"placeholder" 	=> "",
				"type"        	=> "restaurantAvailableButton",
				"required"    	=> false
			],
			[
				"name" 				=> "restaurantAvailable",
				"type"				=> "restaurantAvailable",
				"required"			=> false
			],
			[
				"name"         	=> "",
				"label"			=> "เวลาเปิด-ปิด เดลิเวอรี่",
				"btn-label"     => "เพิ่มเเวลาเปิด-ปิด เดลิเวอรี่",
				"icon"        	=> get_theme_file_uri() . "/assets/images/plus-icon.svg",
				"placeholder" 	=> "",
				"type"        	=> "restaurantDeliveryAvailableButton",
				"required"    	=> false
			],
			[
				"name" 				=> "restaurantDeliveryAvailable",
				"type"				=> "restaurantDeliveryAvailable",
				"required"			=> false
			],
			[
				"name" 				=> "seat",
				"label" 			=> "จำนวนที่นั่ง",
				"placeholder" 		=> "จำนวนที่นั่ง",
				"type"				=> "number",
				"required"			=> false
			],
			[
				"name" 				=> "telInfo",
				"label" 			=> "ข้อมูลเบอร์โทรศัพท์",
				"placeholder" 		=> "ข้อมูลเบอร์โทรศัพท์",
				"type"				=> "telInfo",
				"required"			=> false
			],
			[
				"name" 				=> "restaurantDetail",
				"label" 			=> "รายละเอียดร้านอาหาร",
				"placeholder" 		=> "รายละเอียดร้านอาหาร",
				"type"				=> "textarea",
				"required"			=> false
			],
			[
				"name" 				=> "province",
				"label" 			=> "จังหวัด",
				"placeholder" 		=> "จังหวัด",
				"type"				=> "select",
				"options"			=> $provinceOptions,
			],
		],
	],
	[
		"icon" => "info",
		"label" => "ข้อมูลอื่นๆ",
		"form" => [
			[
				"name" 				=> "เมนูแนะนำ",
				"label" 			=> "เมนูแนะนำ",
				"placeholder"		=> "",
				"type"				=> "recommend-menus",
				"required"			=> false
			],
			[
				"name" 				=> "ช่วงราคาอาหาร",
				"label" 			=> "ช่วงราคาอาหาร",
				"placeholder" 		=> "ช่วงราคาอาหาร",
				"type"				=> "price-duration",
				"required"			=> true
			],
			[
				"name" 				=> "taxonomy-restaurant_facility",
				"label" 			=> "สิ่งอำนวนความสะดวก",
				"placeholder" 		=> "",
				"type"				=> "facilities",
				"options"			=> $facilitiesOptions,
				"required"			=> false
			],
			[
				"name" 				=> "ช่องทางติดตาม",
				"label" 			=> "ช่องทางติดตาม",
				"placeholder" 		=> "",
				"type"				=> "social",
				"required"			=> false
			],
			[
				"name" 				=> "ข้อมูลเพิ่มเติมอื่นๆ",
				"label" 			=> "ข้อมูลเพิ่มเติมอื่นๆ",
				"placeholder" 		=> "",
				"type"				=> "textarea",
				"required"			=> false
			],
		],
	]
];
?>

<body  class="w-full">
    <?php include 'truefriend-header.php'; ?>
    <!-- Set up your HTML -->
    <style>
		.collapse .collapse-content{
			display: none;
		}
		.collapse.open .collapse-icon{
			transform: rotate(180deg);
		}
		.collapse.open .collapse-content{
			display: block;
		}
    </style>
    <section class="text-white pt-32 pb-4 lg:pb-20 lg:px-48 px-4 w-full" style="background: #F2F2F2;color:var(--primary);">
		<section class="w-full flex flex-col px-6 lg:px-0">
			<h2 class="lg:text-2xl text-sm mb-2">ลงทะเบียน ร้านอาหาร</h2>
			<h1 class="lg:text-6xl text-5xl font-bold tracking-tighter mb-4">Register Restaurant</h1>
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
			
			<form action="<?= get_site_url() ?>/wp-admin/admin-post.php" id="form" method="post" novalidate enctype="multipart/form-data">
				<input type="file" accept="image/*" class="file-upload hidden" name="fileToUpload[]" multiple onchange="upload(event)">
				<input type="file" accept="image/*" class="file-upload-recommend hidden" name="fileToUploadRecommendMenu[]" multiple onchange="uploadRecommendMenu(event)">
				<?php foreach($form as $i => $f): ?>
					<div class="bg-white rounded-xl shadow-lg overflow-hidden mb-4 collapse <?= $i === 0 ? "open" : ""; ?>" collapse="<?= $i?>">
						<div class="py-6 px-6 lg:px-8 flex justify-between cursor-pointer" onclick="showStep(<?= $i?>)">
							<div class="flex w-full">
								<img class="mr-4 status" src="<?= get_theme_file_uri() ?>/assets/images/icon-<?= $f['icon']?>.svg"/>
								<div class="font-semibold"><?= $f['label']?></div>
							</div>
							<img src="<?= get_theme_file_uri() ?>/assets/images/collapse.svg" class="collapse-icon"/>
						</div>
						<div class="collapse-content">
							<hr/>
							<div class="p-4 lg:py-12 lg:px-24">
							<?php foreach($f['form'] as $input): ?>
								<div class="flex flex-wrap mb-4">
									<div class="lg:w-4/12 w-full pr-12 lg:text-right text-gray-500 py-2">
										<?php if(!empty($input['label'])) : ?>
											<?= $input['label']?>
										<?php endif; ?>
										<?php if(!empty($input['required'])) : ?>
											<?php if ($input['required'] === true) { ?>
												<span class="text-red-600">*</span>
											<?php } ?>
										<?php endif; ?>
									</div>
									<div class="lg:w-8/12 w-full">
										<?php switch($input['type']):
												case "select": ?>
													<select value="" name="<?= $input['name'] ?>" class="py-2 px-4 border rounded-lg w-full lg:w-auto" style="min-width: 50%;" <?= $input['required'] ? "required": ""?>>
														<option value="">เลือก</option>
														<?php foreach($input['options'] as $option):?>
															<option value="<?= $option['value']?>"><?= $option['name']?></option>
														<?php endforeach; ?>
													</select>
												<?php break;
												case "input": ?>
													<input value="" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required": ""?>/>
												<?php break;
												case "textarea": ?>
													<textarea rows="4" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required": ""?>></textarea>
												<?php break;
												case "number": ?>
													<input type="number" value="" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>" class="py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required": ""?>/>
												<?php break;
												case "price-duration": ?>
												<div class="flex">
													<input type="number" value="" placeholder="ราคาเริ่มต้น" name="ช่วงราคาอาหาร-priceStart" class="py-2 px-4 mr-2 border rounded-lg" <?= $input['required'] ? "required": ""?>/>
													-
													<input type="number" value="" placeholder="ราคาสิ้นสุด" name="ช่วงราคาอาหาร-priceEnd" class="py-2 px-4 ml-2 border rounded-lg" <?= $input['required'] ? "required": ""?>/>
												</div>
												<?php break;
												case "social": ?>
													<input value="" name="ช่องทางติดตาม-facebook_page" placeholder="Facebook Page" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required": ""?>/>
													<input value="" name="ช่องทางติดตาม-line" placeholder="Line" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required": ""?>/>
													<input value="" name="ช่องทางติดตาม-website" placeholder="Website" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required": ""?>/>
													<input value="" name="ช่องทางติดตาม-instagram" placeholder="Instagram" class="my-2 py-2 px-4 border rounded-lg w-full" <?= $input['required'] ? "required": ""?>/>
												<?php break;
												case "facilities": ?>
													<div class="flex flex-wrap border rounded-lg" >
														<?php foreach ($input['options'] as $option) { ?>
															<div class="flex items-center p-4" style="border-color:rgba(0, 0, 0, 0.08);">
																<input type="checkbox" name="<?= $input['name'] ?>[]" value="<?= $option['name']?>" class="mr-3"> 
																<label for="facilities"><?= $option['name']?></label>
															</div>
														<?php } ?>
													</div>
												<?php break;
												case "selectTag": ?>
													<select multiple="multiple" id="<?= $input['name'] ?>" value="" name="<?= $input['name'] ?>[]" style="min-width: 50%;" <?= $input['required'] ? "required": ""?>>
														<option value="">เลือก</option>
														<?php foreach($input['options'] as $option):?>
															<option value="<?= $option['name']?>"><?= $option['name']?></option>
														<?php endforeach; ?>
													</select>
												<?php break;
												case "map": ?>
													<div id="map" style="background-color:#C4C4C4;" class="flex items-center justify-center h-96"></div>
        											<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3pXEQOhjrbzcdYXvB-K6T336pRJx0XJ0&callback=initMap&libraries=&v=weekly" async></script>
													<input type="hidden" id="ปักหมุดแผนที่" name="<?= $input['name'] ?>" />
												<?php break;
												case "images": ?>
													<div class="flex flex-wrap" id="showpic">
														<button type="button" class="w-full mb-3 md:w-1/3 h-24 p-2 md:p-4 block items-center justify-center border-2 rounded-lg hover:bg-gray-50 focus:outline-none" id="uploadimg">
															<div class="flex items-center justify-center">
																<img class="w-4 h-4 md:w-6 md:h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-upload.svg" />
															</div>
															<p class="my-2">เพิ่มรูปภาพ</p>
														</button>
													</div>
												<?php break;
												case "recommend-menus": ?>
													<div class="flex flex-wrap" id="showpicRecommendMenu">
														<button type="button" class="w-full mb-3 md:w-1/3 h-24 p-2 md:p-4 block items-center justify-center border-2 rounded-lg hover:bg-gray-50 focus:outline-none" id="uploadimgRecommendMenu">
															<div class="flex items-center justify-center">
																<img class="w-4 h-4 md:w-6 md:h-6" src="<?= get_theme_file_uri() ?>/assets/images/icon-upload.svg" />
															</div>
															<p class="my-2">เพิ่มรูปภาพ</p>
														</button>
													</div>
												<?php break;
												case "telInfo": ?>
													<div class="block md:flex">
														<input value="" name="telInfo-telNo" class="py-2 px-4 mb-2 md:mr-2 border rounded-lg" placeholder="เบอร์โทรศัพท์" <?= $input['required'] ? "required": ""?>/>
														<input value="" name="telInfo-telOwner" class="py-2 px-4 mb-2 md:ml-2 border rounded-lg" placeholder="ชื่อเจ้าของเบอร์โทรศัพท์" <?= $input['required'] ? "required": ""?>/>
													</div>
												<?php break;
												case "date": ?>
													<div class="flex">
														<input type="date" id="<?= $input['name'] ?>" name="<?= $input['name'] ?>" class="py-2 px-4 mr-2 border rounded-lg" <?= $input['required'] ? "required": ""?>>
													</div>
												<?php break;
												case "restaurantAvailableButton": ?>
													<button type="button" id="addbox" class="flex items-center text-base font-bold"><?= isset($input['icon']) ? '<img class="w-5 h-5 mr-3" src="' . $input['icon'] . '" />' : '' ?> <?= $input['btn-label'] ?></button>
												<?php break;
												case "restaurantAvailable": ?>
													<p id="restaurantAvailable-repeater"></p>
												<?php break;
												case "restaurantDeliveryAvailableButton": ?>
													<button type="button" id="addboxDelivery" class="flex items-center text-base font-bold"><?= isset($input['icon']) ? '<img class="w-5 h-5 mr-3" src="' . $input['icon'] . '" />' : '' ?> <?= $input['btn-label'] ?></button>
												<?php break;
												case "restaurantDeliveryAvailable": ?>
													<p id="restaurantDeliveryAvailable-repeater"></p>
												<?php break;
													default:
										endswitch; ?>
									</div>
								</div>
							<?php endforeach; ?>
							
							</div>
							<?php if($i < count($form)-1):?>
								<hr class="mx-4 lg:mx-8"/>
								<div type="next" class="p-3 lg:px-8 lg:py-6 flex justify-center w-full font-semibold cursor-pointer" onclick="showStep(<?= $i+1?>)">
									ถัดไป
									<img src="<?= get_theme_file_uri() ?>/assets/images/right.svg" class="ml-4"/>
							</div>
							<?php endif;?>
						</div>
					</div>
				<?php endforeach; ?>
				<hr class="mx-8">
				<div class="my-6 text-center">
					<input type="hidden" name="action" value="restaurant_register" />
					<input type="hidden" name="id" value="" />
					<input type="hidden" name="title" value="ชื่อ" />
					<input type="hidden" name="post_type" value="restaurants" />
					<input type="hidden" name="redirect" value="restaurant-hub" />
					<button type="submit" class="rounded-full px-8 py-3 px-28 bg-white text-lg" style="background: #FFD950;">ลงทะเบียน</button>
				</div>
			</form>
		</section>
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

	let boxIdx = 0;
	let boxIdxDelivery = 0;

	function generateRestaurantAvailable() {
		console.log('start', boxIdx);
		$("#restaurantAvailable-repeater").append(`
			<div class="flex flex-wrap md:block p-8 mb-8 relative" style="border-radius:4px;box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25);">
				<div class="absolute right-0 top-0 -mr-2 -mt-2 cursor-pointer deletebox"><img src="<?= get_theme_file_uri() ?>/assets/images/circle-cross.svg" alt=""></div>
				<div class="flex my-2">
					<span class="text-gray-500 mr-2">วันเปิด: </span>
					<select value="" name="restaurantAvailable-restaurantDay[${boxIdx}]" class="py-2 px-4 border rounded-lg w-full lg:w-auto" style="min-width: 50%;" <?= $input['required'] ? "required": ""?>>
						<option value="">เลือก</option>
						<?php foreach($restaurantDayOptions as $option):?>
							<option value="<?= $option['value']?>"><?= $option['name']?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="flex my-2">
					<span class="text-gray-500 mr-2">เวลาเปิด: </span><input type="time" name="restaurantAvailable-restaurantOpen[${boxIdx}]" class="py-2 px-4 mr-2 border rounded-lg" <?= $input['required'] ? "required": ""?>>
				</div>
				<div class="flex">
					<span class="text-gray-500 mr-2">เวลาปิด: </span><input type="time" name="restaurantAvailable-restaurantClose[${boxIdx++}]" class="py-2 px-4 mr-2 border rounded-lg" <?= $input['required'] ? "required": ""?>>
				</div>
			</div>
		`);
	}

	function generateRestaurantDeliveryAvailable() {
		console.log('start', boxIdx);
		$("#restaurantDeliveryAvailable-repeater").append(`
			<div class="flex flex-wrap md:block p-8 mb-8 relative" style="border-radius:4px;box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25);">
				<div class="absolute right-0 top-0 -mr-2 -mt-2 cursor-pointer deleteboxDelivery"><img src="<?= get_theme_file_uri() ?>/assets/images/circle-cross.svg" alt=""></div>
				<div class="flex my-2">
					<span class="text-gray-500 mr-2">วันเปิด: </span>
					<select value="" name="restaurantDeliveryAvailable-restaurantDeliveryDay[${boxIdxDelivery}]" class="py-2 px-4 border rounded-lg w-full lg:w-auto" style="min-width: 50%;" <?= $input['required'] ? "required": ""?>>
						<option value="">เลือก</option>
						<?php foreach($restaurantDeliveryDayOptions as $option):?>
							<option value="<?= $option['value']?>"><?= $option['name']?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="flex my-2">
					<span class="text-gray-500 mr-2">เวลาเปิด: </span><input type="time" name="restaurantDeliveryAvailable-restaurantDeliveryOpen[${boxIdxDelivery}]" class="py-2 px-4 mr-2 border rounded-lg" <?= $input['required'] ? "required": ""?>>
				</div>
				<div class="flex">
					<span class="text-gray-500 mr-2">เวลาปิด: </span><input type="time" name="restaurantDeliveryAvailable-restaurantDeliveryClose[${boxIdxDelivery++}]" class="py-2 px-4 mr-2 border rounded-lg" <?= $input['required'] ? "required": ""?>>
				</div>
			</div>
		`);
	}

	generateRestaurantAvailable();
	generateRestaurantDeliveryAvailable();


	$("#addbox").click(function() {
		generateRestaurantAvailable();
	});
	$("#addboxDelivery").click(function() {
		generateRestaurantDeliveryAvailable();
	});

	$("p").on('click', '.deletebox', function() {
		$(this).parent().remove();
	});
	$("p").on('click', '.deleteboxDelivery', function() {
		$(this).parent().remove();
	});

	//รูปภาพ && เมนูแนะนำ
	$("div").on('click', '.deletepic', function() {
		$("#form").append(`<input name="fileNotToUpload[]" type="number" value="${$(this).attr('imgIndex')}" class="hidden" >`);
		$(this).parent().remove();
	});

	$("div").on('click', '.deletepicRecommendMenu', function() {
		$("#form").append(`<input name="fileNotToUploadRecommendMenu[]" type="number" value="${$(this).attr('imgIndexRecommendMenu')}" class="hidden" >`);
		$(this).parent().remove();
	});

	let imgIndex = 0;
	let imgIndexRecommendMenu = 0;

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

	function uploadRecommendMenu(event) {
		const files = event.target.files;
		for (let i = 0; i < event.target.files.length; i++) {
			let src = URL.createObjectURL(event.target.files[i]);
			$("#showpicRecommendMenu").append(`
				<div class="w-1/3 h-24 px-3 mb-3 l-2 relative">
					<img src="${src}" class="w-full h-full object-cover rounded-lg" />
					<div class="absolute top-0 right-0 mr-1 -mt-2 cursor-pointer deletepicRecommendMenu" imgIndexRecommendMenu="${imgIndexRecommendMenu++}"><img src="<?= get_theme_file_uri() ?>/assets/images/circle-cross.svg" alt=""></div>
				</div>
			`);
		}
		$("#form").append('<input type="file" accept="image/*" class="file-upload-recommend hidden" name="fileToUploadRecommendMenu[]" onchange="uploadRecommendMenu(event)" multiple>');
	}
	
	$(document).ready(function(){
		$("#uploadimg").click(function() {
			$(".file-upload:last").trigger('click');
		});
		$("#uploadimgRecommendMenu").click(function() {
			$(".file-upload-recommend:last").trigger('click');
		});
		$('#taxonomy-restaurant_type').selectize({
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
		$('#taxonomy-restaurant_product').selectize({
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
