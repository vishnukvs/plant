<?php

/**
 * This is the model class for table "service_schedules".
 *
 * The followings are the available columns in table 'service_schedules':
 * @property integer $id
 * @property integer $maintenance_events_id
 * @property string $date_booked
 * @property integer $target_time
 * @property string $service_description
 * @property integer $to_be_completed_by
 * @property string $date_completed
 * @property string $comments
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class ServiceSchedules extends PlantDatabaseActiveRecord
{
        public $plant_id;
        public $status_id;
        public $estimated_disposal_date;
        
        public $vehicle_maker_id;
        public $model;
        public $description;
        
        public $interval;
        public $year_month;
        
        
	/**
	 * Returns the static model of the specified AR class.
	 * @return ServiceSchedules the static model class
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
		return 'service_schedules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
      array('date_booked, target_time, 
            service_description, to_be_completed_by, create_user_id', 'required'),


      array('maintenance_events_id, create_user_id, update_user_id, to_be_completed_by, vehicle_maker_id, interval', 
            'numerical', 'integerOnly'=>true),

//      array('comments', 'safe'),

      // The following rule is used by search().
			
      array('id, maintenance_events_id, date_booked, target_time, 
            service_description, to_be_completed_by, date_completed, 
            comments, create_user_id, update_user_id, plant_id, status_id, 
            vehicle_maker_id, model, description, year_month', 
            'safe', 'on'=>'search'),

      array('maintenance_events_id','unique','className'=>'ServiceSchedules',
            'message'=>'{attribute} exist on database.  You are trying to 
                re-create a service Record.'),
                    
      array('date_booked', 'type', 'type' => 'date', 
            'message' => '{attribute} is not a date', 
            'dateFormat' => 'dd/MM/yyyy'),

      // empty value are assinged with NULL
      array('date_completed, target_time',
            'default','setOnEmpty'=>true, 'value'=>NULL),

      // Numeric data types 
      array('target_time',
            'numerical', 'integerOnly'=>false, 'allowEmpty'=>NULL),
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
                  'maintenance' => array(self::BELONGS_TO, 'MaintenanceEvents', 'maintenance_events_id'),            
                    
                  'createUser' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
                  'updateUser' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
                  'jobCard' => array(self::HAS_ONE, 'JobCard', 'maintenance_events_id'),                    

                  //'jobCardCount' => array(self::STAT, 'JobCard', 'maintenance_events_id'),
                    

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
			'date_booked' => 'Date Service Booked',
			'target_time' => 'Target Time',
			'service_description' => 'Service Description',
			'to_be_completed_by' => 'To Be Completed By',
			'date_completed' => 'Date Completed',
			'comments' => 'Comments',
                    
                        'plant_id' => 'Plant ID',
                        'status_id' => 'Status',
                    
                        'vehicle_maker_id' => 'Make',
                        'model' => 'Model',
                        'description' => 'Description',
                        'estimated_disposal_date' => 'Estimated Disposal Date',
                        'interval' => 'Interval Value',
                    
                        'create_time'=>'Create Time',
                        'create_user_id'=>'Create User',
                        'update_time'=>'Update Time',
                        'update_user_id'=>'Update User',
                    
                        'year_month' => 'Year Month',
                    

		);
	}
        
        protected function afterFind()
        {
            // convert to display format
            if ($this->date_booked != NULL)
            {
                $this->date_booked = date ('d/m/Y', strtotime ($this->date_booked));
            } else
            {
                $this->date_booked = NULL;
            }
            parent::afterFind();
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

                $criteria->with = array('maintenanceevents', 'maintenanceevents.plantattribute');
                
                $criteria->select=array(" extract(year from date_booked)||'-'|| to_char(date_booked, 'Month') as year_month ", '*' );
                
		$criteria->compare('id',$this->id);
                $criteria->compare('maintenance_events_id',$this->maintenance_events_id);
		$criteria->compare('date_booked',$this->date_booked,false);
		$criteria->compare('target_time',$this->target_time);
		$criteria->compare('service_description',$this->service_description,true);
		$criteria->compare('to_be_completed_by',$this->to_be_completed_by);
		$criteria->compare('date_completed',$this->date_completed,false);
		$criteria->compare('comments',$this->comments,true);
                
                $criteria->compare('create_time',$this->create_time,true);
                $criteria->compare('create_user_id',$this->create_user_id);
                $criteria->compare('update_time',$this->update_time,true);
                $criteria->compare('update_user_id',$this->update_user_id);
                
                $criteria->compare('maintenanceevents.plant_id',$this->plant_id);
                $criteria->compare('maintenanceevents.status_id',$this->status_id);
                $criteria->compare(" extract(year from date_booked)||'-'|| to_char(date_booked, 'Month') ",$this->year_month,true);

                
                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
                        'sort'=>array(
                        'attributes'=>array(
                            'plant_id'=>array(
                                'asc'=>'maintenanceevents.plant_id',
                                'desc'=>'maintenanceevents.plant_id DESC',
                            ),
                            
                                'year_month'=>array(
                                    'asc'=>"extract(year from date_booked)||'-'||  to_char(date_booked, 'MM') ",
                                    'desc'=>"extract(year from date_booked)||'-'||  to_char(date_booked, 'MM') DESC",
                                ), 

                            'status_id'=>array(
                                'asc'=>'maintenanceevents.status_id',
                                'desc'=>'maintenanceevents.status_id DESC',                                
                            ),                            
                            
                            'description'=>array(
                                'asc'=>'plantattribute.description',
                                'desc'=>'plantattribute.description DESC',                                
                            ),                            
                            
                            '*',
                        ),
                    ),
		));
	}

        
        
        
        /**
         * Constants to identify to_be_completed_by_id
         */
        const BY_RAY  = 1;
        const BY_MAC  = 2;
        const BY_CONTRACTOR = 3;
        const BY_UNASSIGNED = 0;        
        /**
         * @return category
         */
        public function getCompletedOption()
        {
            return array(
              self::BY_RAY  => 'Ray Pietra',
              self::BY_MAC  => 'Mohammed Ahmed',
              self::BY_CONTRACTOR => 'Contractor',
              self::BY_UNASSIGNED => 'Unassigned',
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

       
       public function getIntervalOption()
       {
           return array(
                1 => '1 month',
                2 => '2 months',
                3 => '3 months',
                4 => '4 months',
                5 => '5 months',
                6 => '6 months',
                7 => '7 months',
                8 => '8 months',
                9 => '9 months',
                10 => '10 months',
                11 => '11 months',
                12 => '12 months',
                );
       }
 
       public function getIntervalText()
       {
           $intervalOptions=$this->intervalOption;
           return isset($intervalOptions[$this->interval]) ? $intervalOptions[$this->interval] :
               "Unknown{$this->interval}";           
       }




       
}
