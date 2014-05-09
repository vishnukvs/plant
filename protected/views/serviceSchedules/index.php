<?php
$this->breadcrumbs=array(
	'Service Schedules',
);

$this->menu=array(
	array('label'=>'Create ServiceSchedules','url'=>array('create')),
	array('label'=>'Manage ServiceSchedules','url'=>array('admin')),
);
?>

<h1>Service Schedules</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
