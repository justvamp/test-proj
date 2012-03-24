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

<div class="row">
	<div class="span7">
		<h5><?php echo CHtml::encode($model->getAttributeLabel('phones')); ?></h5>
		<span class="sauna-about phones"><?php echo CHtml::encode($model->phones); ?></span>
		<?php /*
		<span class="sauna-about phones"><ul>
		<?php foreach ($model->phoneArray as $phone): ?>
		<?php echo '<li>'.CHtml::encode($phone).'</li>'; ?>
		<?php endforeach; ?>
		</ul></span>
		* 
		*/?>

		<h5><?php echo CHtml::encode($model->getAttributeLabel('address')); ?></h5>
		<span class="sauna-about"><?php echo CHtml::encode($model->address); ?></span>

		<h5><?php echo CHtml::encode($model->getAttributeLabel('capacity')); ?></h5>
		<span class="sauna-about"><?php echo CHtml::encode($model->capacity).' человек'; ?></span>

		<h5><?php echo CHtml::encode($model->getAttributeLabel('price')); ?></h5>
		<span class="sauna-about"><?php echo CHtml::encode($model->price).' рублей'; ?></span>

		<h5><?php echo CHtml::encode($model->getAttributeLabel('description')); ?></h5>
		<span class="description"><?php echo CHtml::encode($model->description); ?></span>
	</div>
	<div class="span4 offset1">
		<?php echo CHtml::image($model->imagePath,$model->name); ?>
		
		<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AKVj8U4BAAAA8ml7NwIABg_vOmDwgRCkGWgP-2RN_4rYxPMAAAAAAAAAAAApXht3Pc9C4Ed0G1AAXPvYrkd4Og==" type="text/javascript"></script>
		
		<div id="YMapsID" style="width: 100%; height: 300px;"></div>

		<script type="text/javascript">

		// Создание экземпляра карты и привязка его к созданному контейнеру
			var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
			map.setCenter(new YMaps.GeoPoint(39.9, 59.21), 16); // Вологда
			//map.addControl(new YMaps.Zoom());
			//map.addControl(new YMaps.ToolBar());

			// объект-оверлей (только один на карте)
			var placemark;

			function showObject(lng,lat) {
				var geoPoint = new YMaps.GeoPoint(lng,lat);
				placemark = new YMaps.Placemark(geoPoint);
				map.addOverlay(placemark);
				placemark.description = '<?php echo $model->name; ?>';
				map.panTo(geoPoint);
				placemark.openBalloon();
			}

			showObject(<?php echo $model->longitude; ?>,<?php echo $model->latitude; ?>);

		</script>	
	
		
		
	</div>
</div>