<?php
$this->breadcrumbs=array(
	'Service Schedules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ServiceSchedules','url'=>array('index')),
	array('label'=>'Create ServiceSchedules','url'=>array('create')),
	array('label'=>'Update ServiceSchedules','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ServiceSchedules','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceSchedules','url'=>array('admin')),
);
?>

<h1>View ServiceSchedules #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'maintenance_events_id',
		'date_booked',
		'target_time',
		'service_description',
		'to_be_completed_by_old',
		'date_completed',
		'comments',
		'job_card_no',
		'mechanice_completed',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'to_be_completed_by',
	),
)); ?>
