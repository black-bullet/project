<?php

namespace app\controllers;

use app\models\QuestionAnswer;
use Yii;
use Yii\web\Request;

class BackendController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function beforeAction($action) {
	    $this->enableCsrfValidation = false;
	    return parent::beforeAction($action);
	}

    public function actionQuery()
    {
        \Yii::$app->response->format='json';

    	$request=Yii::$app->request;
    	$post=$request->getBodyParams();

    	$qa =new \app\models\QuestionAnswer();
    	$qa->question=$post['question'];
        if (array_key_exists('answer', $post))
            $qa->answer=$post['answer'];
        $qa->status=$post['status'];
        if (array_key_exists('id', $post))
            $qa->id = $post['id'];
    	$qa->save(); 
        
        return $qa;
    }

    public function actionAdminQuery()
    {
        \Yii::$app->response->format='json';

        $request=Yii::$app->request;
        $post=$request->getBodyParams();

        //$qa =new \app\models\QuestionAnswer();
        $questionAdmin = QuestionAnswer::find()
            ->where(['status' => 3])
            ->orderBy('id')
            ->all();

        return $questionAdmin;
    }

    public function actionTopQuestionQuery()
    {
        \Yii::$app->response->format='json';

        $request=Yii::$app->request;
        $post=$request->getBodyParams();

        $question = QuestionAnswer::find()
            ->where(['status' => 2])
            ->orderBy('count DESC')
            ->limit(10)
            ->all();
      
        return $question;
    }

    public function actionLast10QuestionQuery()
    {
        \Yii::$app->response->format='json';

        $request=Yii::$app->request;
        $post=$request->getBodyParams();   

        $question = QuestionAnswer::find()
            ->where(['status' => 2])
            ->orderBy('id Desc')
            ->limit(10)
            ->all();

        return $question;
    }

    /*public function actionQuery1()
    {
        \Yii::$app->response->format='json';

        $request=Yii::$app->request;
        $post=$request->getBodyParams();

        
    }
    */



    // public function getQuery()
    // {
    //     $request=Yii::$app->request;
    //     $post=$request->post();
    //     $name=$request->post('question');
    //     return $name;
    // }
}
