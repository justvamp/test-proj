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
			new YMaps.Template('<div style="background-color: white; color: #666; ">$[name]: $[description] ($[address])</div>')
		);		

		// Геокодер
		var geocoder = new YMaps.Geocoder("Вологда, ул. Белева, 2а");
		
		YMaps.Events.observe(geocoder, geocoder.Events.Load, function () {
			if (this.length()) {
				var placemark = new YMaps.Placemark(this.get(0).getGeoPoint(), {
					/*hintOptions: {
						maxWidth: 100,
						showTimeout: 200,
						offset: new YMaps.Point(5, 5)
					},*/
					balloonOptions: {
						//maxWidth: 70,
						hasCloseButton: true
						//mapAutoPan: 0
					},
					style: s,
					hideIcon: false
				});
				placemark.name = "Имя объекта";
				placemark.description = "Описание объекта";
				placemark.address = "Адрес объекта";
				map.addOverlay(placemark);
				// обработчики событий
				YMaps.Events.observe(placemark, placemark.Events.MouseEnter, function () {
					placemark.openBalloon();
				});
				YMaps.Events.observe(placemark, placemark.Events.MouseLeave, function () {
					//placemark.closeBalloon();
				});
				YMaps.Events.observe(placemark, placemark.Events.Click, function () {
					location.href = 'sauna/1';
				});

				//alert("Найдено :" + this.length());
				//map.addOverlay(this.get(0));
				//map.panTo(this.get(0).getGeoPoint())
			} else {
				//alert("Ничего не найдено")
			}
		});
		
    })
</script>