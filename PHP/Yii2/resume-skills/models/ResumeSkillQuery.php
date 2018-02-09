<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ResumeSkill]].
 *
 * @see ResumeSkill
 */
class ResumeSkillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ResumeSkill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ResumeSkill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
