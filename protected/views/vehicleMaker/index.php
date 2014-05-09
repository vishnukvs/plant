<?php
$this->breadcrumbs=array(
	'Vehicle Makers',
);

$this->menu=array(
	array('label'=>'Create VehicleMaker', 'url'=>array('create')),
	array('label'=>'Manage VehicleMaker', 'url'=>array('admin')),
);
?>

<h1>Vehicle Makers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
