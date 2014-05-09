<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maintenance_events_id')); ?>:</b>
	<?php echo CHtml::encode($data->maintenance_events_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_booked')); ?>:</b>
	<?php echo CHtml::encode($data->date_booked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_time')); ?>:</b>
	<?php echo CHtml::encode($data->target_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_description')); ?>:</b>
	<?php echo CHtml::encode($data->service_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_be_completed_by_old')); ?>:</b>
	<?php echo CHtml::encode($data->to_be_completed_by_old); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_completed')); ?>:</b>
	<?php echo CHtml::encode($data->date_completed); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_card_no')); ?>:</b>
	<?php echo CHtml::encode($data->job_card_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mechanice_completed')); ?>:</b>
	<?php echo CHtml::encode($data->mechanice_completed); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_be_completed_by')); ?>:</b>
	<?php echo CHtml::encode($data->to_be_completed_by); ?>
	<br />

	*/ ?>

</div>