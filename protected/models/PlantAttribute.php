<?php

/**
 * This is the model class for table "plant_attribute".
 *
 * The followings are the available columns in table 'plant_attribute':
 * @property integer $id
 * @property integer $expenses_work_order
 * @property integer $classification_id
 * @property integer $status_id
 * @property string $rego
 * @property string $model
 * @property string $description
 * @property integer $division_id
 * @property string $shared_user
 * @property integer $fuel_id
 * @property string $consumption
 * @property string $colour
 * @property integer $old_unit
 * @property string $vin_number
 * @property string $engine_number
 * @property string $purchase_date
 * @property integer $life_in_months
 * @property string $estimated_disposal_date
 * @property string $purchase_price
 * @property string $estimated_disposal_price
 * @property string $service_day
 * @property integer $user_id
 * @property integer $section_id
 * @property integer $vehicle_maker_id
 * @property integer $custodian_id
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Classification $classification
 * @property Custodian $custodian
 * @property Division $division
 * @property Fuel $fuel
 * @property Section $section
 * @property Users $user
 * @property VehicleMaker $vehicleMaker
 */
class PlantAttribute extends PlantDatabaseActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PlantAttribute the static model class
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
		return 'plant_attribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, classification_id, status_id, model, division_id, section_id, custodian_id, fuel_id, purchase_price, estimated_disposal_price, vehicle_maker_id', 'required'),
			array('id, expenses_work_order, classification_id, status_id, division_id, fuel_id, old_unit, life_in_months, user_id, section_id, vehicle_maker_id, custodian_id', 'numerical', 'integerOnly'=>true),
			array('rego, description, shared_user, consumption, colour, vin_number, engine_number, purchase_date, estimated_disposal_date, service_day, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, expenses_work_order, classification_id, status_id, rego, model, description, division_id, shared_user, fuel_id, consumption, colour, old_unit, vin_number, engine_number, purchase_date, life_in_months, estimated_disposal_date, purchase_price, estimated_disposal_price, service_day, user_id, section_id, vehicle_maker_id, custodian_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),

                        // Plant id is unique
                        array('id','unique','className'=>'PlantAttribute',
                            'message'=>'{attribute} exist on database'),

                        // Date type
                        array('purchase_date, estimated_disposal_date,', 'type', 'type' => 'date', 
                            'message' => '{attribute} is not a date', 'dateFormat' => 'dd/MM/yyyy'),

                        // empty value are assinged with NULL
                        array('consumption, purchase_price, purchase_date, estimated_disposal_date',
                            'default','setOnEmpty'=>true, 'value'=>NULL),

                        // Numeric data types 
                        array('consumption, purchase_price',
                            'numerical', 'integerOnly'=>false, 'allowEmpty'=>true),
                    
                    
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
			'classification' => array(self::BELONGS_TO, 'Classification', 'classification_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
                        'custodian' => array(self::BELONGS_TO, 'Custodian', 'custodian_id'),
			'division' => array(self::BELONGS_TO, 'Division', 'division_id'),
			'fuel' => array(self::BELONGS_TO, 'Fuel', 'fuel_id'),
			'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
	//		'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'vehicleMaker' => array(self::BELONGS_TO, 'VehicleMaker', 'vehicle_maker_id'),
                    
			'maintenanceEvent' => array(self::HAS_MANY, 'MaintenanceEvents', 'plant_id'),
                    


			'repairs' => array(self::MANY_MANY, 'Repairs', 
                            'maintenance_events(id, maintenance_events_id)'),                    
                    
                    
                        'repairs_count' => array(self::STAT, 'MaintenanceEvents','plant_id',
                                    'select' => 'count(repairs.id)',
                                    'join' => 'INNER JOIN repairs ON t.id = repairs.maintenance_events_id',),
                    
                        'classification_count' => array(self::STAT, 'Classification','classification_id',
                                    'select' => 'count(custodian.id)',
                                    //'join' => 'INNER JOIN classification ON t.id = classification_id',
                            ),
                                        
                        'service_count' => array(self::STAT, 'MaintenanceEvents','plant_id',
                                    'select' => 'count(service_schedules.id)',
                                    'join' => 'INNER JOIN service_schedules ON t.id = service_schedules.maintenance_events_id',),
                                        
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Plant ID',
			'expenses_work_order' => 'Expenses Work Order',
			'classification_id' => 'Classification',
			'status_id' => 'Status',
			'rego' => 'Rego',
			'vehicle_maker_id' => 'Make',
                        'model' => 'Model',
			'description' => 'Description',
			'division_id' => 'Division',
			'shared_user' => 'Shared User',
			'fuel_id' => 'Fuel',
			'consumption' => 'Consumption',
			'colour' => 'Colour',
			'old_unit' => 'Old Unit',
			'vin_number' => 'Vin Number',
			'engine_number' => 'Engine Number',
			'purchase_date' => 'Purchase Date',
			'life_in_months' => 'Life In Months',
			'estimated_disposal_date' => 'Estimated Disposal Date',
			'purchase_price' => 'Purchase Price',
			'estimated_disposal_price' => 'Estimated Disposal Price',
			'service_day' => 'Service Day',
			'section_id' => 'Section',
			'custodian_id' => 'Custodian',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}
        public function afterFind()
        {   // purchase date
            date_default_timezone_set('UTC');

            if($this->purchase_date != NULL)
            { 
              $this->purchase_date = date('d/m/Y',strtotime($this->purchase_date));
            }
            else
            {
              $this->purchase_date = NULL;
            }
            // estimated disposal date
            if($this->estimated_disposal_date != NULL)
            {
              $this->estimated_disposal_date = date('d/m/Y',strtotime($this->estimated_disposal_date));
            }
            else
            {
              $this->estimated_disposal_date = NULL;
            }
            
//            if($this->purchase_price != NULL ) 
//            {
//                $this->purchase_price = CNumberFormatter::formatCurrency($this->purchase_price, 'AUD');
//            }
        return parent::afterFind();
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
		$criteria->compare('expenses_work_order',$this->expenses_work_order);
		$criteria->compare('classification_id',$this->classification_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('rego',$this->rego,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('division_id',$this->division_id);
		$criteria->compare('shared_user',$this->shared_user,true);
		$criteria->compare('fuel_id',$this->fuel_id);
		$criteria->compare('consumption',$this->consumption,true);
		$criteria->compare('colour',$this->colour,true);
		$criteria->compare('old_unit',$this->old_unit);
		$criteria->compare('vin_number',$this->vin_number,true);
		$criteria->compare('engine_number',$this->engine_number,true);
		$criteria->compare('purchase_date',$this->purchase_date,true);
		$criteria->compare('life_in_months',$this->life_in_months);
		$criteria->compare('estimated_disposal_date',$this->estimated_disposal_date,true);
		$criteria->compare('purchase_price',$this->purchase_price,true);
		$criteria->compare('estimated_disposal_price',$this->estimated_disposal_price,true);
		$criteria->compare('service_day',$this->service_day,true);
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('vehicle_maker_id',$this->vehicle_maker_id);
		$criteria->compare('custodian_id',$this->custodian_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'defaultOrder'=>'id ASC')
		));
	}
        
        public function stats()
        {
            $sql = 'select s.name, count(*)
                    from plant_attribute pa
                    left outer join status s ON (pa.status_id = s.id)
                    group by status_id, s.name
                    order by status_id';
            return $sql;
        }
}