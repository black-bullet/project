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

    	$qa = new \app\models\QuestionAnswer();

        if ($post['status'] == 1) {
            $questions = QuestionAnswer::find()
            ->where(['status' => 2])
            ->orderBy('count DESC')
            ->all();

            $comparedQuestions = [];
            $isComparedQuestions = false;

            foreach ($questions as $qa) {
                if (levenshtein($qa->question, $post['question']) <= 10) {
                    $comparedQuestions[] = $qa;
                    $isComparedQuestions = true;
                }
            }
            if ($isComparedQuestions) {
                $min = $comparedQuestions[0];

                foreach ($comparedQuestions as $qa) {
                    if (levenshtein($qa->question, $post['question']) < levenshtein($min->question, $post['question'])) {
                        $min = $qa;    
                    }
                }  
                return $min;    
            }
              
        }
        
    	$qa->question=$post['question'];
        if (array_key_exists('answer', $post))
            $qa->answer=$post['answer'];
        $qa->status=$post['status'];
        if (array_key_exists('id', $post))
            $qa->id = $post['id'];
    	$qa->save(); 
        
        return $qa;
    }
}
