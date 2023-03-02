<h1>ログイン</h1>

<?php echo Form::open('user/login'); ?>
<dl>
<dt><?php echo Form::label('username', 'username'); ?></dt>
<dd><?php echo FOrm::Input('username'); ?></dd>
<dt><?php echo Form::label('password', 'password'); ?></dt>
<dd><?php echo Form::password('password'); ?></dd>
</dl>
<p><?php echo Form::submit('submit', 'ログイン'); ?></p>
<?php echo Form::close(); ?>