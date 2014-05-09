<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'risk_assessment_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'plant_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'maintenance_events_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'service_or_repair_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'rego',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'kilometers_or_hours',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_in',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hours_in_workshop',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lost_production_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'task_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'time_for_task',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'description_of_work',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'internal_or_external',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'order_created'); ?>

	<?php echo $form->textFieldRow($model,'date_completed',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'job_completed'); ?>

	<?php echo $form->checkBoxRow($model,'vehicle_safe_for_work'); ?>

	<?php echo $form->textFieldRow($model,'pay_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'old_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'old_task_id',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'condition_of_brakes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'condition_of_tyres',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'condition_of_steering',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'condition_of_suspension',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'condition_of_lights',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'service_completed_per_manufacturer'); ?>

	<?php echo $form->textFieldRow($model,'logbook_completed',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'other_repairs_required',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'logbook_notes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'service_not_completed_per_manufacturer',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'order_number',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_value',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'order_supplier',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
