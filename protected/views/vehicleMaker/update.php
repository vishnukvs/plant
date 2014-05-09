<?php
$this->breadcrumbs=array(
	'Vehicle Makers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleMaker', 'url'=>array('index')),
	array('label'=>'Create VehicleMaker', 'url'=>array('create')),
	array('label'=>'View VehicleMaker', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VehicleMaker', 'url'=>array('admin')),
);
?>

<h1>Update VehicleMaker <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>