<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('user/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('user/create','Create');?></li>
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('user/login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('user/logout','Logout');?></li>

</ul>
<p>Index</p>