<?php $this->beginContent('//layouts/main'); ?>
	<div class="row">
		<div class="span2">
			<div id="sidebar">		
				<?php		
					if (!Yii::app()->user->isGuest) {
				
						$this->widget('bootstrap.widgets.BootMenu', array(
							'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
							'stacked'=>true, // whether this is a stacked menu
							'items'=>array(
								array('label'=>'Мой профиль', 'url'=>array('/user/profile/profile')),
								array('label'=>'Мои заказы', 'url'=>array('/order/index')),
								array('label'=>'Блог', 'url'=>array('/blog/last')),
								array('label'=>'О компании', 'url'=>array('/site/about')),
								array('label'=>'Контакты', 'url'=>array('/site/contact')),
								array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>'Войти', 'visible'=>Yii::app()->user->isGuest),
								array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>'Регистрация', 'visible'=>Yii::app()->user->isGuest),
							),
						));

						if (UserModule::isAdmin()) {
								
							$this->widget('bootstrap.widgets.BootMenu', array(
								'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
								'stacked'=>true, // whether this is a stacked menu
								'items'=>$this->menu,
							));
						
						}
					}
				?>
				<!-- VK Widget>
				<div id="vk_groups"></div>
				<script type="text/javascript">
				VK.Widgets.Group("vk_groups", {mode: 0, width: "160", height: "290"}, 7987036);
				</script>
				<!-- end of VK Widget -->
			</div><!-- sidebar -->
		</div>
		<div class="span10">
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
					'htmlOptions'=>array('class'=>'breadcrumb'),
					'separator'=>'<span class="divider">/</span>',
					'homeLink'=>false,
				)); ?><!-- breadcrumbs -->
			<?php endif?>

			<?php echo $content; ?>
		</div>	
	</div>
<?php $this->endContent(); ?>