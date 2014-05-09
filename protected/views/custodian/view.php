<?php
$this->breadcrumbs=array(
	'Custodians'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Custodian','url'=>array('index')),
	array('label'=>'Create Custodian','url'=>array('create')),
	array('label'=>'Update Custodian','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Custodian','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Custodian','url'=>array('admin')),
);
?>

<h1>View Custodian #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
