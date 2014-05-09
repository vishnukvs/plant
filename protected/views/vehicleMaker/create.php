<?php
$this->breadcrumbs=array(
	'Vehicle Makers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleMaker', 'url'=>array('index')),
	array('label'=>'Manage VehicleMaker', 'url'=>array('admin')),
);
?>

<h1>Create VehicleMaker</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>