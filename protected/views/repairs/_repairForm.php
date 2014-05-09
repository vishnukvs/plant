<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-schedules-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($maintenance, $repair)); ?>
       
        
	<div class="row">
		<?php echo CHtml::activeLabelEx($maintenance,'plant_id'); ?>
                <?php echo $form->textField($maintenance,'plant_id',
                        array('disabled'=>true)); ?>
	</div>

                <?php  // type defaults to Repairs, type_id = 2
                echo $form->textField($maintenance,'type_id',
                            array('value'=>2,'hidden'=>true ));
                ?>

                
                <?php // status defaults to Outstanding status_id = 0
                echo $form->textField($maintenance,'status_id',
                            array('value'=>0,'hidden'=>true ));
                ?>

                <?php // jobcard id 
                echo $form->textField($repair,'jobcard_id',
                            array('hidden'=>true));
                ?>
        
                <?php // jobcard id 
                echo $form->textField($repair,'jobcard_condition_type',
                            array('hidden'=>true));
                ?>           
        
                <?php // jobcard id 
                echo $form->textField($repair,'jobcard_condition_type_value',
                            array('hidden'=>true));
                ?>              
        
        <hr></hr>
        <h2>Repair Record</h2>
     
	<div class="row">
		<?php echo $form->labelEx($repair,'date_repair_logged'); ?>
	 	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(

                    'model'=>$repair,
                    'attribute'=>'date_repair_logged',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                                    'showAnim'=>'fold',
                                    'dateFormat'=>'dd/mm/yy', // save to db format
                    ),
                    'htmlOptions'=>array(
                                    'style'=>'height:17px;',
                                    'id'=>'date_repair_logged'
                    ),
		)); 
		?>  DD/MM/YYYY
	

    <?php echo $form->error($repair,'date_repair_logged'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($repair,'nature_of_repair'); ?>
		<?php echo $form->textArea($repair,'nature_of_repair',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($repair,'nature_of_repair'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($repair,'category_id'); ?>
		<?php echo $form->dropDownList($repair,'category_id',$repair->getCategoryOption()
                        ,array('prompt'=>'Select Category...')); ?>
		<?php echo $form->error($repair,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($repair,'comments'); ?>
		<?php echo $form->textArea($repair,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($repair,'comments'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($repair,'repair_request_id'); ?>
		<?php echo $form->textField($repair,'repair_request_id'); ?>
		<?php echo $form->error($repair,'repair_request_id'); ?>
	</div>
  
        <div class="row">
		<?php echo $form->labelEx($repair,'repair_requested_by'); ?>
		<?php echo $form->textField($repair,'repair_requested_by'); ?>
		<?php echo $form->error($repair,'repair_requested_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($repair,'to_be_completed_by'); ?>
		<?php echo $form->dropDownList($repair,'to_be_completed_by',$repair->getCompletedOption()
                        ,array('prompt'=>'To be completed by...')); ?>
		<?php echo $form->error($repair,'to_be_completed_by'); ?>
	</div>        
        


	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
            	<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
