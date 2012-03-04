<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Изменить профиль");
$this->breadcrumbs=array(
	UserModule::t("Профиль")=>array('profile'),
	UserModule::t("Изменить профиль"),
);
?>
<?php //echo $this->renderPartial('menu'); ?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data','class'=>'form-horizontal'),
)); ?>
<fieldset>

	<legend><?php echo UserModule::t('Редактирование профиля'); ?></legend>

	
	<?php /*
	<div class="control-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="controls">		
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>	
	 * 
	 */
	?>
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="control-group">
		<?php echo $form->labelEx($profile,$field->varname);
		echo '<div class="controls">';
			if ($field->widgetEdit($profile)) {
				echo $field->widgetEdit($profile);
			} elseif ($field->range) {
				echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
			} elseif ($field->field_type=="TEXT") {
				echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
			} else {
				echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
			echo $form->error($profile,$field->varname);
		echo '</div>';
		?>
	</div>	
			<?php
			}
		}
?>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Создать') : UserModule::t('Сохранить'), array('class'=>'btn btn-primary btn-large')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->
