<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>


<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AKVj8U4BAAAA8ml7NwIABg_vOmDwgRCkGWgP-2RN_4rYxPMAAAAAAAAAAAApXht3Pc9C4Ed0G1AAXPvYrkd4Og==" type="text/javascript"></script>

<div id="YMapsID" style="width:100%;height:550px"></div>

<script type="text/javascript">
    // Создает обработчик события window.onLoad
    YMaps.jQuery(function () {
		// Создание экземпляра карты и привязка его к созданному контейнеру
		var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
		map.addControl(new YMaps.Zoom());
		map.addControl(new YMaps.ToolBar());

		// Установка начальных параметров отображения карты: центр карты и коэффициент масштабирования
		map.setCenter(new YMaps.GeoPoint(39.9, 59.21), 13);

		// Создание стиля
		var s = new YMaps.Style();
		// стиль значка метки
		s.iconStyle = new YMaps.IconStyle();
		s.iconStyle.href = "./images/tag40.png";
		s.iconStyle.size = new YMaps.Point(40, 40);
		s.iconStyle.offset = new YMaps.Point(-18, -37);
		// стиль балуна
		s.balloonContentStyle = new YMaps.BalloonContentStyle(
			new YMaps.Template('<div style="background-color: white; color: #666; ">$[name]: <b>$[address]</b></div>')
		);		

		function showObject(obj) {
			var geoPoint = new YMaps.GeoPoint(obj.lng,obj.lat);
			var placemark = new YMaps.Placemark(geoPoint, {
				balloonOptions: {
					maxWidth: 170,
					hasCloseButton: true,
					mapAutoPan: true
				},
				style: s,
				hideIcon: false
			});
			placemark.name = obj.name;
			//placemark.description = obj.desc;
			placemark.address = obj.address;			
			map.addOverlay(placemark);
			//map.panTo(geoPoint);
			//placemark.openBalloon();
			YMaps.Events.observe(placemark, placemark.Events.MouseEnter, function () {
				placemark.openBalloon();
			});
			YMaps.Events.observe(placemark, placemark.Events.MouseLeave, function () {
				//placemark.closeBalloon();
			});
			YMaps.Events.observe(placemark, placemark.Events.Click, function () {
				location.href = 'sauna/'+obj.id;
			});
		}

		var objects = [];
		<?php
			$saunas = Sauna::model()->findAll();
			$count = 0;
			foreach ($saunas as $sauna) {
				$count++;
				echo "objects[$count] = {lat: $sauna->latitude, lng: $sauna->longitude, id: $sauna->sauna_id, name: '$sauna->name', address: '$sauna->address'}";
				echo chr(10).chr(13);
			}
		?>

		for (var i=0; i < objects.length; i++) {
			showObject(objects[i+1]);
		}


    });
</script>