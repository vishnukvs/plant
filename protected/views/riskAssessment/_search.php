<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'plant_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'maintenance_events_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'service_or_repair_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'location',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'work_method_statements',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'site_traffic_control_id',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'ppe'); ?>

	<?php echo $form->textAreaRow($model,'ppe_action',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxRow($model,'hazards_identified'); ?>

	<?php echo $form->textAreaRow($model,'hazards',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'risk_rating',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'additional_potential_hazard',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'risk_assesment_by',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'risk_controls_by',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_user_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
