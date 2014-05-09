<?php
$this->breadcrumbs=array(

	'Service Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceSchedules', 'url'=>array('admin')),
	array('label'=>'Manage ServiceSchedules', 'url'=>array('admin')),
);
?>

<h1>Create New Service Record</h1>

<?php echo $this->renderPartial('_serviceForm', array('maintenance'=>$maintenance, 'service'=>$service)); ?>