<?php

class SaunaController extends Controller
{

	public function allowedActions() {
		return 'view';
	}	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Sauna;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sauna']))
		{
			$model->attributes=$_POST['Sauna'];
			$model->user_id = Yii::app()->user->id;
			if ($model->validate()) {
				if (CUploadedFile::getInstance($model,'image')) {
					$uniqueName = uniqid().'.jpg';
					$model->image = CUploadedFile::getInstance($model,'image');
					$model->main_image_name = $uniqueName;
					$model->image->saveAs($model->imagePath);
				}
				if($model->save()) {
					$this->redirect(array('view','id'=>$model->sauna_id));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sauna']))
		{
			$oldImageName = $model->main_image_name;
			$model->attributes=$_POST['Sauna'];
			if ($model->validate()) {
				if (CUploadedFile::getInstance($model,'image')) {
					$uniqueName = uniqid().'.jpg';
					$model->image = CUploadedFile::getInstance($model,'image');
					$model->main_image_name = $uniqueName;
					$model->image->saveAs($model->imagePath);
					unlink(Yii::app()->params['imgPath'].$oldImageName);
				}
				if($model->save()) {
					$this->redirect(array('view','id'=>$model->sauna_id));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Sauna');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sauna('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sauna']))
			$model->attributes=$_GET['Sauna'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Sauna::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sauna-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
