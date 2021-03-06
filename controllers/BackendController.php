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

    	

        if ($post['status'] == 1) {
            $questions = QuestionAnswer::find()
            ->where(['status' => 2])
            ->orderBy('count DESC')
            ->all();

            $comparedQuestions = [];
            $isComparedQuestions = false;

            foreach ($questions as $qa) {
                if ($qa->question == $post['question']) {
                    $qa->count++;
                    $qa->save();
                    return $qa;
                }
                if (levenshtein($qa->question, $post['question']) <= 5) {
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
                $min->count++;
                $min->save();
                return $min;    
            }
              
        }
        
            $qa = new \app\models\QuestionAnswer();
            $qa->question=$post['question'];
            if (array_key_exists('answer', $post))
                $qa->answer=$post['answer'];
            $qa->status=$post['status'];
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

}
