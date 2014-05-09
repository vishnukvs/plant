<?php
$this->breadcrumbs=array(
	'Custodians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Custodian','url'=>array('index')),
	array('label'=>'Manage Custodian','url'=>array('admin')),
);
?>

<h1>Create Custodian</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>