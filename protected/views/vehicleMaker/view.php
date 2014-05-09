<?php
$this->breadcrumbs=array(
	'Vehicle Makers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VehicleMaker', 'url'=>array('index')),
	array('label'=>'Create VehicleMaker', 'url'=>array('create')),
	array('label'=>'Update VehicleMaker', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VehicleMaker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleMaker', 'url'=>array('admin')),
);
?>

<h1>View VehicleMaker #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'maker_name',
	),
)); ?>
