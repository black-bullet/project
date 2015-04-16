<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_answer".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property integer $status
 */
class QuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'question', 'answer'], 'required'],
            [['id', 'status'], 'integer'],
            [['question', 'answer'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'status' => 'Status',
        ];
    }
}
