<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?= form::open(NULL, array('enctype' => 'multipart/form-data')) ?>
	<?= form::file('layout') ?>
	<?= form::submit('submit', 'send') ?>
</form>