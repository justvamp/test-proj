<?php
/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 'UserController'.
 */
class RegistrationForm extends User {
	public $verifyPassword;
	public $verifyCode;
	
	public function rules() {
		$rules = array(
			array('username, password, verifyPassword, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Имя пользователя слишком короткое (длина от 3 до 20 символов).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Пароль слишком короткий (длина не меньше 4 символов).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("Пользователь с таким логином уже зарегистрирован. Попробуйте другой логин.")),
			array('email', 'unique', 'message' => UserModule::t("Пользователь с таким электронным адресом уже зарегистрирован.")),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => UserModule::t("Пароли не совпадают!")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("В логине допустимы только цифры, латинские буквы и знак подчёркивания.")),
		);
		if (isset($_POST['ajax']) && $_POST['ajax']==='registration-form') 
			return $rules;
		else 
			array_push($rules,array('verifyCode', 'captcha', 'allowEmpty'=>!UserModule::doCaptcha('registration')));
		return $rules;
	}
	
}