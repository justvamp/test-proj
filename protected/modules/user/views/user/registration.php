<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Регистрация");
?>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions' => array(
      'validateOnSubmit' => true,
      'validateOnChange' => true,
    ),
	'htmlOptions' => array('enctype'=>'multipart/form-data','class'=>'form-horizontal'),
)); ?>
<fieldset>
	<legend><?php echo UserModule::t("Регистрация"); ?></legend>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="controls">
		<?php echo $form->passwordField($model,'password'); ?>
		<span class="help-inline">
		<?php echo UserModule::t("Минимум 4 символа."); ?>
		</span>			
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
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="control-group">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<div class="controls">
		<?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
		</div>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div class="controls">
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode'); ?>
			<?php echo $form->error($model,'verifyCode'); ?>
		</div>
		<p class="hint"><?php echo UserModule::t("Пожалуйста, введите символы, которые показаны на картинке."); ?>
		<br/><?php echo UserModule::t("Символы не чувствительны к регистру."); ?></p>
	</div>
	<?php endif; ?>
	
	<div class="form-actions">
		<?php echo CHtml::submitButton(UserModule::t("Зарегистрировать"), array('class'=>'btn btn-primary btn-large')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>