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

<h1><?php echo $model->name; ?></h1>

<h5><?php echo CHtml::encode($model->getAttributeLabel('phones')); ?></h5>
<span class="sauna-about phones"><?php echo CHtml::encode($model->phones); ?></span>
<h5><?php echo CHtml::encode($model->getAttributeLabel('address')); ?></h5>
<span class="sauna-about"><?php echo CHtml::encode($model->address); ?></span>
<h5><?php echo CHtml::encode($model->getAttributeLabel('capacity')); ?></h5>
<span class="sauna-about"><?php echo CHtml::encode($model->capacity).' человек'; ?></span>
<h5><?php echo CHtml::encode($model->getAttributeLabel('price')); ?></h5>
<span class="sauna-about"><?php echo CHtml::encode($model->price).' рублей'; ?></span>
<h5><?php echo CHtml::encode($model->getAttributeLabel('description')); ?></h5>
<span class="description"><?php echo CHtml::encode($model->description); ?></span>