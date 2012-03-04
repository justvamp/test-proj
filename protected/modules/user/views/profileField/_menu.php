<ul class="actions">
	<li><?php echo CHtml::link(UserModule::t('Администрирование пользователей'),array('/user/admin')); ?></li>
	<li><?php echo CHtml::link(UserModule::t('Администрирование полей профиля'),array('admin')); ?></li>
<?php 
	if (isset($list)) {
		foreach ($list as $item)
			echo "<li>".$item."</li>";
	}
?>
</ul><!-- actions -->