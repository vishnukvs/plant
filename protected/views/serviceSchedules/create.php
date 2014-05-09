<?php
$this->breadcrumbs=array(
	'Service Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceSchedules','url'=>array('index')),
	array('label'=>'Manage ServiceSchedules','url'=>array('admin')),
);
?>

<h1>Create ServiceSchedules</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>