<?php
$this->breadcrumbs=array(
	'Classifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Classifications', 'url'=>array('index')),
	array('label'=>'Create Classifications', 'url'=>array('create')),
	array('label'=>'Update Classifications', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Classifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Classifications', 'url'=>array('admin')),
);
?>

<h1>View Classifications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'classification',
	),
)); ?>
