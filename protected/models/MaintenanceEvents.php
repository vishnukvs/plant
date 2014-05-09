<?php

/**
 * This is the model class for table "maintenance_events".
 *
 * The followings are the available columns in table 'maintenance_events':
 * @property integer $id
 * @property integer $plant_id
 * @property string $maintenance_type
 * @property string $date_event_logged
 * @property string $status
 * @property string $date_completed
 * @property integer $type_id
 * @property integer $status_id
 * 
 * @property string $create_user
 * @property string $create_time
 * @property string $update_user
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Repairs[] $repairs
 * @property PlantAttributes $plant
 */
class MaintenanceEvents extends PlantDatabaseActiveRecord 
{
        // service
        public $date_booked, $target_time, $service_description, $to_be_completed_by, $year_month;
        public $date_booked_from, $date_booked_to;
        
        // repair
        public $custodian_id, $date_repair_logged, $nature_of_repair, $category_id, $r_to_be_completed_by;
        
        
    
        /**
         * Constants to identify type_id
         */
        const TYPE_SERVICE = 1;
        const TYPE_REPAIR  = 2;

        /**
         * Constants to identify status_id
         */
        const STATUS_COMPLETED      = 1;
        const STATUS_OUTSTANDING    = 0;
        const STATUS_OLDCOMPLETED   = 3;
        
        /**
	 * Returns the static model of the specified AR class.
	 * @return MaintenanceEvents the static model class
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
		return 'maintenance_events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plant_id, type_id, status_id', 'required'),
			array('plant_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, plant_id, maintenance_type, date_event_logged, status, date_completed, create_user_id, year_month,
                            date_booked, target_time, service_description, to_be_completed_by, date_booked_from, date_booked_to,
                            date_repair_logged, nature_of_repair, category_id, r_to_be_completed_by, custodian_id', 
                              'safe', 'on'=>'search'),
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
			'repairs' => array(self::HAS_ONE, 'Repairs', 'maintenance_events_id','order'=>'repairs.create_time ASC',),
			'service' => array(self::HAS_ONE, 'ServiceSchedules', 'maintenance_events_id','order'=>'date_booked ASC'),
			'plantAttribute' => array(self::BELONGS_TO, 'PlantAttribute', 'plant_id'),
			'plantattribute' => array(self::BELONGS_TO, 'PlantAttribute', 'plant_id'),
			'user' => array(self::BELONGS_TO, 'User', 'create_user_id'),
      
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Maintenance Events ID',
			'plant_id' => 'Plant ID',
			'date_event_logged' => 'Date Event Logged',
                        'type_id' => 'Maintenance Type',
                        'status_id' => 'Status',
                        'date_completed' => 'Date Completed',
                        'target_time' => 'Target Time',
                    
                        

                        'create_user_id' => 'Created By',
                        'create_time' => 'Create Time',
                        'update_user' => 'Updated By',
                        'update_time' => 'Update Time',
                    
                        // related service records
                        'date_booked' => 'Date Booked',
                        'target_time' => 'Target Time',
                        'service_description' => 'Description',
                        'to_be_completed_by' => 'To Be Completed By',
                        'date_booked_from' => 'Date Booked From',
                        'date_booked_to' => 'Date Booked To',
                        'year_month' => 'Month',
                        
                    
                        // repair
                        'date_repair_logged' =>'Date Repair Logged',
                        'nature_of_repair' => 'Nature of Repair',
                        'category_id' => 'Category',
                        'r_to_be_completed_by' => 'To Be Completed By',
                        'custodian_id' => 'Custodian',
                    );
	}

        /**
         * @return string custom format for date_event_logged
         */
        protected function afterFind ()
        {
                // convert to display format
            if ($this->date_event_logged != NULL)
            {
                $this->date_event_logged = strtotime ($this->date_event_logged);
                $this->date_event_logged = date ('d/m/Y g:i:s A', $this->date_event_logged);
            } else
            {
                $this->date_event_logged = NULL;
            }

            if ($this->date_completed != NULL)
            {
                $this->date_completed = strtotime ($this->date_completed);
                $this->date_completed = date ('d/m/Y g:i:s A', $this->date_completed);
            } else
            {
                $this->date_completed = NULL;
            }            
            
            
            parent::afterFind ();
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
                
                $criteria->with = array('service', 'repairs', 'plantattribute');

		$criteria->compare('id',$this->id);
		$criteria->compare('plant_id',$this->plant_id);

		$criteria->compare('date_event_logged',$this->date_event_logged,false);
		$criteria->compare('date_completed',$this->date_completed,false);
                
		$criteria->compare('t.type_id',$this->type_id);
		$criteria->compare('t.status_id',$this->status_id);
                
                
                $criteria->compare('create_time',$this->create_time,true);
                $criteria->compare('t.create_user_id',$this->create_user_id);
                $criteria->compare('update_time',$this->update_time,true);
                $criteria->compare('update_user_id',$this->update_user_id);

                // service records
                $criteria->select=array(" extract(year from date_booked)||' '|| to_char(date_booked, 'Month') as year_month ", '*' );
                $criteria->compare('date_booked',$this->date_booked);
                $criteria->compare('target_time',$this->target_time);
                $criteria->compare('service_description',$this->service_description,true);
                $criteria->compare('service.to_be_completed_by',$this->to_be_completed_by);
                $criteria->compare(" extract(year from service.date_booked)||' '|| to_char(service.date_booked, 'Month') ",$this->year_month,true);

                if(!empty($this->date_booked_from) && !empty($this->date_booked_to))  
                {
                    $criteria->condition = 'date_booked BETWEEN :date_booked_from AND :date_booked_to';
                    $criteria->params=array(':date_booked_from'=>$this->date_booked_from, ':date_booked_to'=>$this->date_booked_to);
                }

                
                //$criteria->addBetweenCondition('date_booked', $this->date_booked_from, $this->date_booked_to, 'AND');
                
                
                // repair records
                $criteria->compare('date_repair_logged',$this->date_repair_logged,true);
                $criteria->compare('nature_of_repair',$this->nature_of_repair);
                $criteria->compare('category_id',$this->category_id);
                $criteria->compare('repairs.to_be_completed_by',$this->r_to_be_completed_by);                

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
                        'sort'=>array(

                            'attributes'=>array(

                                'year_month'=>array(
                                    'asc'=>"extract(year from service.date_booked)||'-'||  to_char(service.date_booked, 'MM') ",
                                    'desc'=>"extract(year from service.date_booked)||'-'||  to_char(service.date_booked, 'MM') DESC",
                                ),                                
                                
                                'date_booked'=>array(
                                    'asc'=>'service.date_booked',
                                    'desc'=>'service.date_booked DESC',
                                ),
                                
                                'target_time'=>array(
                                    'asc'=>'service.target_time',
                                    'desc'=>'service.target_time DESC',
                                ),

                                'service_description'=>array(
                                    'asc'=>'service.service_description',
                                    'desc'=>'service.service_description DESC',
                                ),
                                
                                'to_be_completed_by'=>array(
                                    'asc'=>'service.to_be_completed_by',
                                    'desc'=>'service.to_be_completed_by DESC',
                                ),

                                'date_repair_logged'=>array(
                                    'asc'=>'repairs.date_repair_logged',
                                    'desc'=>'repairs.date_repair_logged DESC',
                                ),

                                'nature_of_repair'=>array(
                                    'asc'=>'repairs.nature_of_repair',
                                    'desc'=>'repairs.nature_of_repair DESC',
                                ),
                                
                                'category_id'=>array(
                                    'asc'=>'repairs.category_id',
                                    'desc'=>'repairs.category_id DESC',
                                ),
                                
                                'r_to_be_completed_by'=>array(
                                    'asc'=>'repairs.to_be_completed_by',
                                    'desc'=>'repairs.to_be_completed_by DESC',
                                ),                                
                                
                                '*',
                            ),
                        ),
                    
                        'pagination'=>array(
                            'pagesize'=>20,
                        ),
		));
	}
        
        /**
         *
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
         * @return status
         * 
         */
        public function getStatusOption()
        {
            return array(
              self::STATUS_COMPLETED      => 'Completed',
              self::STATUS_OUTSTANDING    => 'Outstanding',
              self::STATUS_OLDCOMPLETED   => 'Old Completed',
            );
        }
                /**
         * @return string for the Maintenance Status for the current Maintenance Event
         */
       public function getStatusText()
       {
           $statusOptions=$this->statusOption;
           return isset($statusOptions[$this->status_id]) ? $statusOptions[$this->status_id] :
               "unknown status ({$this->status_id})";
       }
       
      public function afterValidate() 
      {
        if($this->isNewRecord)
        {
            // set the create date, last updated date and the user doing the creating
            $this->date_event_logged = $this->create_time;
        }
      }
      
       public function getServiceYearMonth()
       {
            $yearMonth = CHtml::listData(ServiceSchedules::model()->findAll(array(
                'select' => "  extract(year from date_booked)||' '||  to_char(date_booked, 'MM') as year_mm_id
                             , extract(year from date_booked)||' '||  to_char(date_booked, 'Month') as year_month",
                
                'join' =>'LEFT OUTER JOIN maintenance_events me ON (t.maintenance_events_id = me.id)',
                
                'condition' =>'type_id = 1 AND status_id = 0',
                     
                'group' => 'year_mm_id, year_month',
                'order'=>'year_mm_id ASC')), 'year_month','year_month'); 
            
            return $yearMonth;
       }

}
