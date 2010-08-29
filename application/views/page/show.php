<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?= '' ?></title>
		<style>
			body, img {
				padding: 0;
				margin: 0;
				display: block;
			}
			body {
				background: red;
			}
			<? if (TRUE): ?>
			img {
				margin: 0 auto;
			}
			<? endif ?> 
			#main {
				background: url(data:image/png;base64,<?= $page->background_base64 ?>);
			}
		</style>
	</head>
	<body>
		<div id="main">
			<img src="data:image/png;base64,<?= $page->layout_base64 ?>">
		</div>
	</body>
</html>