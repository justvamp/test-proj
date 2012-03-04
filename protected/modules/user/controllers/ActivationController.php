<?php

class ActivationController extends Controller
{
	public $defaultAction = 'activation';

	public $layout='//layouts/column1';
	
	/**
	 * Activation user account
	 */
	public function actionActivation () {
		$email = $_GET['email'];
		$activkey = $_GET['activkey'];
		if ($email&&$activkey) {
			$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
			if (isset($find)&&$find->status) {
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Ваш аккаунт активен.")));
			} elseif(isset($find->activkey) && ($find->activkey==$activkey)) {
				$find->activkey = UserModule::encrypting(microtime());
				$find->status = 1;
				$find->save();
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Ваш аккаунт активирован.")));
			} else {
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Неверный URL активации!")));
			}
		} else {
			$this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Неверный URL активации!")));
		}
	}

}