<h2 class="title">詳細</h2>

<p>
	<strong>場所:</strong>
	<?php echo $photo->place; ?></p>
	<strong>コメント:</strong>
	<?php echo $photo->comment; ?></p>
	<strong>作成日時:</strong>
	<?php echo date('Y年m月d日 H時i分'); ?></p>

<?php echo Html::anchor('photo/edit/'.$photo->id, '編集'); ?> |
<?php echo Html::anchor('photo', '戻る'); ?>