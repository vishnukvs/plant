<?php

/**
 * This is the model class for table "risk_assessment".
 *
 * The followings are the available columns in table 'risk_assessment':
 * @property integer $id
 * @property integer $plant_id
 * @property integer $maintenance_events_id
 * @property integer $type_id
 * @property integer $service_or_repair_id
 * @property string $location
 * @property string $work_method_statements
 * @property integer $site_traffic_control_id
 * @property boolean $ppe
 * @property string $ppe_action
 * @property boolean $hazards_identified
 * @property string $hazards
 * @property integer $risk_rating
 * @property string $additional_potential_hazard
 * @property integer $risk_assesment_by
 * @property string $risk_controls_by
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property SiteTrafficControl $siteTrafficControl
 */
class RiskAssessment extends PlantDatabaseActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RiskAssessment the static model class
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
		return 'risk_assessment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

		return array(
			array('type_id, plant_id, maintenance_events_id, service_or_repair_id, site_traffic_control_id, risk_assesment_by', 'required'),
			array('type_id, plant_id, maintenance_events_id, service_or_repair_id, site_traffic_control_id, risk_rating, risk_assesment_by, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('location, work_method_statements, ppe_action, hazards, additional_potential_hazard, risk_controls_by, create_time, update_time', 'safe'),
                    
                        // boolean types
                        array('ppe, hazards_identified', 'boolean'),
                    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, plant_id, maintenance_events_id, type_id, service_or_repair_id, location, work_method_statements, site_traffic_control_id, ppe, ppe_action, hazards_identified, hazards, risk_rating, additional_potential_hazard, risk_assesment_by, risk_controls_by, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'siteTrafficControl' => array(self::BELONGS_TO, 'SiteTrafficControl', 'site_traffic_control_id'),
			'maintenanceEvents'  => array(self::BELONGS_TO, 'MaintenanceEvents', 'maintenance_events_id'),
			'jobCard' => array(self::HAS_ONE, 'JobCard', 'risk_assessment_id'),
			'jobCardCount' => array(self::STAT, 'JobCard', 'risk_assessment_id'),
                        
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'plant_id' => 'Plant ID',
                        'maintenance_events_id' => 'Maintenance Events ID',
			'type_id' => 'Type',
			'service_or_repair_id' => 'Service Or Repair ID',
			'location' => 'Location',
			'work_method_statements' => 'Work Method Statements',
			'site_traffic_control_id' => 'Site Traffic Control',
			'ppe' => 'Ppe',
			'ppe_action' => 'Ppe Action',
			'hazards_identified' => 'Hazards Identified',
			'hazards' => 'Hazards',
			'risk_rating' => 'Risk Rating',
			'additional_potential_hazard' => 'Additional Potential Hazard',
			'risk_assesment_by' => 'Risk Assesment By',
			'risk_controls_by' => 'Risk Controls By',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
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
		$criteria->compare('plant_id',$this->plant_id);
		$criteria->compare('maintenance_events_id',$this->maintenance_events_id);
                $criteria->compare('type_id',$this->type_id);
		$criteria->compare('service_or_repair_id',$this->service_or_repair_id);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('work_method_statements',$this->work_method_statements,true);
		$criteria->compare('site_traffic_control_id',$this->site_traffic_control_id);
		$criteria->compare('ppe',$this->ppe);
		$criteria->compare('ppe_action',$this->ppe_action,true);
		$criteria->compare('hazards_identified',$this->hazards_identified);
		$criteria->compare('hazards',$this->hazards,true);
		$criteria->compare('risk_rating',$this->risk_rating);
		$criteria->compare('additional_potential_hazard',$this->additional_potential_hazard,true);
		$criteria->compare('risk_assesment_by',$this->risk_assesment_by);
		$criteria->compare('risk_controls_by',$this->risk_controls_by,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        /**
         * Constants to identify type_id
         */
        const TYPE_SERVICE = 1;
        const TYPE_REPAIR  = 2;
        
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
        * Custom validation
        */
       public function beforeValidate() {
           
           if($this->ppe == 1 && $this->ppe_action == null ){
                $this->addError("ppe_action",
                        "Please include your PPE Action.");               
               
           }

           if($this->hazards_identified == 1 && $this->hazards == null ){
                $this->addError("hazards",
                        "Please identify Hazards.");               
               
           }           
           
           return parent::beforeValidate();
       }
}