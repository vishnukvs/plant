<?php
$this->breadcrumbs=array(
	'Risk Assessments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RiskAssessment','url'=>array('index')),
	array('label'=>'Manage RiskAssessment','url'=>array('admin')),
);
?>

<h1>Create RiskAssessment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>