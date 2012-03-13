<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<meta type="keywords" content="Фотоходы, Вологда, фотопечать, сервис онлайн-фотопечати, печать фотографий" />
	<meta type="description" content="Фотоходы - сервис онлайн-фотопечати фотографий в Вологде">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<!--script type="text/javascript" src="http://userapi.com/js/api/openapi.js"></script-->
	
	<title><?php echo CHtml::encode($this->pageTitle); echo ' :: '; echo Yii::app()->params['siteTitle']; ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	
</head>

<body>

	<?php
		$userName = '';
		if (!Yii::app()->user->isGuest) {
			$userName = UserModule::user()->profile->getAttribute('firstname').' '.UserModule::user()->profile->getAttribute('lastname');
		}
		// панель навигации сайта
		$this->widget('bootstrap.widgets.BootNavbar', array(
			'fixed'=>false,
			'brand'=>'&nbsp;'.Yii::app()->name,
			//'brandUrl'=>'/site/index',
			'collapse'=>false, // requires bootstrap-responsive.css
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.BootMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
						array(
							'visible'=>!Yii::app()->user->isGuest,
							'label'=>$userName,
							'url'=>'#',
							'items'=>array(
								array('url'=>array('/user'), 'label'=>'Список пользователей','visible'=>UserModule::isAdmin()),
								array('label'=>'Права', 'url'=>array('/rights'),'visible'=>UserModule::isAdmin()),
								array('url'=>array('/user/profile/profile'), 'label'=>'Смотреть профиль'),
								array('url'=>array('/user/profile/edit'), 'label'=>'Редактировать профиль'),
								array('url'=>array('/user/profile/changepassword'), 'label'=>'Изменить пароль'),
								'---',
								array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>'Выйти'),
							),
						),
					),

				),
			),
		));
	?>
	
	
	<div class="container">
		<?php echo $content; ?>
		<div class="footer-holder"></div>
	</div><!-- page -->
	
	<footer class="footer">
		<div class="container">
			<br />
			<div class="row">
				<div class="span4 offset5">
					<span class="smaller">Сауны в Вологде &copy; 2011-<?php echo date('Y'); ?></span>
				</div>
			</div>
		</div>
	</footer>
	
</body>
</html>
