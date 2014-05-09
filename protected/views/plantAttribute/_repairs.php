<?php

$repair = Repairs::model();
$repair->plant_id = $model->id;


$this->widget('zii.widgets.grid.CGridView', array(
        //'id'=>'repairs-grid',
        'dataProvider'=>$repair->search(),
        //'filter'=>$repair,
        'columns'=>array(
//                array(
//                    'name'=>'plant_id', 
//                    'value'=>'$data->maintenanceevents->plant_id'
//                    ),
                'date_repair_logged',
                'nature_of_repair',
                     array(
                      'name'=>'category_id',
                      'value'=>'$data->category_id = $data->getCategoryText()',  
                        'filter'=>array(
                            '1'=>'Minor Repair',
                            '2'=>'Major Repair',
                            '3'=>'Safety-related - Vehicle Grounded',
                            ),
                    ),
                'date_completed',
                'comments',
            
                            array(
                    'name'=>'status_id', 
                    'value'=>'$data->maintenanceevents->getStatusText()',
                    'filter'=>array(
                            '1'=>'Completed',
                            '0'=>'Outstanding',
                            '3'=>'Old Outstanding',
                            ),
                ),

            array(
                'header' => 'Actions',
                'class' => 'CButtonColumn',
                'viewButtonUrl'=>'Yii::app()->createUrl("/repairs/view", array("id" => $data->id))',
//                'updateButtonUrl'=>'Yii::app()->createUrl("/repairs/update", array("id" => $data->id))',
//                'deleteButtonUrl'=>'Yii::app()->createUrl("/repairs/delete", array("id" => $data->id))',
                'template' => '{view}',
                'buttons' => array(

                    'view' => array(
                        'label'=>'View',
                      //  'visible'=> 'Yii::app()->user->checkAccess("owner")',
                        ),

//                    'update' => array(
//                        'label'=>'Update',
//                        'visible'=> 'Yii::app()->user->checkAccess("owner")',
//                        ),

//                     'delete' => array(
//                        'label'=>'Delete',
//                        'visible'=> 'Yii::app()->user->checkAccess("owner")',
//                        ),                       
                 ),
           ),   

       ),
));



?>