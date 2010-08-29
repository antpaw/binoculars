<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div style="background: url(data:image/png;base64,<?= $page->background_base64 ?>)">
	<img src="data:image/png;base64,<?= $page->layout_base64 ?>">
</div>

<?= form::open(NULL, array('enctype' => 'multipart/form-data')) ?>
	<div class="node">
		<div class="label">
			<?= form::label('page_layout', 'Select your layout') ?>
		</div>
		<div class="input">
			<?= form::file('layout', array('id' => 'page_layout')) ?>
		</div>
	</div>
	<div class="node">
		<?= form::submit('page[submit]', 'send', array('id' => 'page_submit')) ?>
	</div>
</form>