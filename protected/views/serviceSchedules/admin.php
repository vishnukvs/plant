<?php
$this->breadcrumbs=array(
	'Service Schedules'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ServiceSchedules','url'=>array('index')),
	array('label'=>'Create ServiceSchedules','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('service-schedules-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Service Schedules</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'service-schedules-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'maintenance_events_id',
		'date_booked',
		'target_time',
		'service_description',
		'to_be_completed_by_old',
		/*
		'date_completed',
		'comments',
		'job_card_no',
		'mechanice_completed',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'to_be_completed_by',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
