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
			//'fixed'=>true,
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
				<div class="span2 offset2">
					<span>Статьи:</span>
					<ul>
					<?php /*
						$blogs = Blog::model()->findAll('enabled = true');
						$count = 0;
						foreach (array_reverse($blogs) as $blog) {
							$count++;
							if ($count == 6) exit;
							$active = '';
							$url = $this->createUrl('/blog/view',array('id'=>$blog->blog_id));
							echo '<li>'.CHtml::link($blog->name,array('/blog/view','id'=>$blog->blog_id)).'</li>';
						}
						echo '<li>'.CHtml::link('<b>Все статьи &raquo;</b>',array('/blog/index')).'</li>';
					*/?>
					</ul>
				</div>
				<div class="span2">
					<span>О компании:</span>
					<ul>
						<?php
							echo '<li>'.CHtml::link('Контакты',array('/site/contact')).'</li>';
							echo '<li>'.CHtml::link('О компании',array('/site/about')).'</li>';						
							echo '<li>'.CHtml::link('Наши расценки',array('/site/prices')).'</li>';
							echo '<li>'.CHtml::link('Дополнительные услуги',array('/site/services')).'</li>';
						?>
					</ul>					
				</div>
				<div class="span3 offset3">
					<p class="pull-right"><?php echo CHtml::link('Фотоходы','http://fotohody.ru',array('target'=>'_blank')); ?> &copy; 2009-<?php echo date('Y'); ?></p>
					<div class="clearfix"></div>
					<p class="pull-right">Сайт сделан в <?php echo CHtml::link('justvamp.ru','http://justvamp.ru',array('target'=>'_blank')); ?></p>
					<div class="clearfix"></div>
					<p class="pull-right"><?php echo Yii::powered(); ?></p>
					<div class="clearfix"></div>
					<p class="pull-right">CSS: <?php echo CHtml::link('Twitter Bootstrap 2.0','http://twitter.github.com/bootstrap/',array('target'=>'_blank')); ?></p>
					<div class="clearfix"></div>
					<div class="pull-right">
						<a target="_blank" href="http://vk.com/fotohody" title="Фотоходы Вконтакте"><span class="social-button" style="background: url(/img/icons.png) -224px 0;"></span></a>
						<span class="social-button" style="background: url(/img/icons.png) -0px 0;"></span>
						<span class="social-button" style="background: url(/img/icons.png) -64px 0;"></span>
						<span class="social-button" style="background: url(/img/icons.png) -192px 0;"></span>
					</div>
				</div>				
			</div>
		</div>
	</footer>
	
</body>
</html>
