<?php
$this->breadcrumbs=array(
	'Сауны'=>array('index'),
	'Создание сауны',
);

$this->menu=array(
	array('label'=>'Список саун','url'=>array('index')),
	array('label'=>'Управление саунами','url'=>array('admin')),
);
?>

<h1>Создание сауны</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>