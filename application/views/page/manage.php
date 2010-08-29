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
	<? $settings = $page->settings ?>
	<div class="node">
		<div class="label">
			<?= form::label('page_settings_align', 'Align') ?>
		</div>
		<div class="input">
			<?= form::text('page[settings][align]', $settings['align'], array('id' => 'page_settings_align')) ?>
		</div>
	</div>
	
	<div class="node">
		<?= form::submit('page[submit]', 'send', array('id' => 'page_submit')) ?>
	</div>
</form>