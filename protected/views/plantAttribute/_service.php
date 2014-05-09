<?php
$service = ServiceSchedules::model();
$service->plant_id = $model->id;

    $this->widget('zii.widgets.grid.CGridView', array(
//            'id'=>'service-schedules-grid',
            'dataProvider'=>$service->search(),
//            'filter'=>$service,
            'columns'=>array(
    //		'id',
    //		'maintenance_events_id',
    //   
    //                array(
    //                    'name'=>'plant_id', 
    //                    'value'=>'$data->maintenanceevents->plant_id'
    //                    ),
                    'date_booked',
                    'target_time',
                    'service_description',
                array(
                     'name'=>'to_be_completed_by',
                     'value'=>'$data->getCompletedText()',
                     'filter'=>array(
                            '1'=>'Ray Pietra',
                            '2'=>'Mohammed Ahmed',
                            '3'=>'Contractor',
                            ),                    
                    
                 ),
                
                
                array(
                    'name'=>'status_id', 
                    'value'=>'$data->maintenanceevents->getStatusText()',
                    'filter'=>array(
                            '1'=>'Completed',
                            '0'=>'Outstanding',
                            '3'=>'Old Outstanding',
                            ),
                ),
                
                    /*
                    'date_completed',
                    'comments',
                    'user_id',
                    */

               array(
                    'header' => 'Actions',
                    'class' => 'CButtonColumn',
                    'viewButtonUrl'=>'Yii::app()->createUrl("/serviceSchedules/view", array("id" => $data->id))',
//                    'updateButtonUrl'=>'Yii::app()->createUrl("/serviceSchedules/update", array("id" => $data->id))',
//                    'deleteButtonUrl'=>'Yii::app()->createUrl("/serviceSchedules/delete", array("id" => $data->id))',
                    'template' => '{view}',
                    'buttons' => array(

                        'view' => array(
                            'label'=>'View',
//                            'visible'=> 'Yii::app()->user->checkAccess("owner")',
                            ),

//                        'update' => array(
//                            'label'=>'Update',
//                            'visible'=> 'Yii::app()->user->checkAccess("owner")',
//                            ),
//
//                         'delete' => array(
//                            'label'=>'Delete',
//                            'visible'=> 'Yii::app()->user->checkAccess("owner")',
//                            ),                       
                     ),
               ),   

            ),
    ));


?>