<?php
$this->breadcrumbs=array(
	'Сауны'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список саун','url'=>array('index')),
	array('label'=>'Создать сауну','url'=>array('create')),
	array('label'=>'Изменить сауну','url'=>array('update','id'=>$model->sauna_id)),
	array('label'=>'Удалить сауну','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->sauna_id),'confirm'=>'Вы действительно хотите удалить эту сауну?')),
	array('label'=>'Управление саунами','url'=>array('admin')),
);
?>

<h1>Просмотр сауны #<?php echo $model->sauna_id; ?></h1>

<?php $this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'phones',
		'address',
		'latitude',
		'longitude',
		'capacity',
		'price',
		'description',
	),
)); ?>
