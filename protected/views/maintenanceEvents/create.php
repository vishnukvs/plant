<?php
$this->breadcrumbs=array(
	'Maintenance Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MaintenanceEvents','url'=>array('index')),
	array('label'=>'Manage MaintenanceEvents','url'=>array('admin')),
);
?>

<h1>Create MaintenanceEvents</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>