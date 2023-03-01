<h2 class="title">詳細</h2>

	<label class="post-information">場所:</label>
	<div class="field"><?php echo $photo->place; ?></div></br>
	<label class="post-information">コメント:</label>
	<div class="field"><?php echo $photo->comment; ?></div></br>
	<label class="post-information">作成日時:</label>
	<div class="field"><?php echo date('Y年m月d日 H時i分'); ?></div>
	<?php if ($upload !== array()) :?>
	<img class="img" src=<?php echo $upload[0]['path'].'/'.$upload[0]['file_name']; ?>>
	<?php endif; ?>

<?php echo Html::anchor('photo/edit/'.$photo->id, '編集'); ?> |
<?php echo Html::anchor('photo', '戻る'); ?>