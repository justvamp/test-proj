<?php
$this->breadcrumbs=array(
	'Сауны'=>array('index'),
	$model->name=>array('view','id'=>$model->sauna_id),
	'Изменение сауны',
);

$this->menu=array(
	array('label'=>'Список саун','url'=>array('index')),
	array('label'=>'Создать сауну','url'=>array('create')),
	array('label'=>'Просмотр сауны','url'=>array('view','id'=>$model->sauna_id)),
	array('label'=>'Управление саунами','url'=>array('admin')),
);
?>

<h1>Изменение сауны <?php echo $model->sauna_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>