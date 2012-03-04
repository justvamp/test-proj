<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'sauna-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'phones',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'latitude',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'longitude',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'capacity',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
