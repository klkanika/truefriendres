
<?php 
	$defaultImage = get_theme_file_uri()."/assets/images/img-default.jpg";
?>
<style>
    .noImg {
      background-color: #D3D3D3 !important;
      max-width: 290px !important;
      height: 20rem !important;
    }
</style>
<div>
	<?= the_content() ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
	var current = "text";
	var test = $('#content-section').children().filter(function() {
		return $("#content-section img").on("error", function() {
			$(this).addClass('noImg');
		});
	});
	
})
</script>