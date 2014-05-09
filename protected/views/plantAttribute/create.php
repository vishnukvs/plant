<?php
$this->breadcrumbs=array(
	'Plant Attributes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlantAttribute','url'=>array('index')),
	array('label'=>'Manage PlantAttribute','url'=>array('admin')),
);
?>

<h1>Create PlantAttribute</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>