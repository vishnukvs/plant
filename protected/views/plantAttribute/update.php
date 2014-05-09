<?php
$this->breadcrumbs=array(
	'Plant Attributes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlantAttribute','url'=>array('index')),
	array('label'=>'Create PlantAttribute','url'=>array('create')),
	array('label'=>'View PlantAttribute','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PlantAttribute','url'=>array('admin')),
);
?>

<h1>Update PlantAttribute <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>