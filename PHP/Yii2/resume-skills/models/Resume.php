<?php

namespace app\models;

use dosamigos\taggable\Taggable;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "resume".
 * @property int           $id
 * @property string        $name
 * @property string        $description
 * @property string        $created_at
 * @property string        $updated_at
 * @property ResumeSkill[] $resumeSkills
 * @property Skill[]       $skills
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['form_skills'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class'      => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                'value'      => new Expression('NOW()'),
            ],
            [
                'class'     => Taggable::className(),
                'relation'  => 'skills',
                'attribute' => 'form_skills',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('app', 'ID'),
            'name'        => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'created_at'  => Yii::t('app', 'Created At'),
            'updated_at'  => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResumeSkills()
    {
        return $this->hasMany(ResumeSkill::className(), ['resume_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['id' => 'skill_id'])
                    ->viaTable('resume_skill', ['resume_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ResumeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResumeQuery(get_called_class());
    }
}
