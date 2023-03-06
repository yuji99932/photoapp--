<h1>ユーザー登録</h1>

<?php echo Form::open('user/create'); ?>
<dl>
<dt><?php echo Form::label('email', 'email'); ?></dt>
<dd><?php echo Form::Input('email'); ?></dd>
<dt><?php echo Form::label('username', 'username'); ?></dt>
<dd><?php echo FOrm::Input('username'); ?></dd>
<dt><?php echo Form::label('password', 'password'); ?></dt>
<dd><?php echo Form::password('password'); ?></dd>
</dl>
<p><?php echo Form::submit('submit', '登録する'); ?></p>
<?php echo Form::close(); ?>