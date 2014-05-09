<?php
$this->breadcrumbs=array(
	'Risk Assessments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RiskAssessment','url'=>array('index')),
	array('label'=>'Create RiskAssessment','url'=>array('create')),
	array('label'=>'Update RiskAssessment','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete RiskAssessment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RiskAssessment','url'=>array('admin')),
);
?>

<h1>View RiskAssessment #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'plant_id',
		'maintenance_events_id',
		'type_id',
		'service_or_repair_id',
		'location',
		'work_method_statements',
		'site_traffic_control_id',
		'ppe',
		'ppe_action',
		'hazards_identified',
		'hazards',
		'risk_rating',
		'additional_potential_hazard',
		'risk_assesment_by',
		'risk_controls_by',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
