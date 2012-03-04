<?php
$this->breadcrumbs=array(
	'Saunas',
);

$this->menu=array(
	array('label'=>'Create Sauna','url'=>array('create')),
	array('label'=>'Manage Sauna','url'=>array('admin')),
);
?>

<h1>Saunas</h1>

<?php $this->widget('ext.bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
