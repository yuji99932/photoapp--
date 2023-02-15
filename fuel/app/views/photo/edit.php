<h2>編集</h2>
<br>

<?php echo render('photo/_form'); ?>
<p>
	<?php echo Html::anchor('photo/view/'.$photo->id, '詳細'); ?> |
	<?php echo Html::anchor('photo', '戻る'); ?></p>
