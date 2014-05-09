<?php

/**
 * This is the model class for table "vehicle_maker".
 *
 * The followings are the available columns in table 'vehicle_maker':
 * @property integer $id
 * @property string $maker_name
 *
 * The followings are the available model relations:
 * @property PlantAttributes[] $plantAttributes
 */
class VehicleMaker extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VehicleMaker the static model class
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
		return 'vehicle_maker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maker_name', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, maker_name', 'safe', 'on'=>'search'),
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
			'plantAttributes' => array(self::HAS_MANY, 'PlantAttributes', 'vehicle_maker_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'maker_name' => 'Make',
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
		$criteria->compare('maker_name',$this->maker_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}