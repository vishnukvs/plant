<?php
$this->breadcrumbs=array(
	'Risk Assessments',
);

$this->menu=array(
	array('label'=>'Create RiskAssessment','url'=>array('create')),
	array('label'=>'Manage RiskAssessment','url'=>array('admin')),
);
?>

<h1>Risk Assessments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
