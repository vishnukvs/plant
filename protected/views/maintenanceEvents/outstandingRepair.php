<?php
$this->breadcrumbs=array(
	'Outstanding Repair Jobs',
);

$this->menu=array(
    	array('label'=>'All Maintenance Event', 'url'=>array('index'),'active'=>true,  'items'=>array(
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


<h1>Outstanding Repair Jobs</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchRepair',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->



<?php 
///$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); 
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maintenance-events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

            array(
                'name'=>'plant_id',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->plant_id),"../plantAttribute/". CHtml::encode($data->plant_id))',
            ),
            
            array(
                'name'=>'custodian_id',
                'value'=>'$data->plantattribute->custodian->name',
            ),            
            
            array( 'name'=>'date_repair_logged', 'value'=>'$data->repairs->date_repair_logged' ),
            array( 'name'=>'nature_of_repair', 'value'=>'$data->repairs->nature_of_repair' ),
            array( 'name'=>'category_id', 
                'value'=>'$data->repairs->getCategoryText()',
                'filter'=>array(
                        '1'=>'Minor Repair',
                        '2'=>'Major Repair',
                        '3'=>'Safety-related - Vehicle Grounded',
                        ),
                
                ),
            
            array( 'name'=>'r_to_be_completed_by', 
                   'value'=>'$data->repairs->getCompletedText()',
                   'filter'=>array(
                            '1'=>'Ray Pietra',
                            '2'=>'Mohammed Ahmed',
                            '3'=>'Contractor',
                            '0'=>'Unassigned',
                    ),),
            
            
            array(
                'name' => 'create_user_id',
                'value'=> '$data->user->username',
                'filter' => CHtml::listData(User::model()->findAll(), 'id','username'),
                
            ),
            
 
		array(
                     'header' => 'Actions',
			'class'=>'CButtonColumn',
		),
	),
)); ?>