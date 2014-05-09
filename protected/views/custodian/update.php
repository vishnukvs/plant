<?php
$this->breadcrumbs=array(
	'Custodians'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Custodian','url'=>array('index')),
	array('label'=>'Create Custodian','url'=>array('create')),
	array('label'=>'View Custodian','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Custodian','url'=>array('admin')),
);
?>

<h1>Update Custodian <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>