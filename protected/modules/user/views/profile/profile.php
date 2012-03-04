<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Профиль");
$this->breadcrumbs=array(
	UserModule::t("Профиль")=>array('profile'),
	UserModule::t("Просмотр профиля"),
);
?><h1><?php echo UserModule::t('Мой профиль').' ('.CHtml::link('Изменить',array('/user/profile/edit'),array('class'=>'smaller')).')'; ?></h1>
<?php //echo $this->renderPartial('menu'); ?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="table table-condensed table-bordered table-striped">
<tr>
	<td><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
</td>
    <td><b><?php echo CHtml::encode($model->username); ?></b>
</td>
</tr>
<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
<tr>
	<td><?php echo CHtml::encode(UserModule::t($field->title)); ?>
</td>
    <td><b><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
</b></td>
</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
?>
<tr>
	<td><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</td>
    <td><b><?php echo CHtml::encode($model->email); ?></b>
</td>
</tr>
<tr>
	<td><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
</td>
    <td><b><?php echo date("d.m.Y H:i:s",$model->createtime); ?></b>
</td>
</tr>
<tr>
	<td><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
</th>
    <td><b><?php echo date("d.m.Y H:i:s",$model->lastvisit); ?></b>
</td>
</tr>
<tr>
	<td><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</td>
    <td><b><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></b>
</td>
</tr>
</table>
