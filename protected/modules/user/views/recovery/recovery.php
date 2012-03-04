<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Восстановление пароля");
$this->breadcrumbs=array(
	UserModule::t("Вход на сайт") => array('/user/login'),
	UserModule::t("Восстановление пароля"),
);
?>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>
<fieldset>
	<legend><?php echo UserModule::t("Восстановление пароля"); ?></legend>
	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="control-group">
		<?php echo CHtml::activeLabel($form,'login_or_email'); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
	</div>
	
	<div class="form-actions">
		<?php echo CHtml::submitButton(UserModule::t("Восстановить"), array('class'=>'btn btn-primary btn-large')); ?>
	</div>
</fieldset>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>