<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?= form::open(NULL, array('enctype' => 'multipart/form-data', 'class' => 'form')) ?>
	<div class="node">
		<div class="label">
			<?= form::label('page_layout', 'Select your layout') ?>
		</div>
		<div class="input">
			<?= form::file('layout', array('id' => 'page_layout')) ?>
		</div>
	</div>
	<div class="node">
		<div class="label">
			Alignment of the layout
		</div>
		<div class="input">
			<?= form::radio('page[settings][layout_align]', 'left', $settings['layout_align'] === 'left', array('id' => 'page_settings_layout_align_left')) ?>
			<?= form::label('page_settings_layout_align_left', 'Left') ?>
			<?= form::radio('page[settings][layout_align]', 'center', $settings['layout_align'] === 'center', array('id' => 'page_settings_layout_align_center')) ?>
			<?= form::label('page_settings_layout_align_center', 'Center') ?>
			<?= form::radio('page[settings][layout_align]', 'right', $settings['layout_align'] === 'right', array('id' => 'page_settings_layout_align_right')) ?>
			<?= form::label('page_settings_layout_align_right', 'Right') ?>
		</div>
	</div>
	<div class="node">
		<div class="label">
			Crop background from
		</div>
		<div class="input">
			<?= form::radio('page[settings][bg_align]', 'left', $settings['bg_align'] === 'left', array('id' => 'page_settings_bg_align_left')) ?>
			<?= form::label('page_settings_bg_align_left', 'Left') ?>
			<?= form::radio('page[settings][bg_align]', 'right', $settings['bg_align'] === 'right', array('id' => 'page_settings_bg_align_right')) ?>
			<?= form::label('page_settings_bg_align_right', 'Right') ?>
		</div>
	</div>
	<div class="node">
		<div class="label">
			<?= form::label('page_settings_bg_width', 'Background width') ?>
		</div>
		<div class="input">
			<?= form::input('page[settings][bg_width]', $settings['bg_width'], array('id' => 'page_settings_bg_width')) ?>
		</div>
	</div>
	
	<div class="node">
		<div class="label"></div>
		<div class="input">
			<?= form::submit('page[submit]', 'Create!', array('id' => 'page_submit')) ?>
		</div>
	</div>
</form>