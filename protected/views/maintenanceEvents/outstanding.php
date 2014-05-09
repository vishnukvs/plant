<?php
$this->breadcrumbs=array(
	'Outstanding Maintenance Events',
);

$this->menu=array(
	array('label'=>'Outstanding Maintenance Event', 'url'=>array('outstanding')),
    	array('label'=>'All Maintenance Event', 'url'=>array('index')),
	array('label'=>'Manage Maintenance Events', 'url'=>array('admin')),
);
?>

<h1>Outstanding Maintenance Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
