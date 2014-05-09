<?php

/**
 * This is the model class for table "job_card".
 *
 * The followings are the available columns in table 'job_card':
 * @property integer $id
 * @property integer $risk_assessment_id
 * @property integer $plant_id
 * @property integer $maintenance_events_id
 * @property integer $type_id
 * @property integer $service_or_repair_id
 * @property string $rego
 * @property integer $kilometers_or_hours
 * @property string $date_in
 * @property string $hours_in_workshop
 * @property string $lost_production_time
 * @property integer $task_id
 * @property string $time_for_task
 * @property string $description_of_work
 * @property integer $internal_or_external
 * @property string $date_completed
 * @property boolean $job_completed
 * @property boolean $vehicle_safe_for_work
 * @property integer $pay_id
 * @property integer $old_id
 * 
 * @property integer $condition_of_brakes
 * @property integer $condition_of_tyres
 * @property integer $condition_of_steering
 * @property integer $condition_of_suspension
 * @property integer $condition_of_lights
 * @property boolean $service_completed_per_manufacturer
 * @property string $service_not_completed_per_manufacturer
 * @property integer $logbook_completed
 * @property string $logbook_notes
 * @property integer $other_repairs_required
 * 
 * @property boolean $order_created
 * @property integer $order_number
 * @property string $order_value
 * @property string $order_supplier
 * 
 * @property string $old_task_id
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property RiskAssessment $riskAssessment
 * @property MaintenanceEvents $maintenanceEvents
 */
class JobCard extends PlantDatabaseActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JobCard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'job_card';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kilometers_or_hours, date_in, time_for_task, internal_or_external, vehicle_safe_for_work, job_completed', 
                            'required'),
			
                        array('risk_assessment_id, kilometers_or_hours, task_id, internal_or_external, pay_id, old_id, create_user_id, update_user_id, condition_of_brakes, condition_of_tyres, condition_of_steering, condition_of_suspension, condition_of_lights, logbook_completed, order_number', 
                            'numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>300000000),
                    
			array('rego, date_in, hours_in_workshop, lost_production_time, time_for_task, description_of_work, order_created, date_completed, job_completed, vehicle_safe_for_work, old_task_id, create_time, update_time, service_completed_per_manufacturer, service_not_completed_per_manufacturer, logbook_notes, order_number, order_value, order_supplier', 
                            'safe'),

                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, risk_assessment_id, plant_id, maintenance_events_id, type_id, service_or_repair_id, rego, kilometers_or_hours, date_in, hours_in_workshop, lost_production_time, task_id, time_for_task, description_of_work, internal_or_external, order_created, date_completed, job_completed, vehicle_safe_for_work, pay_id, old_id, old_task_id, create_time, create_user_id, update_time, update_user_id, service_completed_per_manufacturer, service_not_completed_per_manufacturer', 
                            'safe', 'on'=>'search'),

                        // Boolean types
                        array('order_created, job_completed, vehicle_safe_for_work, service_completed_per_manufacturer, order_created', 
                            'boolean'),

                        // Date type
                        array('date_in', 'type', 'type' => 'date', 
                            'message' => '{attribute} is not a date', 'dateFormat' => 'dd/MM/yyyy'),                    
                    
                        // Numeric data types 
                        array('hours_in_workshop, lost_production_time, time_for_task,',
                            'numerical', 'integerOnly'=>false, 'allowEmpty'=>false,),

                        // Numeric data types 
                        array('order_value',
                            'numerical', 'integerOnly'=>false, 'allowEmpty'=>true,),                    
                    
                    
                        // exist in table maintenance_events
                        array('maintenance_events_id','exist','className'=>'MaintenanceEvents',
                              'attributeName' => 'id',
                              'message'=>'{attribute} does not exist on database'),

                        // exist in table maintenance_events
                        array('plant_id','exist','className'=>'PlantAttribute',
                              'attributeName' => 'id',
                              'message'=>'{attribute} does not exist on database'),

                    );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                        'riskAssessment' => array(self::BELONGS_TO, 'RiskAssessment', 'risk_assessment_id'),                    
			'plantAttribute' => array(self::BELONGS_TO, 'PlantAttribute', 'plant_id'),
			'maintenanceEvents' => array(self::BELONGS_TO, 'MaintenanceEvents', 'maintenance_events_id'),			
                        'task' => array(self::BELONGS_TO, 'Task', 'task_id'),
                        'repair' => array(self::HAS_MANY, 'Repairs', 'jobcard_id'),
                        'repair_count' => array(self::STAT, 'Repairs', 'jobcard_id'),
                        'user' => array(self::BELONGS_TO, 'User', 'create_user_id'),
                    
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'risk_assessment_id' => 'Risk Assessment',
			'plant_id' => 'Plant',
			'maintenance_events_id' => 'Maintenance Events',
			'type_id' => 'Type',
			'service_or_repair_id' => 'Service Or Repair',
			'rego' => 'Rego',
			'kilometers_or_hours' => 'Kilometers Or Hours',
			'date_in' => 'Date In',
			'hours_in_workshop' => 'Hours In Workshop',
			'lost_production_time' => 'Lost Production Time',
			'task_id' => 'Task',
			'time_for_task' => 'Time Taken',
			'description_of_work' => 'Description Of Work',
			'internal_or_external' => 'Internal Or External',
			'order_created' => 'Order Created',
			'date_completed' => 'Date Completed',
			'job_completed' => 'Job Completed',
			'vehicle_safe_for_work' => 'Vehicle Safe For Work',
			'pay_id' => 'Pay',
			'old_id' => 'Old',
                    
                        // additional fields for service elements

                        'condition_of_brakes' => 'Condition of Brakes',
                        'condition_of_tyres' => 'Condition of Tyres',
                        'condition_of_steering' => 'Condition of Steering',
                        'condition_of_suspension' => 'Condition of Suspension',
                        'condition_of_lights' => 'Condition of Lights',
                    
                        'service_completed_per_manufacturer' => 'Service Completed Per Manufacturer',
                        'service_not_completed_per_manufacturer'=>'Why service is NOT completed per manufacturer',
                    
                        'logbook_completed' => 'Logbook Completed',
                        'logbook_notes'=>'(If logbook not completed)',
                    
                        'other_repairs_required' => 'Other Repairs Required',               
                    
			'old_task_id' => 'Old Task',
			'create_time' => 'Create Time',
			'create_user_id' => 'Created By',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('risk_assessment_id',$this->risk_assessment_id);
		$criteria->compare('plant_id',$this->plant_id);
		$criteria->compare('maintenance_events_id',$this->maintenance_events_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('service_or_repair_id',$this->service_or_repair_id);
		$criteria->compare('rego',$this->rego,true);
		$criteria->compare('kilometers_or_hours',$this->kilometers_or_hours);
		$criteria->compare('date_in',$this->date_in,true);
		$criteria->compare('hours_in_workshop',$this->hours_in_workshop,true);
		$criteria->compare('lost_production_time',$this->lost_production_time,true);
		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('time_for_task',$this->time_for_task,true);
		$criteria->compare('description_of_work',$this->description_of_work,true);
		$criteria->compare('internal_or_external',$this->internal_or_external);
		$criteria->compare('order_created',$this->order_created);
		$criteria->compare('date_completed',$this->date_completed,true);
		$criteria->compare('job_completed',$this->job_completed);
		$criteria->compare('vehicle_safe_for_work',$this->vehicle_safe_for_work);
		$criteria->compare('pay_id',$this->pay_id);
		$criteria->compare('old_id',$this->old_id);
		$criteria->compare('old_task_id',$this->old_task_id,true);
                
                $criteria->compare('condition_of_brakes',$this->condition_of_brakes);
                $criteria->compare('condition_of_tyres',$this->condition_of_tyres);
                $criteria->compare('condition_of_steering',$this->condition_of_steering);
                $criteria->compare('condition_of_suspension',$this->condition_of_suspension);
                $criteria->compare('condition_of_lights',$this->condition_of_lights);

                $criteria->compare('service_completed_per_manufacturer',$this->service_completed_per_manufacturer);
                $criteria->compare('service_not_completed_per_manufacturer',$this->service_not_completed_per_manufacturer,true);

                $criteria->compare('logbook_completed',$this->logbook_completed);
                $criteria->compare('logbook_notes',$this->logbook_notes,true);

                $criteria->compare('other_repairs_required',$this->other_repairs_required);
                
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function afterFind()
        {   // date in
            date_default_timezone_set('UTC');

            if($this->date_in != NULL)
            { 
              $this->date_in = date('d/m/Y',strtotime($this->date_in));
            }
            else
            {
              $this->date_in = NULL;
            }
            // date completed
            if($this->date_completed != NULL)
            {
              $this->date_completed = date('d/m/Y',strtotime($this->date_completed));
            }
            else
            {
              $this->date_completed = NULL;
            }
        return parent::afterFind();
      }
      
        /**
         * Constants to identify type_id
         */
        const TYPE_SERVICE = 1;
        const TYPE_REPAIR  = 2;      

        /**
         * @return type 
         */
        public function getTypeOption()
        {
            return array(
              self::TYPE_SERVICE => 'Service',
              self::TYPE_REPAIR  => 'Repair',
            );
        }
        /**
         * @return string for the Maintenance Type for the current Maintenance Event
         */
       public function getTypeText()
       {
           $typeOptions=$this->typeOption;
           return isset($typeOptions[$this->type_id]) ? $typeOptions[$this->type_id] :
               "unknown type ({$this->type_id})";
       }
 
       /**
        * Service Conditions brakes and steering (condition 1)
        */
       const COND1_OK_UNTIL_NEXT_SERVICE = 1;
       const COND1_REPAIR_BEFORE_NEXT_SERVICE = 2;
       const COND1_IMMEDIATE_REPAIR = 3;
       const COND1_NOT_APPLICABLE = 4;
       
      
        /**
         * @return condition1 
         */
        public function getCond1Option()
        {
            return array(
              self::COND1_OK_UNTIL_NEXT_SERVICE => 'OK Until Next Service',
              self::COND1_REPAIR_BEFORE_NEXT_SERVICE  => 'Repair Before Next Service',
              self::COND1_IMMEDIATE_REPAIR => 'Immediate Repair',
              self::COND1_NOT_APPLICABLE  => 'Not Applicable'                
            );
        }

        /**
         * @return string for condition1
         */        
       public function getCond1Text()
       {
           $cond1Options=$this->cond1Option;
           return isset($cond1Options[$this->condition_of_brakes]) ? $cond1Options[$this->condition_of_brakes] :
               "unknown type ({$this->condition_of_brakes})";

       }
       /**
        * @return type Tyres condition
        */
       public function getCondTyresText()
       {
           $cond1Options=$this->cond1Option;
               return isset($cond1Options[$this->condition_of_tyres]) ? $cond1Options[$this->condition_of_tyres] :
               "unknown type ({$this->condition_of_tyres})";
           
       }

       /**
        * Service condition for steering, suspension and lights
        */
       const COND2_GOOD = 1;
       const COND2_REPAIR_REQUIRED = 2;
       const COND2_NOT_APPLICABLE = 3;
       
        /**
         * @return condition2 
         */
        public function getCond2Option()
        {
            return array(
              self::COND2_GOOD => 'Good',
              self::COND2_REPAIR_REQUIRED  => 'Repair Required',
              self::COND2_NOT_APPLICABLE => 'Not Applicable',
            );
        }
 
 
        /**
         * @return string for the Steering
         */
       public function getCondSteeringText()
       {
           $cond2Options=$this->cond2Option;
           return isset($cond2Options[$this->condition_of_steering]) ? $cond2Options[$this->condition_of_steering] :
               "unknown type ({$this->condition_of_steering})";
       }

       /**
         * @return string for the Suspension
         */
       public function getCondSuspensionText()
       {
           $cond2Options=$this->cond2Option;
           return isset($cond2Options[$this->condition_of_suspension]) ? $cond2Options[$this->condition_of_suspension] :
               "unknown type ({$this->condition_of_suspension})";
       }
       
       /**
         * @return string for the Suspension
         */
       public function getCondLightsText()
       {
           $cond2Options=$this->cond2Option;
           return isset($cond2Options[$this->condition_of_lights]) ? $cond2Options[$this->condition_of_lights] :
               "unknown type ({$this->condition_of_lights})";
       }

       
       /**
        * Service condition for steering, suspension and lights
        */
       const LOG_YES = 1;
       const LOG_NO = 2;
       const LOG_NA = 3;
       
        /**
         * @return condition2 
         */
        public function getLogOption()
        {
            return array(
              self::LOG_YES => 'Yes',
              self::LOG_NO  => 'No',
              self::LOG_NA  => 'Not Applicable',
            );
        }
 
        /**
         * @return string for the condition2
         */
       public function getLogText()
       {
           $logOptions=$this->logOption;
           return isset($logOptions[$this->logbook_completed]) ? $logOptions[$this->logbook_completed] :
               "unknown type ({$this->logbook_completed})";
       }       
       

       protected function beforeValidate()
       {
         // custom validation for service records  
         if($this->type_id == 1) 
         {  
             if($this->condition_of_brakes == null)
             {
                $this->addError("condition_of_brakes",
                        "Select condition of Brakes.");
              } 

             if($this->condition_of_tyres == null)
             {
                $this->addError("condition_of_tyres",
                        "Select condition of Tyres.");
             }           

             if($this->condition_of_steering == null)
             {
                $this->addError("condition_of_steering",
                        "Select condition of Steering.");
              } 

             if($this->condition_of_suspension == null)
             {
                $this->addError("condition_of_suspension",
                        "Select condition of Suspension.");
             }          

             if($this->condition_of_lights == null)
             {
                $this->addError("condition_of_lights",
                        "Select condition of Lights.");
             }

             if($this->service_completed_per_manufacturer == 0  && $this->service_not_completed_per_manufacturer === "")
             {
                $this->addError("service_not_completed_per_manufacturer",
                        "Please update why service was NOT completed per manufacturer.");
             }   
             
             if($this->logbook_completed == null)
             {
                $this->addError("logbook_completed",
                        "Logbook Completed: Select if Logbook completed.");
             }

             if($this->logbook_completed == 2  && $this->logbook_notes === "")
             {
                $this->addError("logbook_notes",
                        "Logbook Notes: Please update why log book was NOT completed.");
             }
          
            
         } // end service types
         
         // IF Order created...
         if($this->order_created == true) 
         {  
             if($this->order_number == null)
             {
                $this->addError("order_number",
                        "Order Number: Include order number.");
             }
         
             if($this->order_supplier == null)
             {
                $this->addError("order_supplier",
                        "Order Supplier: Update the order supplier.");
             }

             if($this->order_value == null)
             {
                $this->addError("order_value",
                        "Order value: Enter amount for order.");
             }
             
         }
         
         // numeric values
         if($this->order_value === "")
         {
             $this->order_value = null;
         }
         
        return parent::beforeValidate();
        }
       
}