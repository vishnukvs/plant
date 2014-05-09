<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'maintenance_events_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_repair_logged',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'nature_of_repair',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'date_completed',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'comments',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'jobcard_no',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'mechanic_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'repair_request_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'repair_requested_by',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'category_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jobcard_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jobcard_condition_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jobcard_condition_type_value',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'to_be_completed_by',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
