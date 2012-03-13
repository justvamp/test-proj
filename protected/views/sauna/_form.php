<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'sauna-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'phones',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>100,'onChange'=>'js:onAddressChange(this.value)')); ?>

	<?php echo $form->textFieldRow($model,'latitude',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'longitude',array('class'=>'span5')); ?>

	<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AKVj8U4BAAAA8ml7NwIABg_vOmDwgRCkGWgP-2RN_4rYxPMAAAAAAAAAAAApXht3Pc9C4Ed0G1AAXPvYrkd4Og==" type="text/javascript"></script>

	<div id="YMapsID" style="width: 100%; height: 550px;"></div>

	<script type="text/javascript">
		
		// Создание экземпляра карты и привязка его к созданному контейнеру
		var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
		map.addControl(new YMaps.Zoom());
		map.addControl(new YMaps.ToolBar());
		
		// объект-оверлей (только один на карте)
		var placemark;
		
		var lat_field = YMaps.jQuery('#Sauna_latitude');
		var lng_field = YMaps.jQuery('#Sauna_longitude');
		
		function onAddressChange(address) {
			var geocoder = new YMaps.Geocoder('Вологда, '+address);
			YMaps.Events.observe(geocoder, geocoder.Events.Load, function () {
				if (this.length()) {
					map.removeOverlay(placemark);
					placemark = new YMaps.Placemark(this.get(0).getGeoPoint(), {
						draggable: true,
						hideIcon: true
					});

					lat_field.val(this.get(0).getGeoPoint().getLat());
					lng_field.val(this.get(0).getGeoPoint().getLng());
					
					map.addOverlay(placemark);
					placemark.description = this.get(0).text;
					map.panTo(this.get(0).getGeoPoint());
					placemark.openBalloon();
					YMaps.Events.observe(placemark, placemark.Events.DragEnd, function(metka) {
						lat_field.val(metka.getGeoPoint().getLat());
						lng_field.val(metka.getGeoPoint().getLng());
					});
				} else {
					alert("Такого адреса не найдено. Попробуйте указать местоположение вручную прямо на карте.");
				}
			});
		}



		// Создает обработчик события window.onLoad
		YMaps.jQuery(function() {
			// Установка начальных параметров отображения карты: центр карты и коэффициент масштабирования
			map.setCenter(new YMaps.GeoPoint(39.9, 59.21), 13); // Вологда
		});
	</script>	
	
	
	<?php echo $form->textFieldRow($model,'capacity',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
