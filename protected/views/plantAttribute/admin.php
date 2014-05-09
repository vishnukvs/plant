<?php
$this->breadcrumbs=array(
	'Plant Attributes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PlantAttribute','url'=>array('index')),
	array('label'=>'Create PlantAttribute','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('plant-attribute-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Plant Attributes</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'plant-attribute-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'expenses_work_order',
		'classification_id',
		'status_id',
		'rego',
		'make',
		/*
		'model',
		'description',
		'division_id',
		'shared_user',
		'fuel_id',
		'consumption',
		'colour',
		'old_unit',
		'vin_number',
		'engine_number',
		'purchase_date',
		'life_in_months',
		'estimated_disposal_date',
		'purchase_price',
		'estimated_disposal_price',
		'service_day',
		'user_id',
		'section_id',
		'vehicle_maker_id',
		'custodian_id',
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
