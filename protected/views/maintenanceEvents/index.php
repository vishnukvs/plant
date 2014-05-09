<?php
$this->breadcrumbs=array(
	'Maintenance Events',
);

$this->menu=array(
	array('label'=>'Create MaintenanceEvents','url'=>array('create')),
	array('label'=>'Manage MaintenanceEvents','url'=>array('admin')),
);
?>

<h1>Maintenance Events</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
