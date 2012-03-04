<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'sauna_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'phones',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'latitude',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'longitude',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'capacity',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="actions">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
