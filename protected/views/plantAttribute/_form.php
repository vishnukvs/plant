<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'plant-attribute-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'expenses_work_order',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'classification_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'rego',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'make',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'model',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'division_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'shared_user',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'fuel_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'consumption',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'colour',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'old_unit',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'vin_number',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'engine_number',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'purchase_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'life_in_months',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estimated_disposal_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'purchase_price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estimated_disposal_price',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'service_day',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'section_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'vehicle_maker_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'custodian_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_user_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
