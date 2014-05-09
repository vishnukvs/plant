<?php
$this->breadcrumbs=array(
	'Job Cards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JobCard','url'=>array('index')),
	array('label'=>'Create JobCard','url'=>array('create')),
	array('label'=>'Update JobCard','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete JobCard','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JobCard','url'=>array('admin')),
);
?>

<h1>View JobCard #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'risk_assessment_id',
		'plant_id',
		'maintenance_events_id',
		'type_id',
		'service_or_repair_id',
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
	),
)); ?>
