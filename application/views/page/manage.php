<?php defined('SYSPATH') or die('No direct script access.'); ?>
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