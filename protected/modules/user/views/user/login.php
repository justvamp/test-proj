<?php
	$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Войти на сайт");

?>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<div class="form">
<?php echo CHtml::beginForm('','post',array('class'=>'form-horizontal')); ?>
<fieldset>
	<legend><?php echo UserModule::t("Вход на сайт"); ?></legend>
	
	<?php echo CHtml::errorSummary($model,'Исправьте, пожалуйста, следующие ошибки:'); ?>
	
	<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($model,'username') ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'password'); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($model,'password') ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
		<div class="controls">
			<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton(UserModule::t("Войти на сайт"), array('class'=>'btn btn-primary btn-large')); ?>
	</div>
</fieldset>	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->

<?php echo CHtml::link(UserModule::t("Регистрация"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Забыли пароль?"),Yii::app()->getModule('user')->recoveryUrl); ?>