<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'plant_id'); ?>
		<?php echo $form->textField($model,'plant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_booked_from'); ?>
		<?php echo $form->textField($model,'date_booked_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_booked_to'); ?>
		<?php echo $form->textField($model,'date_booked_to'); ?>
	</div>
    
    
	<div class="row">
		<?php echo $form->label($model,'to_be_completed_by'); ?>
		<?php echo $form->textField($model,'to_be_completed_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- wide form -->