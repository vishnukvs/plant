<?php
$this->breadcrumbs=array(
	'Job Cards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JobCard','url'=>array('index')),
	array('label'=>'Manage JobCard','url'=>array('admin')),
);
?>

<h1>Create JobCard</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>