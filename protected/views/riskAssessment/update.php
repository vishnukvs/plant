<?php
$this->breadcrumbs=array(
	'Risk Assessments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RiskAssessment','url'=>array('index')),
	array('label'=>'Create RiskAssessment','url'=>array('create')),
	array('label'=>'View RiskAssessment','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage RiskAssessment','url'=>array('admin')),
);
?>

<h1>Update RiskAssessment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>