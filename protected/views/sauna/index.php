<?php
$this->breadcrumbs=array(
	'Сауны',
);

$this->menu=array(
	array('label'=>'Создать сауну','url'=>array('create')),
	array('label'=>'Управление саунами','url'=>array('admin')),
);
?>

<h1>Сауны</h1>

<?php $this->widget('ext.bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
