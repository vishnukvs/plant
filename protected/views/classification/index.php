<?php
$this->breadcrumbs=array(
	'Classifications',
);

$this->menu=array(
	array('label'=>'Create Classification','url'=>array('create')),
	array('label'=>'Manage Classification','url'=>array('admin')),
);
?>

<h1>Classifications</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
