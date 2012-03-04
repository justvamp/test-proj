<?php

class User extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANED=-1;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return Yii::app()->getModule('user')->tableUsers;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		return ((Yii::app()->getModule('user')->isAdmin())?array(
			#array('username, password, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Неверное имя пользователя (длина от 3 до 20 символов).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Неверный пароль (минимальная длина 4 символа).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("Пользователь с этим именем уже зарегистрирован.")),
			array('email', 'unique', 'message' => UserModule::t("На этот email уже зарегистрирован пользователь.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("В имени пользователя допускаются только цифры, латинские буквы и знак подчёркивания.")),
			array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANED)),
			array('superuser', 'in', 'range'=>array(0,1)),
			array('username, email, createtime, lastvisit, superuser, status', 'required'),
			array('createtime, lastvisit, superuser, status', 'numerical', 'integerOnly'=>true),
		):((Yii::app()->user->id==$this->id)?array(
			array('username, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Неверное имя пользователя (длина от 3 до 20 символов).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("Пользователь с этим именем уже зарегистрирован.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("В имени пользователя допускаются только цифры, латинские буквы и знак подчёркивания.")),
			array('email', 'unique', 'message' => UserModule::t("На этот email уже зарегистрирован пользователь.")),
		):array()));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		$relations = array(
			'profile'=>array(self::HAS_ONE, 'Profile', 'user_id'),
		);
		if (isset(Yii::app()->getModule('user')->relations)) $relations = array_merge($relations,Yii::app()->getModule('user')->relations);
		return $relations;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>UserModule::t("Логин"),
			'password'=>UserModule::t("Пароль"),
			'verifyPassword'=>UserModule::t("Повтор пароля"),
			'email'=>UserModule::t("E-mail"),
			'verifyCode'=>UserModule::t("Код верификации"),
			'id' => UserModule::t("ID"),
			'activkey' => UserModule::t("Код активации"),
			'createtime' => UserModule::t("Дата регистрации"),
			'lastvisit' => UserModule::t("Дата последнего визита"),
			'superuser' => UserModule::t("Суперюзер"),
			'status' => UserModule::t("Статус"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactvie'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, createtime, lastvisit, superuser, status',
            ),
        );
    }
	
	public function defaultScope()
    {
        return array(
            'select' => 'id, username, email, createtime, lastvisit, superuser, status',
        );
    }
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_NOACTIVE => UserModule::t('Неактивен'),
				self::STATUS_ACTIVE => UserModule::t('Активен'),
				self::STATUS_BANED => UserModule::t('Забанен'),
			),
			'AdminStatus' => array(
				'0' => UserModule::t('Нет'),
				'1' => UserModule::t('Да'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
}