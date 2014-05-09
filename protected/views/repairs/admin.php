<?php
$this->breadcrumbs=array(
	'Repairs'=>array('index'),
	'Manage',
);

$this->menu=array(
	
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
<?php $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); ?>
<h1>Manage Repairs</h1>


<div class="btn-toolbar">

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'repairs-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'maintenance_events_id',
		'date_repair_logged',
		'nature_of_repair',
		'date_completed',

		'comments',
		   array(
                    'name'=>'status_id', 
                    'value'=>'$data->maintenanceevents->getStatusText()',
                    'filter'=>array(
                            '1'=>'Completed',
                            '0'=>'Outstanding',
                            '3'=>'Old Outstanding',
                            ),
                ),
    		array(
                     'name'=>'to_be_completed_by',
                     'value'=>'$data->getCompletedText()',
                     'filter'=>array(
                            '1'=>'Ray Pietra',
                            '2'=>'Mohammed Ahmed',
                            '3'=>'Contractor',
                            '0'=>'Unknown',
                            ),                    
                    
                 ),
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
<?php Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('user-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY); ?>

