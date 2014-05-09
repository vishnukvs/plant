<?php
$this->breadcrumbs=array(
	'Plant Attributes',
);

$this->menu=array(
	array('label'=>'Create PlantAttribute','url'=>array('create')),
	array('label'=>'Manage PlantAttribute','url'=>array('admin')),
);
?>

<h1>Plant Attributes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
