<?php
$this->breadcrumbs=array(
	'Divisions',
);

$this->menu=array(
	array('label'=>'Create Division','url'=>array('create')),
	array('label'=>'Manage Division','url'=>array('admin')),
);
?>

<h1>Divisions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
