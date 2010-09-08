<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html>
<!--
	***************************************************
	HTML, CSS and cropped images provided by Binoculars
	***************************************************
	http://binoculars.antpaw.org/
	***************************************************
-->
<html>
	<head>
		<meta charset="utf-8">
		<title><?= $settings['page_title'] ?></title>
		<style>
			body, img {
				padding: 0;
				margin: 0;
				display: block;
			}
			body {
				background: url(data:image/png;base64,<?= $page->background_base64 ?>);
			}
			img {
				<? if ($settings['layout_align'] === 'center'): ?>
				margin: 0 auto;
				<? elseif ($settings['layout_align'] === 'right'): ?>
				float: right;
				<? endif ?> 
			}
		</style>
	</head>
	<body>
		<img src="data:image/png;base64,<?= $page->layout_base64 ?>">
	</body>
</html>