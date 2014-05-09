<?php
$this->breadcrumbs=array(
	'Repair'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Repairs', 'url'=>array('index')),
	array('label'=>'Manage Repairss', 'url'=>array('admin')),
);
?>

<h1>Create New Repair</h1>

<?php echo $this->renderPartial('_repairForm', array('maintenance'=>$maintenance, 'repair'=>$repair)); ?>