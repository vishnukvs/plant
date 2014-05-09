<?php
$this->breadcrumbs=array(
	'Repairs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Repairs','url'=>array('index')),
	array('label'=>'Create Repairs','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('repairs-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Repairs</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'repairs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'maintenance_events_id',
		'date_repair_logged',
		'nature_of_repair',
		'date_completed',
		'comments',
		/*
		'jobcard_no',
		'mechanic_id',
		'repair_request_id',
		'repair_requested_by',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'category_id',
		'jobcard_id',
		'jobcard_condition_type',
		'jobcard_condition_type_value',
		'to_be_completed_by',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
