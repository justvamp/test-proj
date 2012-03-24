<?php
$this->breadcrumbs=array(
	'Сауны'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список саун','url'=>array('index')),
	array('label'=>'Создать сауну','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sauna-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление саунами</h1>

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'sauna-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'sauna_id',
		'user_id',
		'name',
		'phones',
		'address',
		/*
		'latitude',
		'longitude',
		'capacity',
		'price',
		'description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php echo CHtml::link('Добавить сауну', array('/sauna/create'), array('class'=>'btn btn-primary btn-large')); ?>
