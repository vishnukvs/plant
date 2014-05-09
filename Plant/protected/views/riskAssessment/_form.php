<?php
$cs = Yii::app()->getClientScript();  
$cs->registerScript(
  'checkbox',
  "function showForm(){
    // ppe
    if (document.getElementById('ppe').checked==true){
        document.getElementById('ppe-div').style.display=\"block\";
    } else {
        document.getElementById('ppe-div').style.display=\"none\";
    };
    
    // hazards
    if (document.getElementById('hazards_identified').checked==true){
        document.getElementById('hazards-identified-div').style.display=\"block\";
    } else {
        document.getElementById('hazards-identified-div').style.display=\"none\";
    };

   }",
  CClientScript::POS_END
);

$cs->registerScript(
        'tool-tip',
        "// execute your scripts when the DOM is ready. this is a good habit
        $(function() {



        // select all desired input fields and attach tooltips to them
        $(\"#form :input\").tooltip({

                // place tooltip on the right edge
                position: \"center right\",

                // a little tweaking of the position
                offset: [-2, 10],

                // use the built-in fadeIn/fadeOut effect
                effect: \"fade\",

                // custom opacity setting
                opacity: 0.7

        });
        });",
        CClientScript::POS_END
        );

?>  
    
<?php
  $baseUrl = Yii::app()->baseUrl;
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/js/jquery.tools.min.js');
  $cs->registerCssFile($baseUrl.'/css/tooltip-generic.css');
?>    

<div class="form" id="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'risk-assessment-form',
	'enableAjaxValidation'=>false,
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
		<?php echo $form->labelEx($model,'plant_id'); ?>
		<?php echo $form->textField($model,'plant_id',array('disabled'=>true)); ?>
		<?php echo $form->error($model,'plant_id'); ?>
	</div>
        	<?php echo $form->hiddenField($model,'maintenance_events_id'); ?>
		<?php echo $form->hiddenField($model,'type_id'); ?>
		<?php echo $form->hiddenField($model,'service_or_repair_id'); ?>

        <hr></hr>
        
	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textArea($model,'location',array('rows'=>6, 'cols'=>50, 'title'=>"Enter location.")); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_method_statements'); ?>
		<?php echo $form->textArea($model,'work_method_statements',array('rows'=>6, 'cols'=>50, 'title'=>"Enter work methods statement.")); ?>
		<?php echo $form->error($model,'work_method_statements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_traffic_control_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'site_traffic_control_id',
		CHtml::listData(SiteTrafficControl::model()->findAll(array('order'=>'id ASC')),'id','name'),
					array('prompt'=>'Select Site Traffic Control...', 'title'=>"Select site traffic control."));?>
		<?php echo $form->error($model,'site_traffic_control_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ppe'); ?>
		<?php echo $form->checkBox($model,'ppe',array('id'=>"ppe", 'onclick'=>"showForm()",'title'=>"PPE.")); ?>
		<?php echo $form->error($model,'ppe'); ?>
	</div>

        <div id="ppe-div" style="display:<?php if($model->ppe == true){echo 'block';} else {echo 'none';} ?>">
            <div class="row">
                    <?php echo $form->labelEx($model,'ppe_action'); ?>
                    <?php echo $form->textArea($model,'ppe_action',array('rows'=>6, 'cols'=>50,'title'=>"Do all team members have appropriate Personal Protective Equipment (PPE).")); ?>
                    <?php echo $form->error($model,'ppe_action'); ?>
            </div>
        </div>
            
	<div class="row">
		<?php echo $form->labelEx($model,'hazards_identified'); ?>
		<?php echo $form->checkBox($model,'hazards_identified',array('id'=>"hazards_identified", 'onclick'=>"showForm()",'title'=>"Are there any Hazards Identified?")); ?>
		<?php echo $form->error($model,'hazards_identified'); ?>
	</div>

        <div id="hazards-identified-div" style="display:<?php if($model->hazards_identified == true){echo 'block';} else {echo 'none';} ?>">
            <div class="row">
                    <?php echo $form->labelEx($model,'hazards'); ?>
                    <?php echo $form->textArea($model,'hazards',array('rows'=>6, 'cols'=>50, 'title'=>"List Hazards.")); ?>
                    <?php echo $form->error($model,'hazards'); ?>
            </div>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'risk_rating'); ?>
		<?php echo $form->textField($model,'risk_rating', array('title'=>"Risk Rating.")); ?>
		<?php echo $form->error($model,'risk_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_potential_hazard'); ?>
		<?php echo $form->textArea($model,'additional_potential_hazard',array('rows'=>6, 'cols'=>50, 'title'=>"Additional Potential Hazards.")); ?>
		<?php echo $form->error($model,'additional_potential_hazard'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'risk_assesment_by'); ?>
            
         
		<?php /* echo CHtml::dropDownList('risk_assesment_by', Yii::app()->user->id,
                    CHtml::listData(User::model()->findAll(array('order'=>'id ASC')),'id','username'),
					array('disabled'=>true, 'title'=>"Current User")); */?>
           
            	<?php echo $form->textField($model,'risk_assesment_by',array('disabled'=>true)); ?>
		<?php echo $form->error($model,'risk_assesment_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'risk_controls_by'); ?>
		<?php echo $form->textArea($model,'risk_controls_by',array('rows'=>6, 'cols'=>50, 'title'=>"Risk Controls By.")); ?>
		<?php echo $form->error($model,'risk_controls_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('title'=>"Create Risk Assessment.")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->