<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Профиль") => array('/user/profile'),
	UserModule::t("Изменить пароль"),
);
?>


<?php //echo $this->renderPartial('menu'); ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('class'=>'form-horizontal'),
)); ?>
<fieldset>
	<legend><?php echo UserModule::t("Изменение пароля"); ?><span class="note"><?php echo UserModule::t("Минимальная длина пароля - 4 символа"); ?></span></legend>
	
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'verifyPassword'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'verifyPassword'); ?>
			<?php echo $form->error($model,'verifyPassword'); ?>
		</div>
	</div>
	
	
	<div class="form-actions">
		<?php echo CHtml::submitButton(UserModule::t("Сохранить"), array('class'=>'btn btn-primary btn-large')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->