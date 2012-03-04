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

<div id="YMapsID" style="width:100%;height:400px"></div>

<script type="text/javascript">
    // Создает обработчик события window.onLoad
    YMaps.jQuery(function () {
        // Создает экземпляр карты и привязывает его к созданному контейнеру
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
            
        // Устанавливает начальные параметры отображения карты: центр карты и коэффициент масштабирования
        map.setCenter(new YMaps.GeoPoint(39.9, 59.21), 13);
		
		var geocoder = new YMaps.Geocoder("Вологда, ул. Беляева, 2а");
		map.addOverlay(geocoder);
		
		YMaps.Events.observe(geocoder, geocoder.Events.Load, function () {
			if (this.length()) {
				//alert("Найдено :" + this.length());
				map.addOverlay(this.get(0));
				//map.panTo(this.get(0).getGeoPoint())
			}else {
				alert("Ничего не найдено")
			}
		});
 
		YMaps.Events.observe(geocoder, geocoder.Events.Fault, function (error) {
			alert("Произошла ошибка: " + error.message);
		});
		
    })
</script>