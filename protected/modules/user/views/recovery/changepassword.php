<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Изменение пароля");
$this->breadcrumbs=array(
	UserModule::t("Вход на сайт") => array('/user/login'),
	UserModule::t("Изменить пароль"),
);
?>




<div class="form">
<?php echo CHtml::beginForm('','post',array('class'=>'form-horizontal')); ?>
<fieldset>
	<legend><?php echo UserModule::t("Изменение пароля"); ?><span class="note"><?php echo UserModule::t("Минимальная длина пароля - 4 символа"); ?></span></legend>
	
	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="control-group">
	<?php echo CHtml::activeLabelEx($form,'password'); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form,'password'); ?>
		</div>
	</div>
	
	<div class="control-group">
	<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
		<div class="controls">	
			<?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
		</div>
	</div>
	
	
	<div class="form-actions">
	<?php echo CHtml::submitButton(UserModule::t("Сохранить"), array('class'=>'btn btn-primary btn-large')); ?>
	</div>
</fieldset>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->