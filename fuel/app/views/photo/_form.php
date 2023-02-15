<?php echo Form::open(array("class"=>"form-horizontal", 'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('場所', 'place', array('class'=>'control-label')); ?>

			<?php echo Form::input('place', Input::post('place', isset($photo) ? $photo->place : ''), array('class' => '', 'placeholder'=>'場所')); ?>

			<?php echo Form::label('コメント', 'comment', array('class'=>'control-label')); ?>

			<?php echo Form::input('comment', Input::post('comment', isset($photo) ? $photo->comment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'コメント')); ?>

			<?php echo Form::open(array('type'=>'file','name'=>'upload','action'=>'image/upload','method'=>'post')); ?>
		

			<div class=&quot;form-group row&quot;>
				<div class=&quot;col-md-12&quot;>
					<label for=&quot;exampleInputFile&quot;>アップロードするファイル</label>
					<?php echo Form::file('upload'); ?>
				</div>
			</div>
			<?php echo Form::close(); ?>

			<!-- <form enctype="multipart/form-data" action="" method="post">
				<input name="upload" type="file">
				<input type="submit" value="送信" value="Upload">
			</form> -->

			<?php if (isset($html_error)): ?>
				<div class=&quot;alert alert-danger&quot;><ul><?php echo $html_error; ?></ul></div>
			<?php endif; ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '投稿', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>