<?php
$this->breadcrumbs=array(
	'Maintenance Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MaintenanceEvents','url'=>array('index')),
	array('label'=>'Create MaintenanceEvents','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('maintenance-events-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Maintenance Events</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'maintenance-events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'plant_id',
		'maintenance_type',
		'date_event_logged',
		'status',
		'date_completed',
		/*
		'user_id',
		'maintenance_event_status_id',
		'maintenance_event_type_id',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'type_id',
		'status_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
