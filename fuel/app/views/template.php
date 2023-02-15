<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('style.css'); ?>
	<?php echo Asset::js('style.js'); ?>
	<style>
		body { margin: 40px; }
	</style>
	<script type="text/javascript" src="/assets/js/knockout-3.5.1.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="col-md-12">
			<li>
			<?php echo Html::anchor('/photo', 'Travelapp', array('class' => 'title')); ?>
				<ul class="post-btn">
					<?php echo Html::anchor('photo/create', '投稿', array('class' => 'btn btn-success')); ?>
				</ul>
				<?php if(!Auth::check()): ?>
					<ul>
						<li class="header-btn">
							<?php echo Html::anchor('user/login', 'ログイン', array('class' => 'btn btn-success')); ?>
							<?php echo Html::anchor('user/create', '新規登録', array('class' => 'btn btn-success')); ?>
						</li>
					</ul>
				<?php else: ?>
					<ul>
						<li class="header-btn">
							<?php echo Html::anchor('user/logout', 'ログアウト', array('class' => 'btn btn-success')); ?>
							<!-- <?php echo Html::anchor('user/view', 'マイページ', array('class' => 'btn btn-success')); ?> -->
						</li>
					</ul>
				<?php endif; ?>

			</li>
			<hr>

			<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<strong>Success</strong>
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
			<?php endif; ?>
			</div>
			<div class="col-md-12">
				<?php echo $content; ?>
			</div>
		<footer>
			<!-- <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p> -->
			<p>
				<a href="https://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
