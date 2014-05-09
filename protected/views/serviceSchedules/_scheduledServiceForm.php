<?php
$cs = Yii::app()->getClientScript(); 
//$cs->registerScript(
//        'tool-tip',
//        "// execute your scripts when the DOM is ready. this is a good habit
//        $(function() {
//
//
//
//        // select all desired input fields and attach tooltips to them
//        $(\"#form :input\").tooltip({
//
//                // place tooltip on the right edge
//                position: \"center right\",
//
//                // a little tweaking of the position
//                offset: [-2, 10],
//
//                // use the built-in fadeIn/fadeOut effect
//                effect: \"fade\",
//
//                // custom opacity setting
//                opacity: 0.7
//
//        });
//        });",
//        CClientScript::POS_END
//        );
?>

<?php
  $baseUrl = Yii::app()->baseUrl;
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/js/jquery.tools.min.js');
 // $cs->registerCssFile($baseUrl.'/css/tooltip-generic.css');
  
?>

<div class="form" id="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-schedules-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($maintenance, $service)); ?>
        
        
	<div class="row">
		<?php echo CHtml::activeLabelEx($maintenance,'plant_id'); ?>
                <?php echo $form->textField($maintenance,'plant_id',
                        array('disabled'=>true)); ?>

            
	</div>

     
        
        <?php
        
        // get values from PlantAttribute table
        $plant = PlantAttribute::model()->findByPk($maintenance->plant_id);
        
        echo CHtml::activeLabelEx($plant,'estimated_disposal_date');
        echo $plant->estimated_disposal_date.'<br />';
        
        echo CHtml::activeLabelEx($plant,'description');        
        echo $plant->description; 
        
        
        ?>
        

            
                <?php // type defaults to Service, type_id = 1 
                echo $form->hiddenField($maintenance,'type_id',array('value'=>1));
                ?>
            
            

                <?php  // status defaults to Outstanding status_id = 0
                echo $form->hiddenField($maintenance,'status_id',array('value'=>0));
                ?>

        
        <hr></hr>

	<div class="row">
            <label for="ServiceSchedules_date_booked" class="required">Date of First Service <span class="required">*</span></label>
		<?php //echo $form->labelEx($service,'date_booked'); ?>
		<?php //echo $form->textField($service,'date_booked'); ?>
	  	<?php 
                         $this->widget('zii.widgets.jui.CJuiDatePicker', array(

                        'model'=>$service,
				'attribute'=>'date_booked',
                                'name'=>"ServiceSchedules[date_booked]",
				// additional javascript options for the date picker plugin
				'options'=>array(
						'showAnim'   => 'fold',
                                                'dateFormat' =>'dd/mm/yy', 
                                                'altField'   => '#date_booked',
                                           	),
				'htmlOptions'=>array(
						'id'=>'date_booked',
                                                'readonly' => "readonly",
				),
		)); 
		?> DD/MM/YYYY
		<?php echo $form->error($service,'date_booked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($service,'interval'); ?>
		<?php echo $form->dropDownList($service,'interval',$service->getIntervalOption()
                        ,array('prompt'=>'Select interval...')); ?>
		<?php echo $form->error($service,'interval'); ?>
	</div>        
        
	<div class="row">
		<?php echo $form->labelEx($service,'target_time'); ?>
		<?php echo $form->textField($service,'target_time'); ?>
		<?php echo $form->error($service,'target_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($service,'service_description'); ?>
		<?php echo $form->textArea($service,'service_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($service,'service_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($service,'to_be_completed_by'); ?>
		<?php echo $form->dropDownList($service,'to_be_completed_by',$service->getCompletedOption()
                        ,array('prompt'=>'To be completed by...')); ?>
		<?php echo $form->error($service,'to_be_completed_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($service,'comments'); ?>
		<?php echo $form->textArea($service,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($service,'comments'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
