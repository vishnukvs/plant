<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
)); ?>
 
<?php echo $form->errorSummary(array($model,$b)); ?>
 
<div class="row">
    <?php echo $form->labelEx($model,'plant_id'); ?>
    <?php echo $form->textField($model,'plant_id'); ?>
    <?php echo $form->error($model,'plant_id'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($b,'service_description'); ?>
    <?php echo $form->textField($b,'service_description'); ?>
    <?php echo $form->error($b,'service_description'); ?>
</div>

<div class="row buttons">
        <?php echo CHtml::submitButton(); ?>
</div>
 
<?php $this->endWidget(); ?>