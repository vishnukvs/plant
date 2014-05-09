<?php
$this->breadcrumbs=array(
	'Custodians',
);

$this->menu=array(
	array('label'=>'Create Custodian','url'=>array('create')),
	array('label'=>'Manage Custodian','url'=>array('admin')),
);
?>

<h1>Custodians</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
