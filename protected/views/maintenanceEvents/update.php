<?php
$this->breadcrumbs=array(
	'Maintenance Events'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MaintenanceEvents','url'=>array('index')),
	array('label'=>'Create MaintenanceEvents','url'=>array('create')),
	array('label'=>'View MaintenanceEvents','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage MaintenanceEvents','url'=>array('admin')),
);
?>

<h1>Update MaintenanceEvents <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>