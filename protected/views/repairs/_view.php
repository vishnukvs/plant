<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maintenance_events_id')); ?>:</b>
	<?php echo CHtml::encode($data->maintenance_events_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_repair_logged')); ?>:</b>
	<?php echo CHtml::encode($data->date_repair_logged); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nature_of_repair')); ?>:</b>
	<?php echo CHtml::encode($data->nature_of_repair); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_completed')); ?>:</b>
	<?php echo CHtml::encode($data->date_completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobcard_no')); ?>:</b>
	<?php echo CHtml::encode($data->jobcard_no); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mechanic_id')); ?>:</b>
	<?php echo CHtml::encode($data->mechanic_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repair_request_id')); ?>:</b>
	<?php echo CHtml::encode($data->repair_request_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repair_requested_by')); ?>:</b>
	<?php echo CHtml::encode($data->repair_requested_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->update_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobcard_id')); ?>:</b>
	<?php echo CHtml::encode($data->jobcard_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobcard_condition_type')); ?>:</b>
	<?php echo CHtml::encode($data->jobcard_condition_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobcard_condition_type_value')); ?>:</b>
	<?php echo CHtml::encode($data->jobcard_condition_type_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_be_completed_by')); ?>:</b>
	<?php echo CHtml::encode($data->to_be_completed_by); ?>
	<br />

	*/ ?>

</div>