<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Not Found</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>
<?php
$searchQuery = get_search_query();
?>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full" style="background-color: #262145;">
	<?php if(!empty($searchQuery)) :?>
		<div class="flex flex-col my-8 lg:px-40 px-8">
			<span class="text-xl mb-2 font-thin">Search</span>
			<span class="text-5xl font-extrabold"><?=$searchQuery ?></span>
		</div>
	<?php else :?>
		<div class="flex flex-col my-8 lg:px-40 px-8">
			<span class="text-5xl font-extrabold">Page Not Found</span>
		</div>
	<?php endif; ?>
    <div class="bg-white text-black mx-auto">
		<p class="text-center w-full py-24">ไม่พบข้อมูล</p>
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
