<?php
$this->breadcrumbs=array(
	'Repairs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Repairs','url'=>array('index')),
	array('label'=>'Create Repairs','url'=>array('create')),
	array('label'=>'Update Repairs','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Repairs','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Repairs','url'=>array('admin')),
);
?>

<h1>View Repairs #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'maintenance_events_id',
		'date_repair_logged',
		'nature_of_repair',
		'date_completed',
		'comments',
		'jobcard_no',
		'mechanic_id',
		'repair_request_id',
		'repair_requested_by',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'category_id',
		'jobcard_id',
		'jobcard_condition_type',
		'jobcard_condition_type_value',
		'to_be_completed_by',
	),
)); ?>
