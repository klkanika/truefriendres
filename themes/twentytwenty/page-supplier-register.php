<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Suppliers Register</title>
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>
<?php
require_once('custom-classes/class-posts.php');
$args = array(
	'taxonomy' => 'suppliertypes',
	'orderby' => 'name',
	'order'   => 'ASC'
);
$suppliertypes = get_categories($args);
$restaurantCategoriesObject = acf_get_field('restaurant_101_category');
$restaurantCategories = $restaurantCategoriesObject['choices'];

$suppliersObject = Post::getPostsByCategory('suppliers', null, 10, 0, null);
$suppliers = $suppliersObject->posts;
$form = [
	[
		"icon" => "info",
		"label" => "ข้อมูลทั่วไป",
		"form" => [
			[
				"name" 				=> "",
				"label" 			=> "ประเภทกิจการ",
				"placeholder" => "",
				"type"				=> "select",
				"options"			=> ["ร้านอาหาร", "ร้านกาแฟ"],
				"required"		=> true
			],
			[
				"name" 				=> "",
				"label" 			=> "ชื่อธุรกิจ",
				"placeholder" => "ชื่อธุรกิจ",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "",
				"label" 			=> "แนะนำธุรกิจ",
				"placeholder" => "",
				"type"				=> "textarea",
				"required"		=> false
			],
		],
	],
	[
		"icon" => "check",
		"label" => "การจัดส่ง",
		"form" => [
			[
				"name" 				=> "",
				"label" 			=> "ประเภทกิจการ",
				"placeholder" => "",
				"type"				=> "select",
				"options"			=> ["ร้านอาหาร", "ร้านกาแฟ"],
				"required"		=> true
			],
			[
				"name" 				=> "",
				"label" 			=> "ชื่อธุรกิจ",
				"placeholder" => "ชื่อธุรกิจ",
				"type"				=> "input",
				"required"		=> false
			],
			[
				"name" 				=> "",
				"label" 			=> "แนะนำธุรกิจ",
				"placeholder" => "",
				"type"				=> "textarea",
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
			<form action="<?= get_site_url() ?>/wp-admin/admin-post.php" method="post">
				<?php foreach ($form as $i => $f) : ?>
					<div class="bg-white rounded-xl shadow-lg overflow-hidden mb-4 collapse <?= $i === 0 ? "open" : ""; ?>" collapse="<?= $i ?>">
						<div class="py-6 px-6 lg:px-8 flex justify-between cursor-pointer" onclick="showStep(<?= $i ?>)">
							<div class="flex w-full">
								<img class="mr-4" src="<?= get_theme_file_uri() ?>/assets/images/icon-<?= $f['icon'] ?>.svg" />
								<div class="font-semibold"><?= $f['label'] ?></div>
							</div>
							<img src="<?= get_theme_file_uri() ?>/assets/images/collapse.svg" class="collapse-icon" />
						</div>
						<div class="collapse-content">
							<hr />
							<div class="p-4 lg:py-12 lg:px-24">
								<?php foreach ($f['form'] as $input) : ?>
									<div class="flex flex-wrap mb-4">
										<div class="lg:w-4/12 w-full pr-12 lg:text-right text-gray-500 py-2"><?= $input['label'] ?></div>
										<div class="lg:w-8/12 w-full">
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
				<div class="py-6 px-8">
					<label class="checkbox font-semibold">
						<input type="checkbox" name="send-email">
						<span class="checkmark"></span>
						รับข่าวสารเพิ่มเติมทาง Email
					</label>
				</div>
				<hr class="mx-8">
				<div class="my-6 text-center">
					<input type="hidden" name="action" value="supplier_register">
					<button type="submit" class="rounded-full px-8 py-3 px-28 bg-white text-lg" style="background: #FFD950;">ลงทะเบียน</button>
				</div>
			</form>
		</section>
	</section>
	<?php include 'truefriend-footer.php'; ?>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
	// function nextStep(step){
	// 	// console.log($(this).parents('collapse'))
	// 	showStep(step)
	// }
	function showStep(step) {
		$('.collapse').removeClass('open')
		$(`.collapse[collapse=${step}]`).addClass('open')
	}
</script>

<?php
// Create post object
// $my_post = array(
//     'post_title' => wp_strip_all_tags('โย่วๆ'),
//     'post_type' => 'suppliers',
//     'post_status' =>  'submitted'
// );

// // Insert the post into the database
// $the_post_id = wp_insert_post($my_post);
// update_field('ชื่อธุรกิจ', 'Tom', $the_post_id);
// update_field('แนะนำธุรกิจ', 'อิอิซ่า', $the_post_id);
// $value = array("ไต้หวัน");
// update_field('ประเทศ', $value, $the_post_id);
// $value = array("ภาคใต้");
// update_field( 'สถานที่จัดส่ง', $value, $post_id );

?>