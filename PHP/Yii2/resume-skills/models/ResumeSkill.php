<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume_skill".
 *
 * @property int $resume_id
 * @property int $skill_id
 *
 * @property Resume $resume
 * @property Skill $skill
 */
class ResumeSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume_skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resume_id', 'skill_id'], 'required'],
            [['resume_id', 'skill_id'], 'default', 'value' => null],
            [['resume_id', 'skill_id'], 'integer'],
            [['resume_id', 'skill_id'], 'unique', 'targetAttribute' => ['resume_id', 'skill_id']],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::className(), 'targetAttribute' => ['resume_id' => 'id']],
            [['skill_id'], 'exist', 'skipOnError' => true, 'targetClass' => Skill::className(), 'targetAttribute' => ['skill_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resume_id' => Yii::t('app', 'Resume ID'),
            'skill_id' => Yii::t('app', 'Skill ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::className(), ['id' => 'resume_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(Skill::className(), ['id' => 'skill_id']);
    }

    /**
     * @inheritdoc
     * @return ResumeSkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResumeSkillQuery(get_called_class());
    }
}
