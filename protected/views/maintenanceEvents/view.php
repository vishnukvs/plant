<?php
$this->breadcrumbs=array(
	'Maintenance Events'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MaintenanceEvents','url'=>array('index')),
	array('label'=>'Create MaintenanceEvents','url'=>array('create')),
	array('label'=>'Update MaintenanceEvents','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MaintenanceEvents','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MaintenanceEvents','url'=>array('admin')),
);
?>

<h1>View MaintenanceEvents #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'plant_id',
		'maintenance_type',
		'date_event_logged',
		'status',
		'date_completed',
		'user_id',
		'maintenance_event_status_id',
		'maintenance_event_type_id',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'type_id',
		'status_id',
	),
)); ?>
