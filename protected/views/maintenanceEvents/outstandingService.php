<?php
$this->breadcrumbs=array(
	'Outstanding Service Jobs',
);

$this->menu=array(
    	array('label'=>'All Maintenance Event', 'url'=>array('admin'),'active'=>true,  'items'=>array(
            array('label'=>'Outstanding Repairs', 'url'=>array('outstandingRepair',)),
            array('label'=>'Outstanding Service', 'url'=>array('outstandingService',)),
            ),
        ),
	array('label'=>'Manage Maintenance Events', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('maintenance-events-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Outstanding Service Jobs</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchService',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maintenance-events-grid',
	'dataProvider'=>$model->search(),
        'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
	'filter'=>$model,
	'columns'=>array(

            array(
                'name'=>'plant_id',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->plant_id),"../plantAttribute/". CHtml::encode($data->plant_id))',
            ),
            
            array(
                'name' => 'year_month',
                'filter' => $model->getServiceYearMonth(),
            ),
            
        
             array(
            'name' => 'date_booked',
            'value'=>'$data->service->date_booked',    
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'date_booked', 
                
                'i18nScriptFile' => 'jquery.ui.datepicker-en-AU.js', // (#2)

                'htmlOptions'=>array(
                    'width'=>'40',
                    'style'=>'text-align:center',
                    //'readonly' => "readonly",
                    'id' => 'datepicker_for_date_booked',
                    ),

                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'dd/mm/yy',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
                ), 
            true), // (#4)
            ),
            
            
            
            array( 'name'=>'target_time', 'value'=>'$data->service->target_time' ),
            array( 'name'=>'service_description', 'value'=>'$data->service->service_description' ),
            
            array( 'name'=>'to_be_completed_by', 
                   'value'=>'$data->service->getCompletedText()',
                   'filter'=>array(
                            '1'=>'Ray Pietra',
                            '2'=>'Mohammed Ahmed',
                            '3'=>'Contractor',
                            '0'=>'Unassigned',
                    ),),

            array(
                'name' => 'create_user_id',
                'value'=> '$data->user->username',
                'filter' => CHtml::listData(User::model()->findAll(array('order' => 'username')), 'id','username'),
                
            ),
            
		array(
                     'header' => 'Actions',
			'class'=>'CButtonColumn',
		),
	),
)); 

// (#5)
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_date_booked').datepicker();
}
");


?>