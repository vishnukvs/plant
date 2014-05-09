<?php
$this->breadcrumbs=array(
	'Service Schedules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServiceSchedules','url'=>array('index')),
	array('label'=>'Create ServiceSchedules','url'=>array('create')),
	array('label'=>'View ServiceSchedules','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ServiceSchedules','url'=>array('admin')),
);
?>

<h1>Update ServiceSchedules <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>