<?php
$this->breadcrumbs=array(
	'Repairs',
);

$this->menu=array(
	array('label'=>'Create Repairs','url'=>array('create')),
	array('label'=>'Manage Repairs','url'=>array('admin')),
);
?>

<h1>Repairs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
