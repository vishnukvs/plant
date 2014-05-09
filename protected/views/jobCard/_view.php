<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('risk_assessment_id')); ?>:</b>
	<?php echo CHtml::encode($data->risk_assessment_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plant_id')); ?>:</b>
	<?php echo CHtml::encode($data->plant_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maintenance_events_id')); ?>:</b>
	<?php echo CHtml::encode($data->maintenance_events_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_or_repair_id')); ?>:</b>
	<?php echo CHtml::encode($data->service_or_repair_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rego')); ?>:</b>
	<?php echo CHtml::encode($data->rego); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kilometers_or_hours')); ?>:</b>
	<?php echo CHtml::encode($data->kilometers_or_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_in')); ?>:</b>
	<?php echo CHtml::encode($data->date_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hours_in_workshop')); ?>:</b>
	<?php echo CHtml::encode($data->hours_in_workshop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lost_production_time')); ?>:</b>
	<?php echo CHtml::encode($data->lost_production_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_id')); ?>:</b>
	<?php echo CHtml::encode($data->task_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_for_task')); ?>:</b>
	<?php echo CHtml::encode($data->time_for_task); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_of_work')); ?>:</b>
	<?php echo CHtml::encode($data->description_of_work); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('internal_or_external')); ?>:</b>
	<?php echo CHtml::encode($data->internal_or_external); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_created')); ?>:</b>
	<?php echo CHtml::encode($data->order_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_completed')); ?>:</b>
	<?php echo CHtml::encode($data->date_completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_completed')); ?>:</b>
	<?php echo CHtml::encode($data->job_completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_safe_for_work')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_safe_for_work); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_id')); ?>:</b>
	<?php echo CHtml::encode($data->pay_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('old_id')); ?>:</b>
	<?php echo CHtml::encode($data->old_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('old_task_id')); ?>:</b>
	<?php echo CHtml::encode($data->old_task_id); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition_of_brakes')); ?>:</b>
	<?php echo CHtml::encode($data->condition_of_brakes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition_of_tyres')); ?>:</b>
	<?php echo CHtml::encode($data->condition_of_tyres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition_of_steering')); ?>:</b>
	<?php echo CHtml::encode($data->condition_of_steering); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition_of_suspension')); ?>:</b>
	<?php echo CHtml::encode($data->condition_of_suspension); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition_of_lights')); ?>:</b>
	<?php echo CHtml::encode($data->condition_of_lights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_completed_per_manufacturer')); ?>:</b>
	<?php echo CHtml::encode($data->service_completed_per_manufacturer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logbook_completed')); ?>:</b>
	<?php echo CHtml::encode($data->logbook_completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_repairs_required')); ?>:</b>
	<?php echo CHtml::encode($data->other_repairs_required); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logbook_notes')); ?>:</b>
	<?php echo CHtml::encode($data->logbook_notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_not_completed_per_manufacturer')); ?>:</b>
	<?php echo CHtml::encode($data->service_not_completed_per_manufacturer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_number')); ?>:</b>
	<?php echo CHtml::encode($data->order_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_value')); ?>:</b>
	<?php echo CHtml::encode($data->order_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->order_supplier); ?>
	<br />

	*/ ?>

</div>