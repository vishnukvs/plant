<?php
$this->breadcrumbs=array(
	'Plant Attributes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlantAttribute','url'=>array('index')),
	array('label'=>'Create PlantAttribute','url'=>array('create')),
	array('label'=>'Update PlantAttribute','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PlantAttribute','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlantAttribute','url'=>array('admin')),
);
?>

<h1>View PlantAttribute #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'expenses_work_order',
		'classification_id',
		'status_id',
		'rego',
		'make',
		'model',
		'description',
		'division_id',
		'shared_user',
		'fuel_id',
		'consumption',
		'colour',
		'old_unit',
		'vin_number',
		'engine_number',
		'purchase_date',
		'life_in_months',
		'estimated_disposal_date',
		'purchase_price',
		'estimated_disposal_price',
		'service_day',
		'user_id',
		'section_id',
		'vehicle_maker_id',
		'custodian_id',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
