<!--
<script src="jscript/jquery/jquery.js"></script>
<script src="jscript/bootstrap/bootstrap.min.js"></script>
<script src="jscript/jquery/plugins/easing/jquery.easing.1.3.js"></script>
<script src="jscript/jquery/plugins/jpushmenu/jpushmenu.js"></script>
<script src="jscript/jquery/plugins/jpushmenu/v2p.js"></script>
<script src="<?php echo 'templates/'.CURRENT_TEMPLATE.'/javascript/vamshop.js'; ?>"></script>
-->

<script src="<?php echo 'templates/'.CURRENT_TEMPLATE.'/javascript/jquery-3.3.1.slim.min.js'; ?>"></script>
<script src="<?php echo 'templates/'.CURRENT_TEMPLATE.'/javascript/popper.min.js'; ?>"></script>
<script src="<?php echo 'templates/'.CURRENT_TEMPLATE.'/javascript/bootstrap.min.js'; ?>"></script>

<script src="jscript/jquery/plugins/owl/owl.carousel.min.js"></script>

<script src="<?php echo 'templates/'.CURRENT_TEMPLATE.'/javascript/all.js.php'; ?>"></script>

<?php if (AJAX_CART == 'true') { ?>
<script src="<?php echo 'templates/'.CURRENT_TEMPLATE.'/javascript/jscript_ajax_cart.js'; ?>"></script>
<?php } ?>

<?php
if (strstr($PHP_SELF, FILENAME_PRODUCT_INFO)) {
?>
<script src="jscript/jquery/plugins/colorbox/jquery.colorbox-min.js"></script>
<?php
if (file_exists(DIR_FS_CATALOG.'jscript/jquery/plugins/colorbox/i18n/jquery.colorbox-'.$_SESSION['language_code'].'.js')) {
?>
<script src="jscript/jquery/plugins/colorbox/i18n/jquery.colorbox-ru.js"></script>
<?php } ?>
<script>
// Make ColorBox responsive
	jQuery.colorbox.settings.maxWidth  = '95%';
	jQuery.colorbox.settings.maxHeight = '95%';

	// ColorBox resize function
	var resizeTimer;
	function resizeColorBox()
	{
		if (resizeTimer) clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
				if (jQuery('#cboxOverlay').is(':visible')) {
						jQuery.colorbox.load(true);
				}
		}, 300);
	}

	// Resize ColorBox when resizing window or changing mobile device orientation
	jQuery(window).resize(resizeColorBox);
	
$(document).ready(function(){
  $(".lightbox").colorbox({rel:"lightbox", title: false});
  $(".iframe").colorbox({iframe:true, width:"30%", height:"80%"});
});
</script>
<?php
 }
?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="<?php echo 'templates/'.CURRENT_TEMPLATE.'/javascript/html5.js'; ?>"></script>
<![endif]-->