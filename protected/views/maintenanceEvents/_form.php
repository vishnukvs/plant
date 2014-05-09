<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'maintenance-events-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'plant_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'maintenance_type',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'date_event_logged',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'status',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'date_completed',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'maintenance_event_status_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'maintenance_event_type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
