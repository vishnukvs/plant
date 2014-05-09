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

<h1>Create Scheduled Services</h1>

<?php echo $this->renderPartial('_scheduledServiceForm', array(
                                'maintenance'=>$maintenance, 
                                'service'=>$service,

                                )); ?>