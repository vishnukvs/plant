<?php
$this->breadcrumbs=array(
	'Classifications'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Classification','url'=>array('index')),
	array('label'=>'Create Classification','url'=>array('create')),
	array('label'=>'Update Classification','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Classification','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Classification','url'=>array('admin')),
);
?>

<h1>View Classification #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
