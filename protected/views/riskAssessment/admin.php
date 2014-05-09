<?php
$this->breadcrumbs=array(
	'Risk Assessments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RiskAssessment','url'=>array('index')),
	array('label'=>'Create RiskAssessment','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('risk-assessment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Risk Assessments</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'risk-assessment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'plant_id',
		'maintenance_events_id',
		'type_id',
		'service_or_repair_id',
		'location',
		/*
		'work_method_statements',
		'site_traffic_control_id',
		'ppe',
		'ppe_action',
		'hazards_identified',
		'hazards',
		'risk_rating',
		'additional_potential_hazard',
		'risk_assesment_by',
		'risk_controls_by',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
