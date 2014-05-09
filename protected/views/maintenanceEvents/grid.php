<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maintenance-events-grid',
	'columns'=>array(
	/*	'id',
		'plant_id',
  */
		'maintenance_type',
		'date_event_logged',
		'status',
    'date_completed',
    'target_time',
		/*
		'user_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
