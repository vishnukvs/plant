<?php
$this->breadcrumbs=array(
	'Job Cards'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JobCard','url'=>array('index')),
	array('label'=>'Create JobCard','url'=>array('create')),
	array('label'=>'View JobCard','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage JobCard','url'=>array('admin')),
);
?>

<h1>Update JobCard <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>