<?php
/**
 * UserChangePassword class.
 * UserChangePassword is the data structure for keeping
 * user change password form data. It is used by the 'changepassword' action of 'UserController'.
 */
class UserChangePassword extends CFormModel {
	public $password;
	public $verifyPassword;
	
	public function rules() {
		return array(
			array('password, verifyPassword', 'required'),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Неверный пароль! Длина пароля - минимум 4 символа.")),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => UserModule::t("Пароли не совпадают!")),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password'=>UserModule::t("Введите пароль"),
			'verifyPassword'=>UserModule::t("Повторите пароль"),
		);
	}
} 