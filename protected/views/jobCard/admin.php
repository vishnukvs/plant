<?php
$this->breadcrumbs=array(
	'Job Cards'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List JobCard','url'=>array('index')),
	array('label'=>'Create JobCard','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('job-card-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Job Cards</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'job-card-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'risk_assessment_id',
		'plant_id',
		'maintenance_events_id',
		'type_id',
		'service_or_repair_id',
		/*
		'rego',
		'kilometers_or_hours',
		'date_in',
		'hours_in_workshop',
		'lost_production_time',
		'task_id',
		'time_for_task',
		'description_of_work',
		'internal_or_external',
		'order_created',
		'date_completed',
		'job_completed',
		'vehicle_safe_for_work',
		'pay_id',
		'old_id',
		'old_task_id',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'condition_of_brakes',
		'condition_of_tyres',
		'condition_of_steering',
		'condition_of_suspension',
		'condition_of_lights',
		'service_completed_per_manufacturer',
		'logbook_completed',
		'other_repairs_required',
		'logbook_notes',
		'service_not_completed_per_manufacturer',
		'order_number',
		'order_value',
		'order_supplier',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
