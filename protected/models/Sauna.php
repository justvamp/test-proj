<?php

/**
 * This is the model class for table "sauna".
 *
 * The followings are the available columns in table 'sauna':
 * @property integer $sauna_id
 * @property integer $user_id
 * @property string $name
 * @property string $phones
 * @property string $address
 * @property double $latitude
 * @property double $longitude
 * @property string $capacity
 * @property string $price
 * @property string $description
 */
class Sauna extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sauna the static model class
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
		return 'sauna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phones, address, capacity, price, description', 'required'),
			//array('user_id', 'numerical', 'integerOnly'=>true),
			array('latitude, longitude', 'numerical'),
			array('name', 'length', 'max'=>50),
			array('phones, address', 'length', 'max'=>100),
			array('capacity, price', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sauna_id, user_id, name, phones, address, latitude, longitude, capacity, price, description', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sauna_id' => 'ID',
			'user_id' => 'ID пользователя',
			'name' => 'Название',
			'phones' => 'Телефоны сауны',
			'address' => 'Адрес сауны',
			'latitude' => 'Широта',
			'longitude' => 'Долгота',
			'capacity' => 'Вместимость',
			'price' => 'Цена за час',
			'description' => 'Описание',
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

		$criteria->compare('sauna_id',$this->sauna_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phones',$this->phones,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('capacity',$this->capacity,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}