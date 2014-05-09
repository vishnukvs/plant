<?php

/**
 * This is the model class for table "repairs".
 *
 * The followings are the available columns in table 'repairs':
 * @property integer $id
 * @property integer $maintenance_events_id
 * @property string $date_repair_logged
 * @property string $nature_of_repair
 * @property string $date_completed
 * @property string $comments
 * @property string $jobcard_no
 * @property integer $mechanic_id
 * @property integer $repair_request_id
 * @property string $repair_requested_by
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 * @property integer $category_id
 * @property integer $jobcard_id
 * @property integer $jobcard_condition_type
 * @property integer $jobcard_condition_type_value
 * @property integer $to_be_completed_by
 * 
 * The followings are the available model relations:
 * @property MaintenanceEvents $maintenanceEvents
 */
class Repairs extends PlantDatabaseActiveRecord
{
        public $plant_id;
        public $status_id;
        
        public $vehicle_maker_id;
        public $model;
        public $description;
        
        
        
	/**
	 * Returns the static model of the specified AR class.
	 * @return Repairs the static model class
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
		return 'repairs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_repair_logged, category_id, to_be_completed_by', 'required'),
			array('maintenance_events_id, mechanic_id, repair_request_id, create_user_id, update_user_id, category_id, to_be_completed_by', 'numerical', 'integerOnly'=>true),
			array('date_repair_logged, nature_of_repair, date_completed, comments, jobcard_no, repair_requested_by, jobcard_id, jobcard_condition_type_value, jobcard_condition_type, create_time, update_time, plant_id, status_id, vehicle_maker_id', 'safe'),
                    
                          array('date_repair_logged', 'type', 'type' => 'date', 
                                'message' => '{attribute} is not a date', 
                                'dateFormat' => 'dd/MM/yyyy'),
                    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, maintenance_events_id, date_repair_logged, nature_of_repair, date_completed, comments, jobcard_no, mechanic_id, repair_request_id, repair_requested_by, create_time, create_user_id, update_time, update_user_id, category_id, to_be_completed_by, vehicle_maker_id, model, description', 'safe', 'on'=>'search'),
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
                  'maintenanceEvents' => array(self::BELONGS_TO, 'MaintenanceEvents', 'maintenance_events_id'),
                  'maintenanceevents' => array(self::BELONGS_TO, 'MaintenanceEvents', 'maintenance_events_id'),
                  'createUser' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
                  'updateUser' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
                  'jobCard' => array(self::BELONGS_TO, 'JobCard', 'jobcard_id'),
                  
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'maintenance_events_id' => 'Maintenance Event ID',
			'date_repair_logged' => 'Date Repair Logged',
			'nature_of_repair' => 'Nature Of Repair',
			'date_completed' => 'Date Completed',
			'comments' => 'Comments',
			'jobcard_no' => 'Jobcard No',
                        'jobcard_id' => 'Associated Job Card',
                        'jobcard_condition_type'=>'Jobcard Condition Type',
                        'jobcard_condition_type_value'=>'Jobcard Condition Category',
			'mechanic_id' => 'Mechanic',
			'repair_request_id' => 'Repair Request Number',
			'repair_requested_by' => 'Repair Requested By',
                        'plant_id' => 'Plant ID',
                        'status_id' => 'Status',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
			'category_id' => 'Category',
                        'to_be_completed_by' => 'To Be Completed By',
                    
                        'vehicle_maker_id' => 'Make',
                        'model' => 'Model',
                        'description' => 'Description'
                    
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
                
//                $criteria->together = true;
                $criteria->with = array('maintenanceevents', 'maintenanceevents.plantattribute');
                
              


		$criteria->compare('id',$this->id);
		$criteria->compare('maintenance_events_id',$this->maintenance_events_id);
		$criteria->compare('date_repair_logged',$this->date_repair_logged,true);
		$criteria->compare('nature_of_repair',$this->nature_of_repair,true);
		$criteria->compare('date_completed',$this->date_completed,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('jobcard_no',$this->jobcard_no,true);
		$criteria->compare('mechanic_id',$this->mechanic_id);
		$criteria->compare('repair_request_id',$this->repair_request_id);
		$criteria->compare('repair_requested_by',$this->repair_requested_by,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('category_id',$this->category_id);
		
		$criteria->compare('jobcard_id',$this->jobcard_id);
                $criteria->compare('jobcard_condition_type',$this->jobcard_condition_type);
		$criteria->compare('jobcard_condition_type_value',$this->jobcard_condition_type_value);

                $criteria->compare('to_be_completed_by',$this->to_be_completed_by);

                
                //$criteria->compare('maintenanceevents.plantattribute.vehicle_maker_id', $this->vehicle_maker_id);

                $criteria->compare('maintenanceevents.plant_id',$this->plant_id);
                $criteria->compare('maintenanceevents.status_id',$this->status_id);
                
                
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                        'attributes'=>array(
                            'plant_id'=>array(
                                'asc'=>'maintenanceevents.plant_id',
                                'desc'=>'maintenanceevents.plant_id DESC',
                            ),
                            'status_id'=>array(
                                'asc'=>'maintenanceevents.status_id',
                                'desc'=>'maintenanceevents.status_id DESC',                                
                            ),
                            
                            '*',
                        ),
                    ),
		));
	}


      public function afterFind()
      {
        date_default_timezone_set('UTC');

        if($this->date_repair_logged != NULL)
        { 
          $this->date_repair_logged = date('d/m/Y',strtotime($this->date_repair_logged));
        }
        else
        {
          $this->date_repair_logged = NULL;
        }



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
         * Constants to identify category_id
         */
        const CATEGORY_MINOR  = 1;
        const CATEGORY_MAJOR  = 2;
        const CATEGORY_SAFETY = 3;
        
        /**
         * @return category
         */
        public function getCategoryOption()
        {
            return array(
              self::CATEGORY_MINOR  => 'Minor Repair',
              self::CATEGORY_MAJOR  => 'Major Repair',
              self::CATEGORY_SAFETY => 'Safety related - Vehicle Grounded',
            );
        }
        
        /**
         * @return string for the Category Options for the current Repair
         */
       public function getCategoryText()
       {
           $categoryOptions=$this->categoryOption;
           return isset($categoryOptions[$this->category_id]) ? $categoryOptions[$this->category_id] :
               "Unknown Category {$this->category_id}";
       }        
       /**
        * Constants to identify condition_id
        */
       const CONDITION_BRAKES  = 1;
       const CONDITION_TYRES  = 2;
       const CONDITION_STEERING = 3;     
       const CONDITION_SUSPENSION  = 4;
       const CONDITION_LIGHTS = 5;
       
        /**
         * @return condition option
         */
        public function getConditionOption()
        {
            return array(
              self::CONDITION_BRAKES  => 'Brakes',
              self::CONDITION_TYRES  => 'Tyres',
              self::CONDITION_STEERING => 'Steering',
              self::CONDITION_SUSPENSION  => 'Suspension',
              self::CONDITION_LIGHTS => 'Lights',
              );
        }       

        /**
         * @return string for the Condition Options for the current Repair
         */
       public function getConditionText()
       {
           $conditionOptions = $this->conditionOption;
           return isset($conditionOptions[$this->jobcard_condition_type]) ? $conditionOptions[$this->jobcard_condition_type] :
               "Unknown Condition {$this->jobcard_condition_type}";
       }   

       /**
        * Jobcard condition_value
        */
       
       const VAL_REPAIR_BEFORE_NEXT_SERVICE = 1;
       const VAL_REPAIR_REQUIRED = 2;
       const VAL_IMMEDIATE_REPAIR = 3;

       
        /**
         * @return value 
         */
        public function getValueOption()
        {
            return array(
              self::VAL_REPAIR_BEFORE_NEXT_SERVICE => 'Repair Before Next Service',
              self::VAL_REPAIR_REQUIRED  => 'Repair Required',
              self::VAL_IMMEDIATE_REPAIR => 'Immediate Repair',
            );
        }
       
        /**
         * @return string for the Value Options for the current Repair
         */
       public function getValueText()
       {
           $valueOptions = $this->valueOption;
           return isset($valueOptions[$this->jobcard_condition_type_value]) ? $valueOptions[$this->jobcard_condition_type_value] :
               "Unknown Value {$this->jobcard_condition_type_value}";
       }
       
       
        /**
         * Constants to identify to_be_completed_by_id
         */
        const BY_RAY  = 1;
        const BY_MAC  = 2;
        const BY_CONTRACTOR = 3;
        
        /**
         * @return category
         */
        public function getCompletedOption()
        {
            return array(
              self::BY_RAY  => 'Ray Pietra',
              self::BY_MAC  => 'Mohammed Ahmed',
              self::BY_CONTRACTOR => 'Contractor',
            );
        }
        
        /**
         * @return string for the Category Options for the current Repair
         */
       public function getCompletedText()
       {
           $completedOptions=$this->completedOption;
           return isset($completedOptions[$this->to_be_completed_by]) ? $completedOptions[$this->to_be_completed_by] :
               "Unknown{$this->to_be_completed_by}";
       }
        
        
}